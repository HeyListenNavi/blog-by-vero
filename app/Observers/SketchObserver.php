<?php

namespace App\Observers;

use App\Models\Sketch;
use App\Services\FileService;

class SketchObserver
{
    public function __construct(protected FileService $storage) {}

    public function updated(Sketch $sketch): void
    {
        if ($sketch->isDirty('path')) {
            $this->storage->delete($sketch->getOriginal('path'));
        }
    }

    public function deleted(Sketch $sketch): void
    {
        $this->storage->delete($sketch->path);
    }
}
