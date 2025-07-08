@extends('layouts.app')

@section('body')
<navbar id="screen" class="overflow-hidden w-screen h-dvh grid grid-rows-[1fr_auto] grid-cols-1 bg-background">
    <section id="desktop" class="p-4 z-0">
        @yield('content')
    </section>
    @include('layouts.navbar')
</navbar>
@endsection