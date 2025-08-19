<?php

namespace App\Filament\Resources\PhotographyPosts\Tables;

use App\Models\PhotographyPost;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PhotographyPostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon.path')
                    ->disk('public'),
                TextColumn::make('title')
                    ->description(fn(PhotographyPost $photographyPost): string => str($photographyPost->description)->limit(90, '...'))
                    ->weight(FontWeight::Bold)
                    ->sortable()
                    ->searchable(['title', 'description']),
                TextColumn::make('created_at')
                    ->label('Date')
                    ->since()
                    ->description(fn(PhotographyPost $photographyPost): string => $photographyPost->created_at->format('d-M-y h:i A'))
                    ->sortable()
                    ->alignEnd()
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
