@extends('layouts.desktop')

@section('title', 'this is home')

@section('content')
    <x-desktop-icon
        name="home/"
        extension="home"
        description="you've met a terrible fate, haven't you"
        location="/home/naviheylisten/vero/home"
        icon="{{ Vite::image('icons/computer.png') }}"
        :open="true"
    >
        <iframe
            src="{{ route('welcome') }}"
            frameborder="0"
            loading="lazy"
            class="w-[80svw] h-[80svh] max-h-[850px] max-w-[550px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="About Me"
        extension="psd"
        description="all the things you gotta now 'bout me"
        location="/home/naviheylisten/vero/"
        icon="{{ Vite::image('icons/notepad.png') }}"
    >
        <iframe
            src="{{ route('aboutme') }}"
            frameborder="0"
            loading="lazy"
            class="w-[80svw] h-[80svh] max-h-[850px] max-w-[650px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Thoughts"
        extension="pdf"
        description="estado: yap"
        location="/home/naviheylisten/vero/thoughts"
        icon="{{ Vite::image('icons/window-icons.png') }}"
    >
        <iframe
            src="{{ route('thoughts') }}"
            frameborder="0"
            loading="lazy"
            class="w-[80svw] h-[80svh] max-h-[650px] max-w-[450px] mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Deco Bar"
        extension="blink"
        description="just some decorations"
        location="/home/naviheylisten/vero/deco"
    >
        <iframe
            src="{{ route('decobar') }}"
            frameborder="0"
            loading="lazy"
            class="w-[80svw] h-[80svh] max-h-[650px] max-w-[250px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Side Dish"
        extension="side"
        description="just some warnings lol"
        location="/home/naviheylisten/vero/info"
    >
        <iframe
            src="{{ route('sidebar') }}"
            frameborder="0"
            loading="lazy"
            class="w-[80svw] h-[80svh] max-h-[600px] max-w-[350px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Journal"
        extension="md"
        description="bunch of rambles compressed into a list"
        location="/home/naviheylisten/vero/thoughts"
        icon="{{ Vite::image('icons/directory-file.png') }}"
    >
        <iframe
            src="{{ route('journal') }}"
            frameborder="0"
            loading="lazy"
            class="w-[80svw] h-[80svh] max-h-[850px] max-w-[650px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Camera Roll"
        extension="psd"
        description="all of veronicas camera roll"
        location="/home/naviheylisten/vero/camera"
        icon="{{ Vite::image('icons/camera.png') }}"
    >
        <iframe
            src="{{ route('camera') }}"
            frameborder="0"
            loading="lazy"
            class="w-[80svw] h-[80svh] max-h-[750px] max-w-[600px]"
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
        icon="{{ Vite::image('icons/directory-explorer.png') }}"
    >
        <iframe
            src="{{ route('comments') }}"
            frameborder="0"
            loading="lazy"
            class="w-[80svw] h-[80svh] max-h-[600px] max-w-[300px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Profile"
        extension="user"
        description="create your very own profile"
        location="/profiles"
        icon="{{ Vite::image('icons/floppy-drive.png') }}"
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
            class="w-[80svw] h-[80svh] max-h-[650px] max-w-[450px]"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Terminal"
        extension=""
        description="checkout all these crazy commands"
        location="/usr/bin/kitty"
        icon="{{ Vite::image('icons/terminal.png') }}"
    >
        <iframe
            src="{{ route('terminal') }}"
            frameborder="0"
            loading="lazy"
            class="w-[80svw] h-[80svh] max-h-[500px] max-w-[600px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>


    <x-desktop-icon
        name="Community"
        extension="user"
        description="connect with others that loved this website"
        location="/usr/share"
        icon="{{ Vite::image('icons/internet.png') }}"
    >
        <iframe
            src="{{ route('community') }}"
            frameborder="0"
            loading="lazy"
            class="w-[80svw] h-[80svh] max-h-[750px] max-w-[700px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Sketches"
        extension="js"
        description="a bunch of sketches and interactive stuff that i want to put somewhere online"
        location="/home/naviheylisten/projects"
        icon="{{ Vite::image('icons/monitor-application.png') }}"
    >
        <iframe
            src="{{ route('sketches') }}"
            frameborder="0"
            loading="lazy"
            class="w-[80svw] h-[80svh] max-h-[850px] max-w-[450px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>
@endsection
