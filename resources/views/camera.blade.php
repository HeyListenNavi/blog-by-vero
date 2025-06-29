@extends('layouts.app')

@section('body')
<div class="h-screen grid grid-rows-[auto_1fr_auto] gap-4">
    <div class="px-4 flex flex-col gap-1">
        <h1 class="text-body-large">Vero's camera roll</h1>
        <h2>veronica has a bunch of cameras, here, all of the photographies she has ever taken have been listed into different camera rolls</h2>
    </div>
    <div class="flex flex-col gap-8 items-center justify-center mx-auto max-w-md">
        @foreach ($posts as $post)
            <div class="flex flex-col gap-4 items-center">
                <h1 class="text-center text-body-medium leading-tight">{{ $post->title }}</h1>
                <img class="size-48" src="{{ $post->icon->path }}">
                <p class="text-center">{{ $post->description }}</p>
            </div>
            <x-button href="{{ route('camera.roll', ['post' => $post->id]) }}">Open this Camera Roll</x-button>
        @endforeach
    </div>
    <div>
        {{ $posts->links('components.pagination', ['direction' => 'vertical']) }}
    </div>
</div>
@endsection