<?php

namespace App\Observers;

use App\Models\Photography;
use App\Services\FileService;

class PhotographyObserver
{
    public function __construct(protected FileService $storage) {}

    public function updated(Photography $photo): void
    {
        if ($photo->isDirty('path')) {
            $this->storage->delete($photo->getOriginal('path'));
        }
    }

    public function deleted(Photography $photo): void
    {
        $this->storage->delete($photo->path);
    }
}
