<?php

namespace App\Observers;

use App\Models\Icon;
use App\Services\FileService;

class IconObserver
{
    public function __construct(protected FileService $storage) {}

    public function updated(Icon $icon): void
    {
        if ($icon->isDirty('path')) {
            $this->storage->delete($icon->getOriginal('path'));
        }
    }

    public function deleted(Icon $icon): void
    {
        $this->storage->delete($icon->path);
    }
}
