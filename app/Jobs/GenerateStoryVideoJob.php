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
        public int $userId,
        public string $label,
    ) {}

    public function handle(): void
    {
        $user = User::findOrFail($this->userId);
        $filename = (string) Str::uuid();

        $overlay = Storage::disk('local')->path("overlay-{$filename}.png");
        $output = Storage::disk('local')->path("stories/story-{$filename}.mp4");
        $background = resource_path('images/story-background.mp4');

        Browsershot::html($this->html)
            ->windowSize(540, 960)
            ->hideBackground()
            ->save($overlay);

        $command = sprintf(
            'ffmpeg -i %s -i %s -filter_complex "[0:v][1:v]overlay=0:0:format=auto,format=yuv420p[v]" -map "[v]" -map 0:a? -t 15 -pix_fmt yuv420p -y %s',
            escapeshellarg($background),
            escapeshellarg($overlay),
            escapeshellarg($output),
        );

        Process::run($command)->throw();

        Storage::disk('local')->delete("overlay-{$filename}.png");

        Notification::make()
            ->title('Story lista!')
            ->body("El video para \"{$this->label}\" está listo para descargar.")
            ->success()
            ->viewData(['filename' => $filename])
            ->actions([
                Action::make('download')
                    ->label('Descargar')
                    ->button()
                    ->url(route('stories.download', $filename))
                    ->markAsRead(),
            ])
            ->sendToDatabase($user);
    }
}
