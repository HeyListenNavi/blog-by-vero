<?php

namespace App\Filament\Resources\Playlist\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PlaylistInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Playlist Information')
                    ->icon('heroicon-o-queue-list')
                    ->columns(1)
                    ->columnSpan(8)
                    ->schema([
                        TextEntry::make('title')
                            ->label('Title')
                            ->weight('bold'),

                        TextEntry::make('description')
                            ->label('Description'),

                        TextEntry::make('url')
                            ->label('Spotify URL')
                            ->url(fn ($record) => $record->url, true),
                    ]),
            ]);
    }
}
