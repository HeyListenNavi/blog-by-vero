<?php

namespace App\Filament\Resources\PostImages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PostImageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('path'),
                TextEntry::make('title'),
                TextEntry::make('post.title')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
