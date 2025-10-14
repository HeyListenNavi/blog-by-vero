<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['icon'])
            ->latest()
            ->paginate(10);

        return view('journal', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('postImages');
        return view('layouts.post', compact('post'));
    }
}
