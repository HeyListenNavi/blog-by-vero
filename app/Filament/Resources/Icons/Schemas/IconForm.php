<?php

namespace App\Filament\Resources\Icons\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class IconForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('path')
                    ->required(),
            ]);
    }
}
