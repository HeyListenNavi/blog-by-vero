@extends('layouts.app')

@section('body')
<main class="min-h-screen w-screen p-2 grid grid-rows-[auto_1fr_auto] gap-4 bg-background-primary">
    <header class="p-4 flex flex-col gap-1">
        <h1 class="text-body-large">Vero's camera roll</h1>
        <h2>veronica has a bunch of cameras, here, all of the photographies she has ever taken have been listed into different camera rolls</h2>
    </header>
    <section class="px-2 flex flex-wrap content-start gap-2">
        @forelse ($photographyPosts as $post)
	<article class="h-fit w-18 lg:w-24 p-1 lg:p-2 hover:outline-2 hover:outline-dashed hover:outline-foreground/10 cursor-pointer">
    	<a class="flex flex-col items-center gap-1" href="{{ route('camera.roll', $post) }}">
        	<img class="size-10" src="{{ asset('storage/' . $post->icon->path) }}" />
        	<div class="wrap-break-word text-center text-xs lg:text-sm">
            		<span>{{ $post->title }}</span>
            		<span>{{ $post->date }}</span>
        	</div>
    	</a>
</article>
        @empty
        <p>No camera rolls yet, check back later!</p>
        @endforelse
    </section>
    <section class="p-4">
        {{ $photographyPosts->links('components.pagination') }}
    </section>
</main>
@endsection
