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
        name="Internet"
        description="welcome to da internet™"
        location="/dev/tcp"
        icon="{{ Vite::image('icons/internet-explorer.png') }}"
        link="https://google.com"
    />

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

    <x-desktop-icon
        name="Files"
        extension="directory"
        description="search up for files on my vault"
        location="/home/naviheylisten/"
        icon="{{ Vite::image('icons/directory.png') }}"
    >
        <iframe
            src="{{ route('file-explorer') }}"
            frameborder="0"
            loading="lazy"
            class="w-[80svw] h-[80svh] max-h-[850px] max-w-[750px] space-y-4 mx-auto"
        >
            <p>Your browser does not support iframes</p>
        </iframe>
    </x-desktop-icon>

     <x-desktop-icon
        name="Text Editor"
        extension="txt"
        description="edit any text you want"
        location="/home/naviheylisten/vim"
        icon="{{ Vite::image('icons/notepad.png') }}"
    >
        <div
            class="w-[80svw] h-[80svh] max-h-[350px] max-w-[450px] grid grid-rows-[auto_1fr_auto]"
            x-data="{ content: '' }"
            x-effect="content = appdataEvent?.detail ?? ''"
        >
            <div class="flex gap-2 px-2 py-1 select-none">
                <button class="hover:bg-background-tertiary cursor-pointer py-1 px-2">File</button>
                <button class="hover:bg-background-tertiary cursor-pointer py-1 px-2">Edit</button>
                <button class="hover:bg-background-tertiary cursor-pointer py-1 px-2">Format</button>
            </div>

            <textarea
                class="flex-1 w-full p-2 font-mono text-sm resize-none border-none outline-none focus:ring-0"
                x-text="content"
                placeholder="Type something..."
                spellcheck="false"
            ></textarea>

            <div class="px-2 py-0.5 text-[10px] flex justify-end">
                <span x-text="content.length + ' chars'"></span>
            </div>
        </div>
    </x-desktop-icon>

    @auth
    @if(Auth::user()->role === 'Admin')
        <x-desktop-icon
            name="Admin"
            extension="php"
            description="go to the admin panel"
            location="/root"
            icon="{{ Vite::image('icons/admin-keys.png') }}"
            link="{{ route('filament.admin.pages.dashboard') }}"
        />

        <x-desktop-icon
            name="EasyPanel"
            extension="sys"
            description="wanna see more projects? checkout my easypanel"
            location="/docker"
            icon="{{ Vite::image('icons/file-code.png') }}"
            link="https://panel.naviheylisten.is-a.dev"
        />
    @endif
    @endauth
@endsection
