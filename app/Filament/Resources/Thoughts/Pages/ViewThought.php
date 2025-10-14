<?php

namespace App\Filament\Resources\Thoughts\Pages;

use App\Filament\Resources\Thoughts\ThoughtResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewThought extends ViewRecord
{
    protected static string $resource = ThoughtResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
