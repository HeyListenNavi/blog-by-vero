<?php

namespace App\Observers;

use App\Models\Post;
use App\Services\FileService;

class PostObserver
{
    public function __construct(protected FileService $storage) {}

    public function updated(Post $post): void
    {
        if ($post->isDirty('content')) {
            $oldFiles = $this->storage->extractPaths($post->getOriginal('content'));
            $newContent = (string) $post->content;

            $orphaned = array_filter($oldFiles, fn($file) => ! str_contains($newContent, (string) $file));

            $this->storage->delete($orphaned);
        }
    }

    public function deleted(Post $post): void
    {
        $this->storage->delete($this->storage->extractPaths($post->content));
        $post->postImages()->each(fn($image) => $image->delete());
    }
}
