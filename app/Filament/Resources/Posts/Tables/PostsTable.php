<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use App\Models\Post;
use Filament\Support\Enums\FontWeight;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('icon.path')
                    ->disk('public'),

                TextColumn::make('title')
                    ->grow(true)
                    ->weight(FontWeight::Bold)
                    ->description(fn(Post $post): string => str($post->content)->limit(50, '...'))
                    ->searchable(['title', 'content']),

                TextColumn::make('date')
                    ->date()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Published At')
                    ->since()
                    ->description(fn(Post $post): string => $post->created_at->format('d-M-y h:i A'))
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
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
