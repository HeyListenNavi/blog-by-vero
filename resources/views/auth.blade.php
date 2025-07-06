@extends('layouts.app')

@section('body')
<div x-data="{ page: 0 }" class="w-screen h-svh grid grid-rows-[auto_1fr] items-center justify-items-center gap-4">
    <div class="w-screen flex">
        <x-button class="w-full" x-on:click="page = 0" type="button">Login</x-button>
        <x-button class="w-full" x-on:click="page = 1" type="button">Register</x-button>
    </div>

    <div class="max-w-xs">
        <form x-cloak x-show="page === 0" method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Login</h1>
        
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color: red">{{ $error }}</p>
                @endforeach
            @endif
            
            <div class="flex flex-col gap-2">
                <x-text-input
                    label="Email:"
                    id="email"
                    type="email"
                    :required="true"
                    placeholder="email"
                    :autofocus="true"
                    value="{{ old('email') }}"
                />
                <x-text-input
                    label="Password:"
                    id="password"
                    type="password"
                    :required="true"
                    placeholder="password"
                />
        
                <label class="flex gap-1 items-center select-none">
                    <input class="accent-highlight" type="checkbox" name="remember">
                    Remember me
                </label>
        
                <x-button class="self-end" type="submit">Log in</x-button>
            </div>
        </form>
        
        <form x-cloak x-show="page === 1" method="POST" action="{{ route('register') }}">
            @csrf
            <h1>Register</h1>
        
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color: red">{{ $error }}</p>
                @endforeach
            @endif
            
            <div class="flex flex-col gap-2">
                <x-text-input
                    label="Email:"
                    id="email"
                    type="email"
                    :required="true"
                    placeholder="email"
                    :autofocus="true"
                    value="{{ old('email') }}"
                />
        
                <x-text-input
                    label="Name:"
                    id="name"
                    :required="true"
                    placeholder="name"
                    value="{{ old('name') }}"
                />
        
                <x-text-input
                    label="Username:"
                    id="username"
                    :required="true"
                    placeholder="username"
                    value="{{ old('username') }}"
                />
        
                <x-text-input
                    label="Password:"
                    id="password"
                    type="password"
                    :required="true"
                    placeholder="password"
                />
        
                <x-text-input
                    label="Password:"
                    id="password_confirmation"
                    type="password"
                    :required="true"
                    placeholder="repeat your password"
                />
        
                <x-button class="self-end" type="submit">Register</x-button>
            </div>
        </form>
    </div>
</div>
@endsection