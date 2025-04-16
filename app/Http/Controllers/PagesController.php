<?php

namespace App\Http\Controllers;

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
    return view('journal');
  }

  public function cameraRoll(): View {
    return view('camera-roll');
  }
}
