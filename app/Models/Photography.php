<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Photography extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'path',
        'photography_post_id',
    ];

    protected $appends = ['url'];

    public function getUrlAttribute(): ?string
    {
        return $this->path ? Storage::url($this->path) : null;
    }

    public function photographyPost(): BelongsTo
    {
        return $this->belongsTo(PhotographyPost::class);
    }
}
