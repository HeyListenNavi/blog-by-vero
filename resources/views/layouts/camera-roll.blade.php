@extends('layouts.app')

@section('body')
<main class="min-w-0 w-full min-h-svh p-4 flex flex-col items-center justify-center bg-background-primary"
      x-data="{
          current: 0,
          count: {{ $photographyPost->photographies->count() }},
          photos: @js($photographyPost->photographies)
      }">

    <div class="w-full max-w-2xl flex flex-col gap-4">
        <div class="flex items-center justify-between px-2">
            <a class="underline cursor-pointer hover:text-highlight-secondary transition-colors" onclick="history.back()">← Camera</a>
            <div class="text-[10px] uppercase text-highlight">
                Roll: {{ $photographyPost->title }}
            </div>
        </div>

        <div class="bg-background-primary shadow-window-outline p-4 flex flex-col gap-4">
            <div class="relative aspect-square sm:aspect-video bg-black border-4 border-background-tertiary flex items-center justify-center overflow-hidden">
                <template x-for="(photo, index) in photos" x-bind:key="photo.id">
                    <div x-show="current === index" class="absolute inset-0 w-full h-full flex items-center justify-center">
                        <img x-bind:src="'{{ asset('storage') }}/' + photo.path"
                             x-bind:alt="photo.title"
                             class="max-w-full max-h-full object-contain">
                    </div>
                </template>

                <div class="absolute inset-0 pointer-events-none border-16 border-black/10"></div>

                <div class="absolute top-4 left-4 size-4 border-t-2 border-l-2 border-highlight"></div>
                <div class="absolute top-4 right-4 size-4 border-t-2 border-r-2 border-highlight"></div>
                <div class="absolute bottom-4 left-4 size-4 border-b-2 border-l-2 border-highlight"></div>
                <div class="absolute bottom-4 right-4 size-4 border-b-2 border-r-2 border-highlight"></div>
            </div>

            <div class="flex items-center justify-between bg-background-secondary p-4 border-2 border-background-tertiary">
                <div class="flex flex-col gap-1">
                    <span class="text-[10px] uppercase text-highlight opacity-50">Photo Title</span>
                    <span class="text-sm font-bold" x-text="photos[current]?.title || 'Untitled'"></span>
                </div>

                <div class="flex items-center gap-4">
                    <div class="px-3 py-1 bg-black border-2 border-background-tertiary font-mono text-highlight text-lg">
                        <span x-text="String(current + 1).padStart(2, '0')"></span>/<span x-text="String(count).padStart(2, '0')"></span>
                    </div>

                    <div class="flex gap-2">
                        <x-button type="button" x-on:click="current = (current - 1 + count) % count" class="size-10 text-lg flex items-center justify-center">
                            <span class="translate-y-px">←</span>
                        </x-button>
                        <x-button type="button" x-on:click="current = (current + 1) % count" class="size-10 text-lg flex items-center justify-center">
                            <span class="translate-y-px">→</span>
                        </x-button>
                    </div>
                </div>
            </div>

            <div class="p-2 border-t-2 border-dashed border-foreground/10 mt-2">
                <p class="text-xs leading-relaxed opacity-80 italic">
                    {{ $photographyPost->description }}
                </p>
            </div>
        </div>
    </div>

</main>
@endsection
