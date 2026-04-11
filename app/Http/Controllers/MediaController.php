<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mediaList = Media::latest('review_date')->paginate(12);
        return view('media', compact('mediaList'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        return view('layouts.media-show', compact('media'));
    }
}
