<?php

namespace App\Filament\Resources\PostImages\Pages;

use App\Filament\Resources\PostImages\PostImageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPostImage extends ViewRecord
{
    protected static string $resource = PostImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
