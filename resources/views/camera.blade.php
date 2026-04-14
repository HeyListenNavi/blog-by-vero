@extends('layouts.app')

@section('body')
<main class="min-h-screen w-screen p-4 flex flex-col gap-6 bg-background-primary">
    <header class="p-4 border-b-2 border-dashed border-highlight/30">
        <h1 class="text-body-large text-highlight">Vero's camera roll</h1>
        <p class="text-label-small opacity-70">veronica has a bunch of cameras, here, all of the photographies she has ever taken have been listed into different camera rolls</p>
    </header>

    <section class="flex flex-col gap-10">
        @forelse ($photographyPosts as $post)
        <a href="{{ route('camera.roll', $post) }}" class="block w-full h-full">
            <article class="bg-background-primary shadow-window-outline p-2 flex flex-col">
                <div class="bg-background-secondary p-2 flex items-center gap-3 border-b-2 border-background-tertiary">
                    <img class="size-10" src="{{ $post->icon->url }}" alt="" />
                    <span class="font-bold text-highlight text-xs">{{ $post->title }}</span>
                </div>

                <div class="relative bg-black aspect-square overflow-hidden group">
                        @if($post->photographies->isNotEmpty())
                            <img class="w-full h-full object-cover"
                                 src="{{ $post->photographies->first()->url }}"
                                 alt="{{ $post->photographies->first()->title }}">
                            @if($post->photographies->count() > 1)
                                <div class="absolute bottom-2 right-2 bg-background-tertiary border-2 border-highlight/30 px-2 py-0.5 text-[10px] text-highlight uppercase">
                                    +{{ $post->photographies->count() - 1 }} photos
                                </div>
                            @endif
                        @else
                            <div class="flex items-center justify-center h-full italic text-[10px] opacity-30">no photos</div>
                        @endif
                </div>

                <div class="p-2 flex flex-col gap-1">
                    <p class="text-label-medium">
                        <span class="text-highlight-secondary">{{ $post->title }}</span>: {{ $post->description }}
                    </p>
                    <div class="flex items-center justify-between mt-2 opacity-50 text-[12px] uppercase tracking-tighter">
                        <span>{{ $post->created_at->format('Y-m-d') }}</span>
                        <span>View Roll →</span>
                    </div>
                </div>
            </article>
        </a>
        @empty
        <div class="text-center py-20 border-2 border-dashed border-highlight/10">
            <p class="opacity-30 italic">the camera is empty...</p>
        </div>
        @endforelse
    </section>

    <section class="p-8">
        {{ $photographyPosts->links('components.pagination') }}
    </section>
</main>
@endsection
