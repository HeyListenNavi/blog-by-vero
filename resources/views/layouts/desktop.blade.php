@extends('layouts.app')

@section('body')
<div id="screen" class="overflow-hidden w-screen h-dvh grid grid-rows-[1fr_auto] grid-cols-1 bg-background">
    <div id="desktop" class="p-4 z-0">
        @yield('content')
    </div>
    @include('layouts.navbar')
</div>
@endsection