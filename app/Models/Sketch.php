<?php

namespace App\Models;

use App\Observers\SketchObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[ObservedBy([SketchObserver::class])]
class Sketch extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'path',
    ];

    protected $appends = ['url'];

    public function getUrlAttribute(): ?string
    {
        return $this->path ? Storage::url($this->path) : null;
    }
}
