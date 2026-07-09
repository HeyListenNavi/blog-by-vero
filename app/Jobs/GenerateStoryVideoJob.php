<?php

namespace App\Jobs;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
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
        Log::info('GenerateStoryVideoJob: starting', [
            'label' => $this->label,
            'userId' => $this->userId,
            'timeout' => $this->timeout,
        ]);

        try {
            $user = User::findOrFail($this->userId);
            Log::info('GenerateStoryVideoJob: user found', ['userId' => $this->userId]);
        } catch (\Throwable $e) {
            Log::error('GenerateStoryVideoJob: user not found', [
                'userId' => $this->userId,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }

        $filename = (string) Str::uuid();

        $overlay = Storage::disk('local')->path("overlay-{$filename}.png");
        $output = Storage::disk('local')->path("stories/story-{$filename}.mp4");
        $background = resource_path('images/story-background.mp4');

        Log::info('GenerateStoryVideoJob: paths resolved', [
            'overlay' => $overlay,
            'output' => $output,
            'background' => $background,
            'backgroundExists' => file_exists($background),
        ]);

        Log::info('GenerateStoryVideoJob: launching Browsershot screenshot', [
            'windowSize' => '540x960',
            'hideBackground' => true,
            'htmlLength' => strlen($this->html),
        ]);

        try {
            Browsershot::html($this->html)
                ->windowSize(540, 960)
                ->hideBackground()
                ->noSandbox()
                ->save($overlay);
        } catch (\Throwable $e) {
            Log::error('GenerateStoryVideoJob: Browsershot FAILED', [
                'error' => $e->getMessage(),
                'errorClass' => get_class($e),
                'trace' => $e->getTraceAsString(),
                'htmlPreview' => substr($this->html, 0, 500),
            ]);
            throw $e;
        }

        $screenshotExists = file_exists($overlay);
        Log::info('GenerateStoryVideoJob: Browsershot completed', [
            'overlayExists' => $screenshotExists,
            'overlaySize' => $screenshotExists ? filesize($overlay) : 0,
        ]);

        if (! $screenshotExists) {
            Log::error('GenerateStoryVideoJob: screenshot file missing after Browsershot save');
        }

        $command = sprintf(
            'ffmpeg -i %s -i %s -filter_complex "[0:v][1:v]overlay=0:0:format=auto,format=yuv420p[v]" -map "[v]" -map 0:a? -t 15 -pix_fmt yuv420p -y %s',
            escapeshellarg($background),
            escapeshellarg($overlay),
            escapeshellarg($output),
        );

        Log::info('GenerateStoryVideoJob: starting ffmpeg', ['command' => $command]);

        $result = Process::run($command);

        if ($result->failed()) {
            Log::error('GenerateStoryVideoJob: ffmpeg FAILED', [
                'exitCode' => $result->exitCode(),
                'errorOutput' => $result->errorOutput(),
                'command' => $command,
            ]);
            $result->throw();
        }

        Log::info('GenerateStoryVideoJob: ffmpeg completed successfully', [
            'exitCode' => $result->exitCode(),
            'outputExists' => file_exists($output),
            'outputSize' => file_exists($output) ? filesize($output) : 0,
        ]);

        Storage::disk('local')->delete("overlay-{$filename}.png");

        Log::info('GenerateStoryVideoJob: sending notification to user', [
            'userId' => $this->userId,
            'filename' => $filename,
        ]);

        try {
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

            Log::info('GenerateStoryVideoJob: notification sent successfully');
        } catch (\Throwable $e) {
            Log::error('GenerateStoryVideoJob: notification FAILED', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }

        Log::info('GenerateStoryVideoJob: completed', ['label' => $this->label, 'filename' => $filename]);
    }
}
