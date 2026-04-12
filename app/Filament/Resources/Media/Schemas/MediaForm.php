<?php

namespace App\Filament\Resources\Media\Schemas;

use App\Forms\Components\FavoriteToggle;
use App\Forms\Components\RatingSelect;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class MediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                Section::make('Media Visuals')
                    ->description('Upload the cover or poster.')
                    ->icon('heroicon-o-photo')
                    ->columnSpan(4)
                    ->schema([
                        FileUpload::make('poster')
                            ->hiddenLabel()
                            ->image()
                            ->directory('posters')
                            ->imageEditor()
                            ->disk('public')
                            ->downloadable()
                            ->columnSpanFull(),
                    ]),

                Section::make('Media Information')
                    ->description('General details about the media you are reviewing.')
                    ->icon('heroicon-o-film')
                    ->columns(2)
                    ->columnSpan(8)
                    ->schema([
                        TextInput::make('title')
                            ->label('Media Title')
                            ->placeholder('e.g. Inception, Elden Ring...')
                            ->required()
                            ->columnSpanFull()
                            ->maxLength(255),

                        Select::make('type')
                            ->label('Media Type')
                            ->options([
                                'movie' => 'Movie',
                                'videogame' => 'Video Game',
                                'show' => 'Show',
                            ])
                            ->required()
                            ->default('movie')
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

                        RichEditor::make('content')
                            ->label('Detailed Content')
                            ->placeholder('What did you think about it?')
                            ->columnSpanFull()
                            ->required(),
                    ]),
            ]);
    }
}
