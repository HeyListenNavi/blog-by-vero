<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(Request $request): View
    {
        return view('home', [
            'activeApp' => $request->query('app'),
        ]);
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

    public function fileExplorer(): View
    {
        return view('file-explorer');
    }

    public function musicPlayer(): View
    {
        return view('music-player');
    }
}
