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
                Section::make('Post Details')
                    ->icon('heroicon-o-document-text')
                    ->columns(2)
                    ->columnSpanFull()
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
                        ])
                            ->verticallyAlignCenter()
                            ->columnSpanFull(),

                        TextEntry::make('slug')
                            ->label('Slug')
                            ->icon('heroicon-s-link'),

                        TextEntry::make('date')
                            ->label('Post Date')
                            ->date('M d, Y')
                            ->icon('heroicon-s-calendar'),

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

                Section::make('Content')
                    ->icon('heroicon-o-chat-bubble-left-ellipsis')
                    ->columnSpanFull()
                    ->collapsible()
                    ->schema([
                        TextEntry::make('content')
                            ->label('Post Content')
                            ->hiddenLabel()
                            ->markdown(),
                    ]),
            ]);
    }
}
