<?php

namespace App\Filament\Resources\Comments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CommentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name'),

                TextEntry::make('user.username'),

                TextEntry::make('user.email'),

                TextEntry::make('created_at')
                    ->dateTime('d-M-y h:i A'),
                    
                TextEntry::make('content')
                    ->columnSpanFull(),
            ]);
    }
}
