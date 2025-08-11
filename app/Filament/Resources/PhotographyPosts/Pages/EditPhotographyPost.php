<?php

namespace App\Filament\Resources\PhotographyPosts\Pages;

use App\Filament\Resources\PhotographyPosts\PhotographyPostResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPhotographyPost extends EditRecord
{
    protected static string $resource = PhotographyPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
