<?php

namespace App\Models;

use App\Observers\MusicObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[ObservedBy([MusicObserver::class])]
class Music extends Model
{
    protected $table = 'musics';

    protected $casts = [
        'review_date' => 'date',
        'is_favorite' => 'boolean',
    ];

    protected $fillable = [
        'title',
        'artist',
        'type',
        'cover',
        'stars',
        'is_favorite',
        'review_date',
        'description',
    ];

    protected $appends = ['url'];

    public function getUrlAttribute(): ?string
    {
        return $this->cover ? Storage::url($this->cover) : null;
    }
}
