<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Blog by Vero')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles / Scripts -->
    @vite(['resources/sass/main.sass', 'resources/js/app.js'])
</head>

<body>
    @yield('body')
</body>

</html>
