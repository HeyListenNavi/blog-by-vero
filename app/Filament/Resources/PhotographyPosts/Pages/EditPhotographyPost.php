<?php

namespace App\Filament\Resources\PhotographyPosts\Pages;

use App\Filament\Resources\PhotographyPosts\PhotographyPostResource;
use App\Jobs\GenerateStoryVideoJob;
use App\Models\PhotographyPost;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditPhotographyPost extends EditRecord
{
    protected static string $resource = PhotographyPostResource::class;

    protected array $bulkPhotos = [];

    protected function getHeaderActions(): array
    {
        return [
            Action::make('generate_story')
                ->label('Story')
                ->icon('heroicon-o-film')
                ->outlined()
                ->requiresConfirmation()
                ->action(function (PhotographyPost $record) {
                    $html = view('stories.photography', ['photographyPost' => $record])->render();

                    dispatch(new GenerateStoryVideoJob(
                        html: $html,
                        user: auth()->user(),
                        label: $record->title,
                    ));

                    Notification::make()
                        ->title('Generating Story :3')
                        ->success()
                        ->send();
                }),
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->bulkPhotos = $data['bulk_photos'] ?? [];
        unset($data['bulk_photos']);

        return $data;
    }

    protected function afterSave(): void
    {
        foreach ($this->bulkPhotos as $path) {
            $this->record->photographies()->create([
                'path' => $path,
            ]);
        }
    }
}
