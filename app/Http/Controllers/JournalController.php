<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index() {
        $posts = Post::with(['tags', 'icon'])
            ->latest()
            ->paginate(10);

        return compact('posts');
    }

    // This is what Laravel internally does when you use the route model binding
    // public function show($postId) {
    //     $post = Post::findOrFail($postId);
    //     return view('layouts.post', ['post' => $post]);
    // }

    public function show(Post $post) {
        return view('layouts.post', ['post' => $post]);
    }
}
