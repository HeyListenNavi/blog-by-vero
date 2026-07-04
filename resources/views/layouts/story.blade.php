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
            src: url("{{ base_path('public/fonts/PixeloidSans.woff') }}") format("woff");
            font-weight: normal;
        }

        @font-face {
            font-family: "Pixeloid";
            src: url("{{ base_path('public/fonts/PixeloidSans-Bold.woff') }}") format("woff");
            font-weight: bold;
        }

        @font-face {
            font-family: "Pixeloid Mono";
            src: url("{{ base_path('public/fonts/PixeloidMono.woff') }}") format("woff");
            font-weight: normal;
        }

        @font-face {
            font-family: "Vero's Emojis";
            src: url("{{ base_path('public/fonts/IconFont.ttf') }}") format("OpenType");
        }

        .font-emoji {
            font-family: "Vero's Emojis", sans-serif !important;
        }
    </style>
    @stack('scripts')
</head>

<body class="text-foreground text-base">
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
        :buttons="['minimize', 'maximize', 'close']"
        class="absolute top-1/2 left-1/2 -translate-1/2 w-full h-full max-w-10/12 max-h-10/12"
        :title="$title ?? 'Story'"
    >
        @yield('content')
    </x-window>
</body>

</html>
