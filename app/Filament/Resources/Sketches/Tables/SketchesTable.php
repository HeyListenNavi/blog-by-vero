<?php

namespace App\Filament\Resources\Sketches\Tables;

use App\Jobs\GenerateStoryVideoJob;
use App\Models\Sketch;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SketchesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('title')
                    ->grow(true)
                    ->weight(FontWeight::Bold)
                    ->description(fn (Sketch $sketch): string => str($sketch->description)->limit(100, '...'))
                    ->searchable(['title', 'content']),

                TextColumn::make('path')
                    ->label('HTML File')
                    ->icon('heroicon-s-code-bracket')
                    ->url(fn (Sketch $sketch) => $sketch->url)
                    ->openUrlInNewTab()
                    ->copyable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->recordActions([
                ActionGroup::make([
                    Action::make('generate_story')
                        ->label('Story')
                        ->icon('heroicon-o-film')
                        ->color('primary')
                        ->requiresConfirmation()
                        ->action(function (Sketch $record) {
                            $html = view('stories.sketch', ['sketch' => $record])->render();

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
                    ViewAction::make(),
                    EditAction::make(),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
