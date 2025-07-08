@extends('layouts.app')

@section('body')
<form method="POST" action="{{ route('register.submit') }}" class="p-2 max-w-xs mx-auto" target="_parent">
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
@endsection