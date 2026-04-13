<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
    /**
     * Delete one or many files from storage.
     */
    public function delete(string|array|null $files): void
    {
        Storage::delete(array_filter((array) $files));
    }

    /**
     * Extract relative storage paths from Markdown or HTML content.
     */
    public function extractPaths(?string $content): array
    {
        if (!$content) return [];

        $baseUrl = Storage::url('');
        
        preg_match_all('/!\[.*?\]\((.*?)\)|<img.*?src=["\'](.*?)["\'].*?>/i', $content, $matches);
        $urls = array_unique(array_filter(array_merge($matches[1], $matches[2])));

        return array_map(function ($url) use ($baseUrl) {
            return str_starts_with($url, $baseUrl) 
                ? ltrim(str_replace($baseUrl, '', $url), '/') 
                : null;
        }, $urls);
    }
}
