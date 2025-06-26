<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Site extends Model
{
    /** @use HasFactory<\Database\Factories\SiteFactory> */
    use HasFactory;

    protected $fillable = [
        'site_id',
    ];

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
