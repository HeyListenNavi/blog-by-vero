<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PhotographyPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function photographies(): HasMany
    {
        return $this->hasMany(Photography::class);
    }

    public function icon(): BelongsTo
    {
        return $this->belongsTo(Icon::class);
    }
}
