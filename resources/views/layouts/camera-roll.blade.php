@extends('layouts.app')

@section('body')
<main class="min-w-lg bg-background-primary min-h-svh p-8 flex flex-col gap-4">
    <a class="self-start underline cursor-pointer hover:text-highlight-secondary transition-colors" onclick="history.back()">← go back to the camera</a>
    
    <section class="max-w-4xl self-center flex flex-col gap-2">
        <h1 class="text-display-medium text-4xl">{{ $post->title }}</h1>
        <p>{{ $post->description }}</p>
    </section>

    <section class="max-w-4xl w-full self-center grid grid-cols-2 gap-4">
        @foreach ($post->photographies as $photography)
            <div class="flex flex-col gap-2 items-center">
                <p>{{ $photography->title }}</p>
                <img src="{{ $photography->path }}">
            </div>
        @endforeach
    </section>
</main>
@endsection