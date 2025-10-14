<?php

namespace App\Filament\Resources\Sketches\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SketchInfolist
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
                        TextEntry::make('title')
                            ->label('Title'),
                        TextEntry::make('description')
                            ->label('Description')
                            ->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->label('Created')
                            ->dateTime('M d, Y H:i')
                            ->icon('heroicon-s-calendar'),
                        TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime('M d, Y H:i')
                            ->icon('heroicon-s-clock'),
                    ]),
                Section::make('Preview')
                    ->icon('heroicon-o-code-bracket')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('path')
                            ->label('HTML Preview')
                            ->html(fn ($record) => 
                                '<iframe src="' . asset('storage/' . $record->path) . '" style="width:100%;height:500px;border:none;"></iframe>'
                            )
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
