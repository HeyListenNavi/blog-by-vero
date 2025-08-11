<?php

namespace App\Filament\Resources\PhotographyPosts\Schemas;

use App\Models\Photography;
use App\Models\PhotographyPost;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PhotographyPostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Camera Roll')
                    ->columns(2)
                    ->schema([
                        Flex::make([
                            ImageEntry::make('icon.path')
                                ->hiddenLabel()
                                ->grow(false),
                            TextEntry::make('title'),
                        ])
                            ->verticallyAlignCenter()
                            ->columnSpanFull(),
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
                Section::make('Description')
                    ->collapsible()
                    ->schema([
                        TextEntry::make('description')
                            ->hiddenLabel(),
                    ]),
                Section::make('Photographies')
                    ->columnSpanFull()
                    ->collapsible()
                    ->schema([
                        RepeatableEntry::make('photographies')
                            ->schema([
                                Section::make(fn(Photography $photography): string => $photography->title)
                                    ->schema([
                                        ImageEntry::make('path')
                                            ->hiddenLabel()
                                            ->imageWidth('100%')
                                            ->imageHeight('auto')
                                    ])
                            ])
                            ->grid(2)
                            ->gap('2rem')
                            ->hiddenLabel()
                            ->contained(false),
                    ]),
            ]);
    }
}
