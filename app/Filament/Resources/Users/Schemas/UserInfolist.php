<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profile')
                    ->icon('heroicon-o-user')
                    ->description('Basic user details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('name')
                            ->label('Full Name')
                            ->icon('heroicon-s-identification'),
                        TextEntry::make('username')
                            ->label('Username')
                            ->icon('heroicon-s-at-symbol'),
                        TextEntry::make('email')
                            ->label('Email Address')
                            ->icon('heroicon-s-envelope'),
                        TextEntry::make('description')
                            ->label('Description')
                            ->columnSpanFull()
                    ]),
                Section::make('Account Details')
                    ->icon('heroicon-o-cog')
                    ->description('Account creation and update info')
                    ->columns(3)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('role')
                            ->label('Role')
                            ->badge()
                            ->icon('heroicon-s-shield-check'),
                        TextEntry::make('created_at')
                            ->label('Created')
                            ->dateTime('M d, Y H:i')
                            ->icon('heroicon-s-calendar'),
                        TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime('M d, Y H:i')
                            ->icon('heroicon-s-clock'),
                    ]),
            ]);
    }
}
