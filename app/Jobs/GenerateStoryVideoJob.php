<?php

namespace App\Jobs;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Browsershot\Browsershot;

class GenerateStoryVideoJob implements ShouldQueue
{
    use Queueable;

    public int $timeout = 120;

    public function __construct(
        public string $html,
        public User $user,
        public string $label,
    ) {}

    public function handle(): void
    {
        $filename = (string) Str::uuid();

        $overlay = Storage::disk('local')->path("overlay-{$filename}.png");
        $output = Storage::disk('local')->path("stories/story-{$filename}.mp4");
        $background = resource_path('images/story-background.mp4');

        try {
            Browsershot::html($this->html)
                ->windowSize(540, 960)
                ->hideBackground()
                ->noSandbox()
                ->save($overlay);
        } catch (\Throwable $e) {
            Notification::make()
                ->title('Oops! Your Story Preview Went Poof')
                ->body('Something exploded while making your story pic. Mind trying again?')
                ->danger()
                ->sendToDatabase($this->user);
            throw $e;
        }

        $command = sprintf(
            'ffmpeg -i %s -i %s -filter_complex "[0:v][1:v]overlay=0:0:format=auto,format=yuv420p[v]" -map "[v]" -map 0:a? -t 15 -pix_fmt yuv420p -y %s',
            escapeshellarg($background),
            escapeshellarg($overlay),
            escapeshellarg($output),
        );

        $result = Process::run($command);

        if ($result->failed()) {
            Notification::make()
                ->title('Uh Oh! Video Said Nope')
                ->body('ffmpeg refused to cooperate. Give it another go!')
                ->danger()
                ->sendToDatabase($this->user);
            $result->throw();
        }

        Storage::disk('local')->delete("overlay-{$filename}.png");

        Notification::make()
            ->title('Story Ready!')
            ->body("Your story \"{$this->label}\" is ready to roll!")
            ->success()
            ->viewData(['filename' => $filename])
            ->actions([
                Action::make('download')
                    ->label('Download')
                    ->button()
                    ->url(route('stories.download', $filename))
                    ->markAsRead(),
            ])
            ->sendToDatabase($this->user);
    }
}
