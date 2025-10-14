@extends('layouts.app')

@section('body')
<main id="screen" class="overflow-hidden w-screen h-svh grid grid-rows-[1fr_auto] grid-cols-1 bg-background">
    <section id="desktop" class="z-0 min-h-0 h-full flex flex-col content-start flex-wrap">
        @yield('content')
    </section>
    @include('layouts.navbar')
</main>
@endsection
