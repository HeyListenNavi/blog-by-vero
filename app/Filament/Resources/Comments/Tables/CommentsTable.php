<?php

namespace App\Filament\Resources\Comments\Tables;

use App\Models\Comment;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\Size;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CommentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('user.username')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Comment')
                    ->description(fn(Comment $comment): string => str($comment->content)->limit(70, '...'))
                    ->weight(FontWeight::Bold)
                    ->grow(true)
                    ->searchable(['content', 'name']),
                TextColumn::make('created_at')
                    ->label('Date')
                    ->since()
                    ->description(fn(Comment $comment): string => $comment->created_at->format('d-M-y h:i A'))
                    ->sortable()
                    ->alignEnd(),
            ])
            ->recordActions([
                DeleteAction::make()
                    ->button()
                    ->size(Size::ExtraSmall),
                ViewAction::make()
                    ->hiddenLabel()
                    ->icon(null),
            ])
            ->filters([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
