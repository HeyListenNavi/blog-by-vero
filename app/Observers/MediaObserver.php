<?php

namespace App\Observers;

use App\Models\Media;
use App\Services\FileService;

class MediaObserver
{
    public function __construct(protected FileService $storage) {}

    public function updated(Media $media): void
    {
        if ($media->isDirty('poster')) {
            $this->storage->delete($media->getOriginal('poster'));
        }

        if ($media->isDirty('content')) {
            $oldFiles = $this->storage->extractPaths($media->getOriginal('content'));
            $newContent = (string) $media->content;

            $orphaned = array_filter($oldFiles, fn($file) => ! str_contains($newContent, (string) $file));

            $this->storage->delete($orphaned);
        }
    }

    public function deleted(Media $media): void
    {
        $this->storage->delete($media->poster);
        $this->storage->delete($this->storage->extractPaths($media->content));
    }
}
