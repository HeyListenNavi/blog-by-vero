<?php

namespace App\Filament\Schemas;

use Filament\Forms\Components\FileUpload;
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

                FileUpload::make('path')
                    ->label('Icon')
                    ->disk('public')
                    ->directory('icons')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios(['1:1'])
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->required(),
            ]);
    }
}
