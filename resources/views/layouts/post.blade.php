@extends('layouts.app')

@section('body')
<div class="w-screen bg-background-primary min-h-svh p-8 flex flex-col gap-4">
    <a class="underline cursor-pointer hover:text-highlight-secondary transition-colors" href="{{ route('home') }}">← {{ $post->date }}</a>
    <div class="max-w-4xl self-center flex flex-col gap-2">
        <h1 class="text-display-medium text-4xl">{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <div class="grid grid-cols-2 gap-2">
            @foreach ($post->postImages as $image)
                <x-window title="{{ $image->title }}">
                    <img class="mx-auto" src="{{ $image->path }}">
                </x-window>
            @endforeach
        </div>
    </div>
</div>
@endsection