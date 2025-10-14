<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Blog by Vero')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}",
            banUrl: "{{ route('ban.self') }}"
        };
    </script>
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</head>

<body class="text-foreground relative flex min-h-dvh flex-col items-center justify-center text-base">
    @yield('body')
</body>

</html>
