<?php

namespace App\Observers;

use App\Models\Music;
use App\Services\FileService;

class MusicObserver
{
    public function __construct(protected FileService $storage) {}

    public function updated(Music $music): void
    {
        if ($music->isDirty('cover')) {
            $this->storage->delete($music->getOriginal('cover'));
        }

        if ($music->isDirty('content')) {
            $oldFiles = $this->storage->extractPaths($music->getOriginal('content'));
            $newContent = (string) $music->content;

            $orphaned = array_filter($oldFiles, fn($file) => ! str_contains($newContent, (string) $file));

            $this->storage->delete($orphaned);
        }
    }

    public function deleted(Music $music): void
    {
        $this->storage->delete($music->cover);
        $this->storage->delete($this->storage->extractPaths($music->content));
    }
}
