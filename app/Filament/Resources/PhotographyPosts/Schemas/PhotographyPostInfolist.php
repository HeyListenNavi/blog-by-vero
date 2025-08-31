<?php

namespace App\Filament\Resources\PhotographyPosts\Schemas;

use App\Models\Photography;
use App\Models\PhotographyPost;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class PhotographyPostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Camera Roll')
                    ->icon('heroicon-o-camera')
                    ->columns(2)
                    ->schema([
                        Flex::make([
                            ImageEntry::make('icon.path')
                                ->disk('public')
                                ->hiddenLabel()
                                ->grow(false)
                                ->imageWidth('64px')
                                ->imageHeight('64px'),
                            TextEntry::make('title')
                                ->label('Title')
                                ->size('xl'),
                        ])
                            ->verticallyAlignCenter()
                            ->columnSpanFull(),

                        TextEntry::make('created_at')
                            ->label('Published At')
                            ->badge()
                            ->color('success')
                            ->dateTime('M d, Y H:i')
                            ->icon('heroicon-s-calendar'),

                        TextEntry::make('updated_at')
                            ->label('Last Update')
                            ->badge()
                            ->color('gray')
                            ->dateTime('M d, Y H:i')
                            ->icon('heroicon-s-clock'),
                    ]),

                Section::make('Description')
                    ->icon('heroicon-o-document-text')
                    ->collapsible()
                    ->schema([
                        TextEntry::make('description')
                            ->markdown()
                            ->hiddenLabel(),
                    ]),

                Section::make('Photographies')
                    ->icon('heroicon-o-photo')
                    ->columnSpanFull()
                    ->collapsible()
                    ->schema([
                        RepeatableEntry::make('photographies')
                            ->label('Photos')
                            ->schema([
                                Section::make(fn(Photography $photography): string => $photography->title)
                                    ->schema([
                                        ImageEntry::make('path')
                                            ->hiddenLabel()
                                            ->imageWidth('100%')
                                            ->imageHeight('auto'),
                                    ]),
                            ])
                            ->grid(2)
                            ->gap('2rem')
                            ->hiddenLabel()
                            ->contained(false),
                    ]),
            ]);
    }
}
