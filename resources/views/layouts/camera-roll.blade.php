@extends('layouts.app')

@section('show-home-button')

@section('body')
    <main
        class="bg-background-primary flex min-h-svh w-full min-w-0 flex-col items-center justify-center p-4"
        x-data="{
            current: 0,
            count: {{ $photographyPost->photographies->count() }},
            photos: @js($photographyPost->photographies)
        }"
    >

        <div class="flex w-full max-w-2xl flex-col gap-4">

            <a
                class="hover:text-highlight-secondary cursor-pointer underline transition-colors"
                onclick="history.back()"
            >← Camera</a>

            <div class="bg-background-primary flex flex-col gap-4 p-1 lg:p-4">
                <div
                    class="border-background-tertiary relative flex flex-col overflow-hidden border-4 bg-black">
                    <template
                        x-for="(photo, index) in photos"
                        x-bind:key="photo.id"
                    >
                        <img
                            class="w-full h-auto"
                            x-show="current === index"
                            x-bind:src="photo.url"
                            x-bind:alt="photo.title"
                        >
                    </template>

                    <div class="border-16 pointer-events-none absolute inset-0 border-black/10"></div>

                    <div class="border-highlight absolute left-4 top-4 size-4 border-l-2 border-t-2"></div>
                    <div class="border-highlight absolute right-4 top-4 size-4 border-r-2 border-t-2"></div>
                    <div class="border-highlight absolute bottom-4 left-4 size-4 border-b-2 border-l-2"></div>
                    <div class="border-highlight absolute bottom-4 right-4 size-4 border-b-2 border-r-2"></div>
                </div>

                <div
                    class="bg-background-secondary border-background-tertiary flex items-center justify-between border-2 p-4">
                    <div class="flex flex-col gap-1">
                        <span class="text-highlight text-[10px] uppercase opacity-50">Photo Title</span>
                        <span
                            class="text-sm font-bold"
                            x-text="photos[current]?.title || 'Untitled'"
                        ></span>
                    </div>

                    <div class="flex items-center gap-4">
                        <div
                            class="border-background-tertiary text-highlight border-2 bg-black px-3 py-1 font-mono text-lg">
                            <span x-text="String(current + 1).padStart(2, '0')"></span>/<span
                                x-text="String(count).padStart(2, '0')"
                            ></span>
                        </div>

                        <div class="flex gap-2">
                            <x-button
                                class="flex size-10 items-center justify-center text-lg"
                                type="button"
                                x-on:click="current = (current - 1 + count) % count"
                            >
                                <span class="translate-y-px">←</span>
                            </x-button>
                            <x-button
                                class="flex size-10 items-center justify-center text-lg"
                                type="button"
                                x-on:click="current = (current + 1) % count"
                            >
                                <span class="translate-y-px">→</span>
                            </x-button>
                        </div>
                    </div>
                </div>

                <div class="text-highlight text-label-large w-full">
                    Roll: <br/>
                    <span class="text-foreground text-sm">{{ $photographyPost->title }}</span>
                </div>

                <div
                    class="w-full max-w-full prose prose-invert text-foreground border-foreground/10 mt-2 border-t-2 border-dashed p-2 text-xs italic leading-relaxed opacity-80">
                    @if($photographyPost->description)
                        @markdown($photographyPost->description)
                    @endif
                </div>
            </div>
        </div>

    </main>
@endsection
