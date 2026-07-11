<?php

namespace App\Filament\Resources\Sketches\Pages;

use App\Filament\Resources\Sketches\SketchResource;
use App\Jobs\GenerateStoryVideoJob;
use App\Models\Sketch;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditSketch extends EditRecord
{
    protected static string $resource = SketchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('generate_story')
                ->label('Story')
                ->icon('heroicon-o-film')
                ->outlined()
                ->requiresConfirmation()
                ->action(function (Sketch $record) {
                    $html = view('stories.sketch', ['sketch' => $record])->render();

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
