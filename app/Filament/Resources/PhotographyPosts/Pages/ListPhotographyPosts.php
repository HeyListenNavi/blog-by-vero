<?php

namespace App\Filament\Resources\PhotographyPosts\Pages;

use App\Filament\Pages\PhotographyGallery;
use App\Filament\Resources\PhotographyPosts\PhotographyPostResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPhotographyPosts extends ListRecords
{
    protected static string $resource = PhotographyPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('gallery')
                ->label('Gallery')
                ->icon('heroicon-o-photo')
                ->url(PhotographyGallery::getUrl()),
            CreateAction::make(),
        ];
    }
}
