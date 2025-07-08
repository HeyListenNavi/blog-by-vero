@extends('layouts.app')

@section('body')
<main x-data="{ page: 'login' }" class="w-screen h-svh grid grid-rows-[auto_1fr] items-center justify-items-center gap-4">
    <header class="w-screen flex">
        <x-button class="w-full" x-on:click="page = 'login'" type="button">Login</x-button>
        <x-button class="w-full" x-on:click="page = 'register'" type="button">Register</x-button>
    </header>

    <div class="w-full h-full">
        <iframe
            x-show="page == 'login'"
            x-cloak
            src="{{ route('login') }}"
            frameborder="0"
            loading="lazy"
            class="w-full h-full"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
        <iframe
            x-show="page == 'register'"
            x-cloak
            src="{{ route('register') }}"
            frameborder="0"
            loading="lazy"
            class="w-full h-full"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </div>
</main>
@endsection