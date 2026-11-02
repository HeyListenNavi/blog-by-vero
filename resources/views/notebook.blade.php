@extends('layouts.app')

@section('title', 'Notebook')

@section('show-home-button', true)

@section('body')
    <main
        class="relative flex overflow-clip min-h-svh w-full flex-col items-center justify-center p-2"
        x-data="notebook(@js($pages))"
    >
        <div class="flex w-full flex-col items-center gap-6">
            <div class="flex w-full items-center justify-center">
                <div
                    id="notebook-flipbook"
                    x-cloak
                    x-ref="book"
                >
                    <div
                        class="page bg-background-primary text-background-primary"
                    >
                        Page Cover
                    </div>
                    @foreach ($pages as $page)
                        <div class="page"> 
                            <img src="{{ $page }}" class="w-full h-full object-fit" alt="Notebook page {{ $loop->iteration }}" loading="lazy">
                        </div>
                    @endforeach
                    <div
                        class="page bg-background-primary text-background-primary"
                    >
                        Page Cover
                    </div>
                </div>
            </div>

            <x-button
                type="button"
                x-on:click="show = true"
            >
                Pantalla Completa
            </x-button>

            <x-window
                title="Notebook"
                class="absolute w-[95%] h-[95%] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"
                x-show="show == true"
                x-cloak
                x-on:close-window="show = false"
            >
                <div class="overflow-auto 2xl:flex p-2 items-center my-auto">
                    <img x-bind:src="pages[currentPage-1]" class="w-full">
                    <img x-bind:src="pages[currentPage]" class="w-full">
                </div>
            </x-window>

            <p class="text-foreground/50 text-center text-xs">
                Arrastra las páginas del cuaderno :3
            </p>
        </div>
    </main>
@endsection
