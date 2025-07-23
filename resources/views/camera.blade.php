@extends('layouts.app')

@section('body')
<main class="p-2 h-screen grid grid-rows-[auto_1fr_auto] items-center gap-4">
    <header class="px-4 flex flex-col gap-1">
        <h1 class="text-body-large">Vero's camera roll</h1>
        <h2>veronica has a bunch of cameras, here, all of the photographies she has ever taken have been listed into different camera rolls</h2>
    </header>

    <section class="mx-auto max-w-md">
        @forelse ($photographyPosts as $post)
        <article class="flex flex-col gap-8 items-center justify-center">
            <div class="flex flex-col gap-4 items-center">
                <h1 class="text-center text-body-medium leading-tight">{{ $post->title }}</h1>
                <img class="size-48" src="{{ $post->icon->path }}">
                <p class="text-center">{{ $post->description }}</p>
            </div>
            <x-button href="{{ route('camera.roll', $post) }}">Open this Camera Roll</x-button>
        </article>
        @empty
        <p>No camera rolls yet, check back later!</p> 
        @endforelse
    </section>

    <section>
        {{ $photographyPosts->links('components.pagination', ['direction' => 'vertical']) }}
    </section>
</main>
@endsection