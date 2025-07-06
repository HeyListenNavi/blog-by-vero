@extends('layouts.desktop')

@section('title', 'this is home')

@section('content')
<div class="flex flex-col flex-wrap h-full content-start">
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
            class="min-h-[750px] min-w-[600px] w-full h-full"
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
            class="min-w-[700px] min-h-[800px] w-full h-full"
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
            class="w-56 h-96 space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Profile"
        extension="user"
        description="create your very own profile"
        location="/profiles"
        :open="true"
    >
        <iframe
            @guest
            src="{{ route('auth') }}"
            @endguest

            @auth
            src="{{ route('profile', Auth::user()->id) }}"
            @endauth
            
            frameborder="0"
            loading="lazy"
            class="min-w-[450px] min-h-[650px] w-full h-full"
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
            class="min-h-[350px] min-w-[450px] w-full h-full"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>
</div>
@endsection