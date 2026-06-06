<?php

namespace App\Filament\Resources\Music\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MusicInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                Section::make('Music Visuals')
                    ->icon('heroicon-o-photo')
                    ->columnSpan(4)
                    ->schema([
                        ImageEntry::make('url')
                            ->hiddenLabel()
                            ->imageWidth('100%')
                            ->imageHeight('auto')
                            ->columnSpanFull(),
                    ]),

                Section::make('Music Information')
                    ->icon('heroicon-o-musical-note')
                    ->columns(2)
                    ->columnSpan(8)
                    ->schema([
                        TextEntry::make('title')
                            ->label('Title')
                            ->weight('bold')
                            ->columnSpanFull(),

                        TextEntry::make('artist')
                            ->label('Artist'),

                        TextEntry::make('type')
                            ->label('Type')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'album' => 'info',
                                'single' => 'success',
                                'song' => 'warning',
                                default => 'gray',
                            }),

                        TextEntry::make('review_date')
                            ->label('Review Date')
                            ->date(),
                    ]),

                Section::make('Your Review')
                    ->icon('heroicon-o-chat-bubble-bottom-center-text')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('stars')
                            ->label('Overall Rating')
                            ->html()
                            ->formatStateUsing(function (int $state) {
                                $active = str_repeat('<span style="color: #eabbb9;">G</span>', $state);
                                $inactive = str_repeat('<span style="color: #444;">F</span>', 5 - $state);
                                return '<div style="font-family: \'Vero\\\'s Emojis\', sans-serif !important; font-size: 1.5rem; line-height: 1; display: flex; gap: 2px;">' . $active . $inactive . '</div>';
                            }),

                        TextEntry::make('is_favorite')
                            ->label('Personal Favorite')
                            ->html()
                            ->formatStateUsing(fn (bool $state): string => '
                                <div style="font-family: \'Vero\\\'s Emojis\', sans-serif !important; font-size: 1.5rem; line-height: 1; color: ' . ($state ? '#ef4444' : '#444') . ';">
                                    C
                                </div>
                            '),

                        TextEntry::make('description')
                            ->label('Detailed Content')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
