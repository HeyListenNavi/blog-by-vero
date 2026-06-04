<?php

namespace App\Filament\Resources\Sketches\Schemas;

use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\PostLinkBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
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
                        RichEditor::make('description')
                            ->label('Description')
                            ->placeholder('Describe your sketch...')
                            ->columnSpanFull()
                            ->customBlocks([
                                PostLinkBlock::class,
                            ]),
                        FileUpload::make('path')
                            ->label('HTML File')
                            ->directory('sketches')
                            ->acceptedFileTypes(['text/html'])
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
