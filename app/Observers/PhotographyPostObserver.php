<?php

namespace App\Observers;

use App\Models\PhotographyPost;
use App\Services\FileService;

class PhotographyPostObserver
{
    public function __construct(protected FileService $storage) {}

    public function updated(PhotographyPost $post): void
    {
        if ($post->isDirty('description')) {
            $oldFiles = $this->storage->extractPaths($post->getOriginal('description'));
            $newContent = (string) $post->description;

            $orphaned = array_filter($oldFiles, fn($file) => ! str_contains($newContent, (string) $file));

            $this->storage->delete($orphaned);
        }
    }

    public function deleted(PhotographyPost $post): void
    {
        $this->storage->delete($this->storage->extractPaths($post->description));
        $post->photographies()->each(fn($photo) => $photo->delete());
    }
}
