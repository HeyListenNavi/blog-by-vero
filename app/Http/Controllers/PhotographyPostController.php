<?php

namespace App\Http\Controllers;

use App\Models\PhotographyPost;
use Illuminate\Http\Request;

class PhotographyPostController extends Controller
{
    public function index()
    {
        $posts = PhotographyPost::with(['icon'])
            ->latest()
            ->paginate(1);

        return compact('posts');
    }

    public function show(PhotographyPost $post)
    {
        $post->load('photographies');
        return view('layouts.camera-roll', compact('post'));
    }
}
