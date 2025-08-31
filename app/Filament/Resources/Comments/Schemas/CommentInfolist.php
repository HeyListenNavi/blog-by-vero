<?php

namespace App\Filament\Resources\Comments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CommentInfolist
{
    public static function configure(Schema $schema): Schema
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
}
