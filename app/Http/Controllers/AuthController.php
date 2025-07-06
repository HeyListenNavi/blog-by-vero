<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $messages = [
            'email' => 'An email is required',
            'password' => 'A password is required'
        ];

        $credentials = $request->validate($rules, $messages);

        if (!Auth::attempt($credentials, $request->remember)) {
            throw ValidationException::withMessages([
                'credentials' => 'The email and password don\'t match'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('profile', Auth::user()->id));
    }

    public function register(Request $request): RedirectResponse
    {
        $rules = [
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:255',
            'username' => 'required|max:50|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];

        $messages = [
            'email.required' => 'you must sacrifice your email to Vero (psst, just put your email, she wont steal anything, promise <3)',
            'email.email' => 'what youre not fooling me, thats not an email',
            'email.unique' => 'hmmm, weird, i already have you in my book of users, did you forget your account?',

            'name.required' => 'how am i supposed to call you?!?? please enter your name',
            'name.string' => 'thats for sure not a name dude, enter your actual name',
            'name.max' => 'what, if your name is that long sorry but im not remembering that, put a shorter name or smth',

            'username.required' => 'your username is required :p',
            'username.max' => 'pleeaaasee just use a normal username, i only have space for 50 characters',
            'username.unique' => 'hmmm, weird, i already have you in my book of users, did you forget your account?',

            'password.required' => 'what. do you want everyone in your account? enter your password',
            'password.string' => 'what, just enter a normal characters password',
            'password.min' => 'no way, thats not even long enough to be a password, use at least 8 characters!',
            'password.confirmed' => 'did you make sure both passwords match? i dont think sooo',
        ];

        $credentials = $request->validate($rules, $messages);

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'User',
        ]);

        Auth::login($user);

        return redirect()->route('profile', $user->id);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth');
    }
}
