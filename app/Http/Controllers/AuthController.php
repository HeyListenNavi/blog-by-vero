<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request): RedirectResponse {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $messages = [
            'email' => 'An email is required',
            'password' => 'A password is required'
        ];
        
        $credentials = $request->validate($rules, $messages);

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'The email and password don\'t match'
            ]);
        }
        
        $request->session()->regenerate();

        return redirect()->intended();
    }

    public function logout() {
        
    }
}
