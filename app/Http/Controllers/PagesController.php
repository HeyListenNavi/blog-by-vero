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

    public function auth(): View
    {
        return view('auth');
    }

    public function login(): View
    {
        return view('auth.login');
    }

    public function register(): View
    {
        return view('auth.register');
    }
    
    public function terminal(): View
    {
        return view('terminal');
    }
}
