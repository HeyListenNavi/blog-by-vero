<?php

namespace App\Observers;

use App\Models\PostImage;
use App\Services\FileService;

class PostImageObserver
{
    public function __construct(protected FileService $storage) {}

    public function updated(PostImage $image): void
    {
        if ($image->isDirty('path')) {
            $this->storage->delete($image->getOriginal('path'));
        }
    }

    public function deleted(PostImage $image): void
    {
        $this->storage->delete($image->path);
    }
}
