<?php

namespace App\Filament\Resources\PhotographyPosts\Pages;

use App\Filament\Resources\PhotographyPosts\PhotographyPostResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPhotographyPost extends EditRecord
{
    protected static string $resource = PhotographyPostResource::class;

    protected array $bulkPhotos = [];

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->bulkPhotos = $data['bulk_photos'] ?? [];
        unset($data['bulk_photos']);

        return $data;
    }

    protected function afterSave(): void
    {
        foreach ($this->bulkPhotos as $path) {
            $this->record->photographies()->create([
                'path' => $path,
            ]);
        }
    }
}
