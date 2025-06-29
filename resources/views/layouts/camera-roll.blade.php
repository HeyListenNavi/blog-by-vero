@extends('layouts.app')

@section('body')
<div class="min-w-lg bg-background-primary min-h-svh p-8 flex flex-col gap-4">
    <button class="underline self-start cursor-pointer" onclick="history.back()">← go back to the camera</button>
    <div class="max-w-4xl self-center flex flex-col gap-2">
        <h1 class="text-display-medium text-4xl">{{ $post->title }}</h1>
        <p>{{ $post->description }}</p>
        <div class="grid grid-cols-2 gap-4">
            @foreach ($post->photographies as $photography)
                <div class="flex flex-col gap-2 items-center">
                    <p>{{ $photography->title }}</p>
                    <img src="{{ $photography->path }}">
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection