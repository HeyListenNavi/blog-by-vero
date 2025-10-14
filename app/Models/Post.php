<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'date',
        'icon_id',
    ];

    public function icon(): BelongsTo
    {
        return $this->belongsTo(Icon::class);
    }

    public function postImages(): HasMany
    {
        return $this->hasMany(PostImage::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted()
    {
        parent::boot();
        
        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);

            $originalSlug = $post->slug;
            $count = 1;
            
            while (static::where('slug', $post->slug)->exists()) {
                $post->slug = $originalSlug . '-' . $count++;
            }
        });
    }
}
