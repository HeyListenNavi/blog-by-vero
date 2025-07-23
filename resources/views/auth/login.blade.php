@extends('layouts.app')

@section('body')
<form method="POST" action="{{ route('login.submit') }}" class="p-2 max-w-xs mx-auto">
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
@endsection