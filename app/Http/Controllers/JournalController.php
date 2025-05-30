<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function postList() {
        $posts = ['posts' => Post::with(['tags', 'icon'])->get()];

        return $posts;
    }
}
