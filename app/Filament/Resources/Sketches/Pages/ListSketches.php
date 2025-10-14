<?php

namespace App\Filament\Resources\Sketches\Pages;

use App\Filament\Resources\Sketches\SketchResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSketches extends ListRecords
{
    protected static string $resource = SketchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
