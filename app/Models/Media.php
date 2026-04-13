<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
