<?php

namespace App\Filament\Pages;

use App\Filament\Resources\PhotographyPosts\PhotographyPostResource;
use App\Models\Photography;
use Filament\Pages\Page;
use Illuminate\Pagination\LengthAwarePaginator;

class PhotographyGallery extends Page
{
    protected static ?string $slug = 'photography-gallery';

    protected static bool $shouldRegisterNavigation = false;

    protected string $view = 'filament.pages.photography-gallery';

    public int $perPage = 30;

    public function getPhotographies(): LengthAwarePaginator
    {
        return Photography::query()
            ->with('photographyPost')
            ->latest()
            ->paginate($this->perPage);
    }

    public function loadMore(): void
    {
        $this->perPage += 30;
    }

    public function getPostUrl(Photography $photography): string
    {
        return PhotographyPostResource::getUrl('view', ['record' => $photography->photographyPost]);
    }
}
