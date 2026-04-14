<?php

namespace App\Models;

use App\Observers\MediaObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[ObservedBy([MediaObserver::class])]
class Media extends Model
{
    protected $casts = [
        'review_date' => 'date',
        'is_favorite' => 'boolean',
    ];

    protected $fillable = [
        'title',
        'type',
        'poster',
        'stars',
        'is_favorite',
        'review_date',
        'content',
    ];

    protected $appends = ['url'];

    public function getUrlAttribute(): ?string
    {
        return $this->poster ? Storage::url($this->poster) : null;
    }
}
