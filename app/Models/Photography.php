<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photography extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'photography',
        'photography_post_id',
    ];

    public function photographyPost(): BelongsTo
    {
        return $this->belongsTo(PhotographyPost::class);
    }
}
