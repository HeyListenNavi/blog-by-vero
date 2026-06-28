<?php

namespace App\Filament\Resources\PhotographyPosts\Pages;

use App\Filament\Resources\PhotographyPosts\PhotographyPostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePhotographyPost extends CreateRecord
{
    protected static string $resource = PhotographyPostResource::class;

    protected array $bulkPhotos = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->bulkPhotos = $data['bulk_photos'] ?? [];
        unset($data['bulk_photos']);

        return $data;
    }

    protected function afterCreate(): void
    {
        foreach ($this->bulkPhotos as $path) {
            $this->record->photographies()->create([
                'path' => $path,
            ]);
        }
    }
}
