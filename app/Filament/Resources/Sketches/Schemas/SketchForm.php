<?php

namespace App\Filament\Resources\Sketches\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SketchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Sketch Details')
                    ->icon('heroicon-o-pencil')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->label('Description')
                            ->rows(3)
                            ->maxLength(1000)
                            ->placeholder('Describe your sketch...')
                            ->autosize()
                            ->columnSpanFull(),
                        FileUpload::make('path')
                            ->label('HTML File')
                            ->disk('public')
                            ->directory('sketches')
                            ->acceptedFileTypes(['text/html'])
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
