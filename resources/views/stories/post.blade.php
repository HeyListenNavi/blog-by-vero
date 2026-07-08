@extends('layouts.story', ['title' => 'new post !!!'])

@section('content')
    <div class="flex size-full flex-col gap-3 p-4">
        <div class="mt-12 flex flex-col gap-4">
            <img
                class="mx-auto size-16 shrink-0"
                src="{{ Vite::image('icons/file.png') }}"
            />
            <div class="flex flex-col gap-1 text-center">
                <p class="text-body-medium text-foreground font-bold">{{ $post->title }}</p>
                <p class="text-label-small text-foreground/50">{{ $post->date->format('d M Y') }}</p>
            </div>
        </div>

        <div class="text-label-small text-foreground/40 mt-auto flex items-center gap-2">
            <span>user@blog:~$</span>
            <span class="text-highlight-secondary/50">_</span>
        </div>
    </div>
@endsection
