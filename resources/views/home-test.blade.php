@extends('layouts.desktop')

@section('title', 'this is home')

@section('content')
<main class="flex flex-col flex-wrap h-full content-start">
    <x-desktop-icon
        name="Journal"
        extension="md"
        description="bunch of rambles compressed into a list"
        location="/home/naviheylisten/vero/thoughts"
    >
        <iframe
            src="{{ route('journal') }}"
            frameborder="0"
            loading="lazy"
            class="w-[90vw] h-[70vh] max-h-[700px] max-w-[600px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Camera Roll"
        extension="psd"
        description="all of veronicas camera roll"
        location="/home/naviheylisten/vero/camera"
    >
        <iframe
            src="{{ route('camera') }}"
            frameborder="0"
            loading="lazy"
            class="w-[90vw] h-[60vh] max-h-[650px] max-w-[600px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Comments"
        extension="txt"
        description="leave any comments you'd like here"
        location="/home/naviheylisten/blog/"
        :buttons="['close']"
    >
        <iframe
            src="{{ route('comments') }}"
            frameborder="0"
            loading="lazy"
            class="w-[90vw] h-[60vh] max-h-[500px] max-w-[300px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Profile"
        extension="user"
        description="create your very own profile"
        location="/profiles"
    >
        <iframe
            @guest
            src="{{ route('auth') }}"
            @endguest

            @auth
            src="{{ route('profile', Auth::user()) }}"
            @endauth
            
            frameborder="0"
            loading="lazy"
            class="w-[90vw] h-[60vh] max-h-[600px] max-w-[600px]"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Terminal"
        extension=""
        description="checkout all these crazy commands"
        location="/usr/bin/kitty"
    >
        <iframe
            src="{{ route('terminal') }}"
            frameborder="0"
            loading="lazy"
            class="w-[90vw] h-[50vh] max-h-[500px] max-w-[600px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    
    <x-desktop-icon
        name="Community"
        extension="user"
        description="connect with others that loved this website"
        location="/usr/share"
        :open="true"
    >
        <iframe
            src="{{ route('community') }}"
            frameborder="0"
            loading="lazy"
            class="w-[90vw] h-[70vh] max-h-[650px] max-w-[650px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>
</main>
@endsection