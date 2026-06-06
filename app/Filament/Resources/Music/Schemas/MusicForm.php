<?php

namespace App\Filament\Resources\Music\Schemas;

use App\Forms\Components\FavoriteToggle;
use App\Forms\Components\RatingSelect;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class MusicForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                Section::make('Music Visuals')
                    ->description('Upload the album or song cover.')
                    ->icon('heroicon-o-photo')
                    ->columnSpan(4)
                    ->schema([
                        FileUpload::make('cover')
                            ->hiddenLabel()
                            ->image()
                            ->directory('music')
                            ->imageEditor()
                            ->downloadable()
                            ->columnSpanFull(),
                    ]),

                Section::make('Music Information')
                    ->description('General details about the music you are reviewing.')
                    ->icon('heroicon-o-musical-note')
                    ->columns(2)
                    ->columnSpan(8)
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->placeholder('e.g. Be the Cowboy, DAMN...')
                            ->required()
                            ->columnSpanFull()
                            ->maxLength(255),

                        TextInput::make('artist')
                            ->label('Artist')
                            ->placeholder('e.g. Mitski, Kendrick Lamar...')
                            ->required()
                            ->maxLength(255),

                        Select::make('type')
                            ->label('Type')
                            ->options([
                                'album' => 'Album',
                                'single' => 'Single',
                                'song' => 'Song',
                            ])
                            ->required()
                            ->default('album')
                            ->native(false),

                        DatePicker::make('review_date')
                            ->label('Review Date')
                            ->default(now())
                            ->native(false),
                    ]),

                Section::make('Your Review')
                    ->description('Share your thoughts and rate your experience.')
                    ->icon('heroicon-o-chat-bubble-bottom-center-text')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        RatingSelect::make('stars')
                            ->label('Overall Rating')
                            ->stars(5)
                            ->required()
                            ->default(0),

                        FavoriteToggle::make('is_favorite')
                            ->label('Personal Favorite')
                            ->default(false),

                        Textarea::make('description')
                            ->label('Short Description')
                            ->placeholder('A brief description...')
                            ->rows(3)
                            ->autoSize(),
                    ]),
            ]);
    }
}
