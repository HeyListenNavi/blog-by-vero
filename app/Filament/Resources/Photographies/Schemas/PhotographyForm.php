<?php

namespace App\Filament\Resources\Photographies\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PhotographyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->default(null),
                TextInput::make('path')
                    ->required(),
                Select::make('photography_post_id')
                    ->relationship('photographyPost', 'title')
                    ->required(),
            ]);
    }
}
