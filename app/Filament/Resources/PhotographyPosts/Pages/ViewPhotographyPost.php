<?php

namespace App\Filament\Resources\PhotographyPosts\Pages;

use App\Filament\Resources\PhotographyPosts\PhotographyPostResource;
use App\Jobs\GenerateStoryVideoJob;
use App\Models\PhotographyPost;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewPhotographyPost extends ViewRecord
{
    protected static string $resource = PhotographyPostResource::class;

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
                        userId: auth()->id(),
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
}
