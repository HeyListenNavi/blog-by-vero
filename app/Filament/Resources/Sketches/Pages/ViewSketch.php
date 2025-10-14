<?php

namespace App\Filament\Resources\Sketches\Pages;

use App\Filament\Resources\Sketches\SketchResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSketch extends ViewRecord
{
    protected static string $resource = SketchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
