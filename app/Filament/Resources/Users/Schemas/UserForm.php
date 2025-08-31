<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profile')
                    ->icon('heroicon-o-user')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('username')
                            ->label('Username')
                            ->required()
                            ->maxLength(50),
                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->required(),
                        Select::make('role')
                            ->label('Role')
                            ->options(['Admin' => 'Admin', 'User' => 'User'])
                            ->default('User')
                            ->required(),
                    ]),
                Section::make('About')
                    ->icon('heroicon-o-document-text')
                    ->columnSpanFull()
                    ->schema([
                        Textarea::make('description')
                            ->label('Description')
                            ->rows(3)
                            ->autosize()
                            ->placeholder('Tell us something about yourself...')
                            ->default(null),
                    ]),
            ]);
    }
}
