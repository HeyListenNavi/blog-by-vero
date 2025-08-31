<?php

namespace App\Filament\Resources\Thoughts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ThoughtForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Share a Thought')
                    ->icon('heroicon-o-hashtag')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('mood')
                            ->label('Mood')
                            ->placeholder('How are you feeling?')
                            ->required()
                            ->columnSpanFull()
                            ->maxLength(50),
                        Textarea::make('content')
                            ->label('Content')
                            ->placeholder('What\'s on your mind?')
                            ->rows(4)
                            ->required()
                            ->autosize()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
