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

        return compact('users');
    }

    public function show(User $user)
    {
        $user->load('comments');

        $isLoggedInProfile = false;
        if (Auth::check()) {
            $isLoggedInProfile = ($user->id === Auth::user()->id);
        };

        return view('profile', compact('user', 'isLoggedInProfile'));
    }
}
