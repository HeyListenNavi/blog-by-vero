@extends('layouts.app')

@section('body')
<main class="w-screen bg-background-primary min-h-svh p-8 flex flex-col gap-4">
    <a class="underline cursor-pointer hover:text-highlight-secondary transition-colors" href="{{ route('home') }}">← {{ $post->date }}</a>
    
    <section class="max-w-2xl self-center flex flex-col gap-2">
        <h1 class="text-display-medium text-4xl">{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
    </section>

    <section class="max-w-2xl w-full self-center grid grid-cols-2 gap-2">
        @foreach ($post->postImages as $image)
            <x-window title="{{ $image->title }}">
                <img class="mx-auto" src="{{ $image->path }}">
            </x-window>
        @endforeach
    </section>
</main>
@endsection