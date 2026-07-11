<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Jobs\GenerateStoryVideoJob;
use App\Models\Post;
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

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('icon.url'),

                TextColumn::make('title')
                    ->grow(true)
                    ->weight(FontWeight::Bold)
                    ->description(fn (Post $post): string => str($post->content)->limit(50, '...'))
                    ->searchable(['title', 'content']),

                TextColumn::make('date')
                    ->date()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Published At')
                    ->since()
                    ->description(fn (Post $post): string => $post->created_at->format('d-M-y h:i A'))
                    ->sortable()
                    ->alignEnd(),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
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
                        ->action(function (Post $record) {
                            $html = view('stories.post', ['post' => $record])->render();

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
