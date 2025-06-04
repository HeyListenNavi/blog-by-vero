<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
  public function home(): View {
    return view('home');
  }

  public function aboutMe(): View {
    return view('about-me');
  }

  public function journal(): View {
    $posts = (new JournalController)->index();
    return view('journal', $posts);
  }
  
  public function cameraRoll(): View {
    return view('camera-roll');
  }
}
