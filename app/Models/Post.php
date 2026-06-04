<?php

namespace App\Models;

use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

#[ObservedBy([PostObserver::class])]
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

    protected $casts = [
        'date' => 'date',
    ];

    public function icon(): BelongsTo
    {
        return $this->belongsTo(Icon::class);
    }

    public function postImages(): HasMany
    {
        return $this->hasMany(PostImage::class);
    }

    public function previous(): ?Post
    {
        return static::where('created_at', '<', $this->created_at)
            ->orWhere(function ($query) {
                $query->where('created_at', $this->created_at)
                      ->where('id', '<', $this->id);
            })
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->first();
    }

    public function next(): ?Post
    {
        return static::where('created_at', '>', $this->created_at)
            ->orWhere(function ($query) {
                $query->where('created_at', $this->created_at)
                      ->where('id', '>', $this->id);
            })
            ->orderBy('created_at', 'asc')
            ->orderBy('id', 'asc')
            ->first();
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
