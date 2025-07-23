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
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'description' => 'nullable|string|max:1000',
        ];

        $messages = [
            'email.required' => 'you must sacrifice your email to Vero (psst, just put your email, she wont steal anything, promise <3)',
            'email.email' => 'what youre not fooling me, thats not an email',
            'email.unique' => 'hmmm, weird, i already have you in my book of users, did you forget your account?',

            'name.required' => 'how am i supposed to call you?!?? please enter your name',
            'name.string' => 'thats for sure not a name dude, enter your actual name',
            'name.max' => 'what, if your name is that long sorry but im not remembering that, put a shorter name or smth',

            'username.required' => 'your username is required :p',
            'username.string' => 'thats simply not an username wtf',
            'username.max' => 'pleeaaasee just use a normal username, i only have space for 50 characters',
            'username.unique' => 'hmmm, weird, i already have you in my book of users, did you forget your account?',

            'password.required' => 'what. do you want everyone in your account? enter your password',
            'password.string' => 'what, just enter a normal characters password',
            'password.min' => 'no way, thats not even long enough to be a password, use at least 8 characters!',
            'password.confirmed' => 'did you make sure both passwords match? i dont think sooo',

            'description.string' => 'uh thats not a description',
            'description.max' => 'i love yappers but i can not store that much ;_;',
        ];

        $credentials = $request->validate($rules, $messages);

        $user = User::create([
            'username' => $credentials['username'],
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
            'description' => $credentials['description'],
            'role' => 'User',
        ]);

        Auth::login($user);

        return redirect()->route('profile', $user);
    }

    public function login(Request $request)
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

        $isLoggedInProfile = Auth::check() && ($user->id === Auth::user()->id);

        return view('profile', compact('user', 'isLoggedInProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:users',
            'description' => 'nullable|string|max:1000',
        ];

        $messages = [
            'name.required' => 'how am i supposed to call you?!?? please enter your name',
            'name.string' => 'thats for sure not a name dude, enter your actual name',
            'name.max' => 'what, if your name is that long sorry but im not remembering that, put a shorter name or smth',

            'username.required' => 'your username is required :p',
            'username.string' => 'thats simply not an username wtf',
            'username.max' => 'pleeaaasee just use a normal username, i only have space for 50 characters',
            'username.unique' => 'hmmm, weird, i already have you in my book of users, did you forget your account?',

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
