<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(): View
    {
        return view('home-test');
    }

    public function aboutMe(): View
    {
        return view('about-me');
    }

    public function journal(): View
    {
        $posts = (new JournalController)->index();
        return view('journal', $posts);
    }

    public function camera(): View
    {
        $posts = (new PhotographyPostController)->index();
        return view('camera', $posts);
    }

    public function auth(): View
    {
        return view('auth');
    }
    
    public function terminal(): View
    {
        return view('terminal');
    }
}
