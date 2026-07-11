<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use App\Jobs\GenerateStoryVideoJob;
use App\Models\Post;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('generate_story')
                ->label('Story')
                ->icon('heroicon-o-film')
                ->outlined()
                ->requiresConfirmation()
                ->action(function (Post $record) {
                    $html = view('stories.post', ['post' => $record])->render();

                    Notification::make()
                        ->title('Generating Story :3')
                        ->success()
                        ->send();

                    dispatch(new GenerateStoryVideoJob(
                        html: $html,
                        user: auth()->user(),
                        label: $record->title,
                    ));
                }),
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
