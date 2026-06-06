<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Playlist;

class MusicController extends Controller
{
    public function index()
    {
        $musicList = Music::latest('review_date')->paginate(12);
        $playlists = Playlist::latest()->get();
        return view('music-and-playlists', compact('musicList', 'playlists'));
    }
}
