<?php

namespace App\Models;

use App\Observers\PhotographyPostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([PhotographyPostObserver::class])]
class PhotographyPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon_id',
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
