<?php

namespace App\Http\Controllers;

use App\Models\PhotographyPost;
use Illuminate\Http\Request;

class PhotographyPostController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photographyPosts = PhotographyPost::with(['icon'])
            ->latest()
            ->paginate(10);

        return view('camera', compact('photographyPosts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotographyPost $photographyPost)
    {
        $photographyPost->load('photographies');
        return view('layouts.camera-roll', compact('photographyPost'));
    }
}
