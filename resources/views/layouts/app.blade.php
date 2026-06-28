<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Blog by Vero')</title>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <script>
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}",
            banUrl: "{{ route('ban.self') }}"
        };
    </script>
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script
        type="module"
        src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.5.0/model-viewer.min.js"
    ></script>
    @stack('scripts')
</head>

<body
    class="text-foreground bg-background-primary @hasSection('show-home-button') @endif relative flex min-h-dvh flex-col items-center justify-center pb-12 text-base"
>
    @yield('body')

    @hasSection('show-home-button')
        <x-button
            x-data="{ inIframe: window.self !== window.top }"
            x-show="!inIframe"
            x-cloak
            class="z-100 font-emoji fixed bottom-4 left-4 text-2xl px-3"
            href="{{ url('/') }}"
        >
            1
        </x-button>
    @endif
</body>

</html>
