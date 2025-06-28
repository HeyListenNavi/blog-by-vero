@extends('layouts.app')

@section('body')
<div id="screen" class="overflow-hidden w-screen h-dvh grid grid-rows-[1fr_auto] grid-cols-1 bg-background">
    <div id="desktop" class="p-4 z-0">
        @yield('content')
    </div>
    <div class="bg-background-primary p-2 flex gap-4 items-center">
        <button class="font-emoji size-8 text-2xl border-2 border-foreground/30 [border-style:inset]">
            v
        </button>
        <div x-data class="flex gap-2 overflow-x-auto max-w-full">
            <template x-for="window in $store.windowManager.windows">
                <button
                    x-on:click="$store.windowManager.minimize(window.id);"
                    x-bind:class="{
                        'bg-foreground/10': window.minimized
                    }"
                    class="p-1 border-2 shrink-0 border-foreground/30 cursor-pointer [border-style:inset]"
                >
                    <span x-text="window.minimized ? '^' : ''"></span>
                    <span x-text="window.title"></span>
                </button>
            </template>
        </div>
    </div>
</div>
@endsection