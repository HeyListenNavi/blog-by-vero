<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('community', compact('users'));
    }

    public function show(User $user)
    {
        $user->load('comments');

        $isLoggedInProfile = Auth::check() && ($user->id === Auth::user()->id);

        return view('profile', compact('user', 'isLoggedInProfile'));
    }
}
