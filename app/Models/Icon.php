<?php

namespace App\Models;

use App\Observers\IconObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

#[ObservedBy([IconObserver::class])]
class Icon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
    ];

    protected $appends = ['url'];

    public function getUrlAttribute(): ?string
    {
        return $this->path ? Storage::url($this->path) : null;
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function photographyPosts(): HasMany
    {
        return $this->hasMany(PhotographyPost::class);
    }
}
