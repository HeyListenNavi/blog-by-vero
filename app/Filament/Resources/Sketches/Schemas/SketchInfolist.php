<?php

namespace App\Filament\Resources\Sketches\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SketchInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('path'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
