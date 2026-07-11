<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>@yield('title', 'Story')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @font-face {
            font-family: "Pixeloid";
            src: url("{{ resource_path('fonts/PixeloidSans.woff') }}") format("woff");
            font-weight: normal;
        }

        @font-face {
            font-family: "Pixeloid";
            src: url("{{ resource_path('fonts/PixeloidSans-Bold.woff') }}") format("woff");
            font-weight: bold;
        }

        @font-face {
            font-family: "Pixeloid Mono";
            src: url("{{ resource_path('fonts/PixeloidMono.woff') }}") format("woff");
            font-weight: normal;
        }

        @font-face {
            font-family: "Vero's Emojis";
            src: url("{{ resource_path('fonts/IconFont.ttf') }}") format("OpenType");
        }

        .font-emoji {
            font-family: "Vero's Emojis", sans-serif !important;
        }

        .story-icon {
            image-rendering: pixelated;
        }
    </style>

    @stack('scripts')
</head>

<body class="text-foreground text-base font-sans">
    <x-desktop-icon
        name="home"
        icon="{{ Vite::image('icons/computer.png') }}"
    />

     <x-desktop-icon
        name="About Me"
        icon="{{ Vite::image('icons/internet-explorer.png') }}"
    />

    <x-desktop-icon
        name="I exist"
        icon="{{ Vite::image('icons/directory-file.png') }}"
    />

    
    <x-window
        class="absolute bottom-2 right-2 z-100"
        title="Milanesa"
    >
        <div
            x-data="dancingCat"
            class=" bg-background-primary text-foreground flex items-center justify-center my-auto min-w-[150px] min-h-[100px]"
        >
            <img src="{{ Vite::image('cat.png') }}" class="h-48"/>
        </div>
    </x-window>

    <x-window
        :buttons="['minimize', 'maximize', 'close']"
        class="absolute top-1/2 left-1/2 -translate-1/2 w-full h-full max-w-10/12 max-h-10/12"
        :title="$title ?? 'Story'"
    >
        @yield('content')
    </x-window>
</body>

</html>
