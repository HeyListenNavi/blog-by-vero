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
        return view('home');
    }

    public function aboutMe(): View
    {
        return view('about-me');
    }

    public function auth(): View
    {
        return view('auth');
    }

    public function terminal(): View
    {
        return view('terminal');
    }

    public function decobar(): View
    {
        return view('decobar');
    }

    public function sidebar(): View
    {
        return view('sidebar');
    }

    public function welcome(): View
    {
        return view('welcome');
    }
}
