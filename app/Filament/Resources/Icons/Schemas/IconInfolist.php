<?php

namespace App\Filament\Resources\Icons\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class IconInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('path'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
