<?php

namespace App\Filament\Resources\Photographies\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PhotographyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('path'),
                TextEntry::make('photographyPost.title')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
