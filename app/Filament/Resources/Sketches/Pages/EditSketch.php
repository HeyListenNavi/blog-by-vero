<?php

namespace App\Filament\Resources\Sketches\Pages;

use App\Filament\Resources\Sketches\SketchResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSketch extends EditRecord
{
    protected static string $resource = SketchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
