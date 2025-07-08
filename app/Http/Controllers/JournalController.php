<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index() {
        $posts = Post::with(['icon'])
            ->latest()
            ->paginate(10);

        return view('journal', compact('posts'));
    }

    // This is what Laravel internally does when you use the route model binding
    // public function show($postId) {
    //     $post = Post::findOrFail($postId);
    //     return view('layouts.post', ['post' => $post]);
    // }

    public function show(Post $post) {
        $post->load('postImages');
        return view('layouts.post', compact('post'));
    }
}
