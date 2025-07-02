<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show() {
        $site = Site::first();
        $site->load('comments');
        
        return view('comments', compact('site'));
    }
}
