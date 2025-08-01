<?php

namespace App\Filament\Resources\PhotographyPosts\Pages;

use App\Filament\Resources\PhotographyPosts\PhotographyPostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePhotographyPost extends CreateRecord
{
    protected static string $resource = PhotographyPostResource::class;
}
