@extends('layouts.app')

@section('body')
<main x-data="{ page: '{{ $errors->register->any() ? 'register' : 'login' }}' }" class="h-svh w-screen grid grid-rows-[auto_1fr] items-center justify-items-center gap-4 bg-background-primary">
    <header class="w-screen flex">
        <x-button class="w-full" x-on:click="page = 'login'" type="button">Login</x-button>
        <x-button class="w-full" x-on:click="page = 'register'" type="button">Register</x-button>
    </header>

    <div class="w-full h-full max-w-xs mx-auto">
        <form
            method="POST"
            action="{{ route('login.submit') }}"
            class="p-2 h-full flex flex-col justify-center items-center"
            x-show="page == 'login'"
            x-cloak
        >
            @csrf
            <h1>Login</h1>
                
            @if($errors->login->has('credentials'))
                <p class="text-red-500 text-sm">{{ $errors->login->first('credentials') }}</p>
            @endif
                    
            <div class="w-full flex flex-col gap-2">
                <x-text-input
                    label="Email:"
                    id="login_email"
                    type="email"
                    :required="true"
                    placeholder="email"
                    :autofocus="true"
                    value="{{ old('login_email') }}"
                    :error="$errors->login->first('login_email')"
                />
                <x-text-input
                    label="Password:"
                    id="password"
                    type="password"
                    :required="true"
                    placeholder="password"
                    :error="$errors->login->first('password')"
                />

                <label class="flex gap-1 items-center select-none">
                    <input class="accent-highlight" type="checkbox" name="remember">
                    Remember me
                </label>

                <x-button class="self-end" type="submit">Log in</x-button>
            </div>
        </form>
       
        <form
            method="POST"
            action="{{ route('register.submit') }}"
            class="p-2 h-full flex flex-col justify-center items-center"
            x-show="page == 'register'"
            x-cloak
        >
            @csrf
            <h1>Register</h1>
            
            <div class="w-full flex flex-col gap-2">
                <x-text-input
                    label="Email:"
                    id="register_email"
                    type="email"
                    :required="true"
                    placeholder="email"
                    :autofocus="true"
                    value="{{ old('register_email') }}"
                    :error="$errors->register->first('register_email')"
                />

                <x-text-input
                    label="Name:"
                    id="register_name"
                    :required="true"
                    placeholder="name"
                    value="{{ old('register_name') }}"
                    :error="$errors->register->first('register_name')"
                />

                <x-text-input
                    label="Username:"
                    id="register_username"
                    :required="true"
                    placeholder="username"
                    value="{{ old('register_username') }}"
                    :error="$errors->register->first('register_username')"
                />

                <x-text-input
                    label="Password:"
                    id="password"
                    type="password"
                    :required="true"
                    placeholder="password"
                    :error="$errors->register->first('password')"
                />

                <x-text-input
                    label="Password:"
                    id="password_confirmation"
                    type="password"
                    :required="true"
                    placeholder="repeat your password"
                    :error="$errors->register->first('password_confirmation')"
                />

                <x-button class="self-end" type="submit">Register</x-button>
            </div>
        </form>
    </div>
</main>
@endsection