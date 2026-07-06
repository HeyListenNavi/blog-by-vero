<?php

namespace App\Filament\Resources\PhotographyPosts\Tables;

use App\Jobs\GenerateStoryVideoJob;
use App\Models\PhotographyPost;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PhotographyPostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('icon.url'),

                TextColumn::make('title')
                    ->description(fn (PhotographyPost $photographyPost): string => str($photographyPost->description)->limit(90, '...'))
                    ->weight(FontWeight::Bold)
                    ->grow(true)
                    ->searchable(['title', 'description']),

                TextColumn::make('created_at')
                    ->label('Date')
                    ->since()
                    ->description(fn (PhotographyPost $photographyPost): string => $photographyPost->created_at->format('d-M-y h:i A'))
                    ->sortable()
                    ->alignEnd()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    Action::make('generate_story')
                        ->label('Story')
                        ->icon('heroicon-o-film')
                        ->color('primary')
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
