<?php

namespace App\Filament\Resources\Playlist\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class PlaylistForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Playlist Information')
                    ->description('General details about the playlist.')
                    ->icon('heroicon-o-queue-list')
                    ->columns(1)
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->placeholder('e.g. My Favorite Songs, Rock Classics...')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Short Description')
                            ->placeholder('A brief description of the playlist...')
                            ->rows(3)
                            ->autoSize(),

                        TextInput::make('url')
                            ->label('Spotify URL')
                            ->placeholder('https://open.spotify.com/playlist/...')
                            ->required()
                            ->url()
                            ->maxLength(255),
                    ]),
            ]);
    }
}
