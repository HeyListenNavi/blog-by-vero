@extends('layouts.app')

@section('body')
<main class="min-w-lg w-full bg-background-primary min-h-svh p-8 flex flex-col gap-4">
    <a class="self-start underline cursor-pointer hover:text-highlight-secondary transition-colors" onclick="history.back()">← go back to the camera</a>

    <section class="max-w-4xl self-center flex flex-col gap-2">
        <h1 class="text-display-medium text-4xl">{{ $photographyPost->title }}</h1>
        <p>{{ $photographyPost->description }}</p>
    </section>

    <section class="max-w-4xl w-full self-center grid grid-cols-2 gap-4">
        @foreach ($photographyPost->photographies as $photography)
            <figure class="flex flex-col gap-2 items-center">
                <img src="{{ asset('storage/' . $photography->path) }}">
                <figcaption>{{ $photography->title }}</figcaption>
            </figure>
        @endforeach
    </section>
</main>
@endsection
