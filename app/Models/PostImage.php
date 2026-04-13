<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class PostImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'path',
        'post_id',
    ];

    protected $appends = ['url'];

    public function getUrlAttribute(): ?string
    {
        return $this->path ? Storage::url($this->path) : null;
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
