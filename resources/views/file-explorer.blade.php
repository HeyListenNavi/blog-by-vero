@extends('layouts.app')

@section('body')
    <div class="bg-background-primary flex min-h-screen w-screen flex-col gap-4">

        <div class="window-content grid flex-1 grid-rows-[auto_1fr]" x-data="fileExplorer">
            <div class="bg-background-tertiary flex w-screen items-center gap-2 p-2">
                <x-button type="button" x-on:click="goUp()" x-bind:disabled="currentPath.length <= 0">
                    back
                </x-button>
                <div
                    class="border-foreground/10 flex w-full gap-3 overflow-x-auto border-2 px-2 py-1 pb-1.5 [border-style:inset]">
                    <span>/</span>
                    <template x-for="(path, index) in currentPath">
                        <span class="flex gap-3">
                            <span x-text="path" class="cursor-pointer hover:underline" x-on:click="jumpTo(index)"> </span>
                            <span x-show="index < currentPath.length - 1">></span>
                        </span>
                    </template>
                </div>
            </div>

            <div class="flex">
                <div class="bg-background-secondary wrap-anywhere flex h-full text-[10px] lg:text-base min-w-20 w-1/4 max-w-48 flex-col gap-2 p-2">
                    <p class="flex items-center gap-0.5 px-2 font-bold">
                        <span class="hidden lg:block font-emoji text-xl">C</span>
                        <span>Pinned</span>
                    </p>
                    <div class="flex flex-col gap-1">
                        <template x-for="pin in pinned">
                            <span class="cursor-pointer px-2 py-1 hover:bg-white/20 hover:underline"
                                x-on:click="open(pin.path)" x-text="pin.name"></span>
                        </template>
                    </div>
                </div>

                <div class="flex flex-wrap content-start gap-2 overflow-y-auto p-4">
                    <template x-for="item in items">
                        <article class="w-18 flex h-fit cursor-pointer flex-col items-center gap-1 p-1 lg:w-24 lg:p-2"
                            x-on:click.stop="select(item.name)" x-on:dblclick="open(item.name)"
                            x-on:click.outside="deselect()"
                            x-bind:class="{
                                'bg-highlight-secondary/20': selectedItem === item.name,
                                'hover:bg-highlight-secondary/10': selectedItem !== item.name
                            }">
                            <img class="size-10 select-none"
                                x-bind:src="{
                                    'file': '{{ Vite::image('icons/file.png') }}',
                                    'folder': '{{ Vite::image('icons/directory.png') }}',
                                } [item.type]" />
                            <span x-text="item.name" class="wrap-anywhere select-none text-center text-xs"></span>
                        </article>
                    </template>

                    <div x-show="items.length === 0" class="text-center">
                        This folder is empty
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
