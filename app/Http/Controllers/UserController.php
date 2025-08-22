<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('community', compact('users'));
    }

    public function register(Request $request)
    {
        $rules = [
            'register_email' => 'required|email|unique:users,email',
            'register_name' => 'required|string|max:255',
            'register_username' => 'required|string|max:50|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
            'description' => 'nullable|string|max:1000',
        ];

        $messages = [
            'register_email.required' => 'you must sacrifice your email to Vero (psst, just put your email, she wont steal anything, promise <3)',
            'register_email.email' => 'what youre not fooling me, thats not an email',
            'register_email.unique' => 'hmmm, weird, i already have you in my book of users, did you forget your account?',

            'register_name.required' => 'how am i supposed to call you?!?? please enter your name',
            'register_name.string' => 'thats for sure not a name dude, enter your actual name',
            'register_name.max' => 'what, if your name is that long sorry but im not remembering that, put a shorter name or smth',

            'register_username.required' => 'your username is required :p',
            'register_username.string' => 'thats simply not an username wtf',
            'register_username.max' => 'pleeaaasee just use a normal username, i only have space for 50 characters',
            'register_username.unique' => 'hmmm, weird, i already have you in my book of users, did you forget your account?',

            'password.required' => 'what. do you want everyone in your account? enter your password',
            'password.string' => 'what, just enter a normal characters password',
            'password.min' => 'no way, thats not even long enough to be a password, use at least 8 characters!',
            'password.confirmed' => 'did you make sure both passwords match? i dont think sooo',

            'description.string' => 'uh thats not a description',
            'description.max' => 'i love yappers but i can not store that much ;_;',
        ];

        $credentials = $request->validateWithBag('register', $rules, $messages);

        $user = User::create([
            'username' => $credentials['register_username'],
            'name' => $credentials['register_name'],
            'email' => $credentials['register_email'],
            'password' => bcrypt($credentials['password']),
            'description' => $credentials['description'] ?? null,
            'role' => 'User',
        ]);

        Auth::login($user, $request->remember);

        return redirect()->route('profile', $user);
    }

    public function login(Request $request)
    {
        $rules = [
            'login_email' => 'required|email',
            'password' => 'required'
        ];

        $messages = [
            'login_email' => 'An email is required',
            'password' => 'A password is required'
        ];

        $credentials = $request->validateWithBag('login', $rules, $messages);

        if (!Auth::attempt(['email' => $credentials['login_email'], 'password' => $credentials['password']], $request->remember)) {
            throw ValidationException::withMessages([
                'credentials' => 'The email and password don\'t match'
            ])->errorBag('login');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('profile', Auth::user()));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load('comments');

        return view('profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();

        return view('profile-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:50|unique:users,username,' . $user->id,
            'description' => 'nullable|string|max:1000',
        ];

        $messages = [
            'email.email' => 'what youre not fooling me, thats not an email',
            'email.unique' => 'you cant steal someone elses email you know...',

            'name.string' => 'thats for sure not a name dude, enter your actual name',
            'name.max' => 'what, if your name is that long sorry but im not remembering that, put a shorter name or smth',

            'username.string' => 'thats simply not an username wtf',
            'username.max' => 'pleeaaasee just use a normal username, i only have space for 50 characters',
            'username.unique' => 'that username is already in use :(',

            'description.string' => 'uh thats not a description',
            'description.max' => 'i love yappers but i can not store that much ;_;',
        ];

        $validated = $request->validate($rules, $messages);

        $user->update($validated);

        return redirect()->route('profile', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('auth');
    }
}
