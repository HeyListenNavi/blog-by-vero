@extends('layouts.app')

@section('body')
<div class="h-dvh grid grid-rows-[1fr_auto] bg-background">
    <div class="p-4">
        @yield('content')
    </div>
    <div class="w-full bg-background-primary p-2">
        <button class="font-emoji size-8 text-2xl border-2 border-foreground/30 [border-style:inset]">
            v
        </button>
    </div>
</div>
@endsection