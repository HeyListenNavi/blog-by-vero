<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostTag extends Model
{
    use HasFactory;

    protected $table = 'post_tag';

    protected $fillable = [
        'post_id',
        'tag_id',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
}
