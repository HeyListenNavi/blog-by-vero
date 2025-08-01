<?php

namespace App\Filament\Resources\PostImages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('path')
                    ->required(),
                TextInput::make('title')
                    ->default(null),
                Select::make('post_id')
                    ->relationship('post', 'title')
                    ->required(),
            ]);
    }
}
