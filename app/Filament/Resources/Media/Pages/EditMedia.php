<?php

namespace App\Filament\Resources\Media\Pages;

use App\Filament\Resources\Media\MediaResource;
use App\Jobs\GenerateStoryVideoJob;
use App\Models\Media;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditMedia extends EditRecord
{
    protected static string $resource = MediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('generate_story')
                ->label('Story')
                ->icon('heroicon-o-film')
                ->outlined()
                ->requiresConfirmation()
                ->action(function (Media $record) {
                    $html = view('stories.media', ['media' => $record])->render();

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
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
