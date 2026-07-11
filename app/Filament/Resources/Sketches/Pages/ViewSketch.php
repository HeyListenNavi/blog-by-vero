<?php

namespace App\Filament\Resources\Sketches\Pages;

use App\Filament\Resources\Sketches\SketchResource;
use App\Jobs\GenerateStoryVideoJob;
use App\Models\Sketch;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewSketch extends ViewRecord
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
            EditAction::make(),
        ];
    }
}
