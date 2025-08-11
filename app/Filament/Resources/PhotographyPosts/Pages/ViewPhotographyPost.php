<?php

namespace App\Filament\Resources\PhotographyPosts\Pages;

use App\Filament\Resources\PhotographyPosts\PhotographyPostResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPhotographyPost extends ViewRecord
{
    protected static string $resource = PhotographyPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
