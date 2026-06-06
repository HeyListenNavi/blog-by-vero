<?php

namespace App\Filament\Resources\Playlist\Pages;

use App\Filament\Resources\Playlist\PlaylistResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPlaylist extends ViewRecord
{
    protected static string $resource = PlaylistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()->icon('heroicon-o-pencil'),
        ];
    }
}
