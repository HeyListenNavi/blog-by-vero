<?php

namespace App\Filament\Resources\Thoughts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ThoughtInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Thought')
                    ->icon('heroicon-o-pencil-square')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('mood')
                            ->label('Mood'),
                        TextEntry::make('content')
                            ->label('Content')
                            ->markdown()
                            ->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->label('Posted')
                            ->dateTime('M d, Y H:i')
                            ->icon('heroicon-s-calendar'),
                        TextEntry::make('updated_at')
                            ->label('Updated')
                            ->dateTime('M d, Y H:i')
                            ->icon('heroicon-s-clock'),
                    ]),
            ]);
    }
}
