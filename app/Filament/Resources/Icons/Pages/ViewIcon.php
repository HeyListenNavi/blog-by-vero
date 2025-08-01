<?php

namespace App\Filament\Resources\Icons\Pages;

use App\Filament\Resources\Icons\IconResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewIcon extends ViewRecord
{
    protected static string $resource = IconResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
