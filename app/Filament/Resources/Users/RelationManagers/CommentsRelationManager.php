<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Models\Comment;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\Size;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('User')
                    ->icon('heroicon-o-user')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('user.name')
                            ->label('Name'),
                        TextEntry::make('user.username')
                            ->label('Username')
                            ->icon('heroicon-s-at-symbol'),
                        TextEntry::make('user.email')
                            ->label('Email')
                            ->icon('heroicon-s-envelope'),
                    ]),
                Section::make('Comment Details')
                    ->icon('heroicon-o-chat-bubble-left-ellipsis')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Posted')
                            ->dateTime('d-M-y h:i A'),
                        TextEntry::make('content')
                            ->label('Comment')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('commentable_type')
                    ->label('Type')
                    ->badge()
                    ->color('primary'),

                TextColumn::make('content')
                    ->label('Comment')
                    ->grow(true)
                    ->searchable(),

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
