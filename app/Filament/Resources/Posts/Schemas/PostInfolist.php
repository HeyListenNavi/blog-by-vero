<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Flex;
use Filament\Infolists\Components\ImageEntry;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Post')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        Flex::make([
                            ImageEntry::make('icon.path')
                                ->disk('public')
                                ->hiddenLabel()
                                ->grow(false),
                            TextEntry::make('title'),
                        ])
                            ->verticallyAlignCenter()
                            ->columnSpanFull(),
                            
                        TextEntry::make('slug'),

                        TextEntry::make('date')
                            ->date(),

                        TextEntry::make('created_at')
                            ->label('Published at')
                            ->badge()
                            ->color('success')
                            ->dateTime(),

                        TextEntry::make('updated_at')
                            ->label('Last Update')
                            ->badge()
                            ->color('gray')
                            ->dateTime(),
                    ]),

                Section::make('Content')
                    ->columnSpanFull()
                    ->collapsible()
                    ->schema([
                        TextEntry::make('content')
                            ->hiddenLabel()
                            ->markdown()
                    ])
            ]);
    }
}
