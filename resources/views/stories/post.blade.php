@extends('layouts.story', ['title' => $post->title])

@section('content')
    <div class="text-shadow-terminal-glow text-shadow-highlight/60 flex size-full flex-col gap-3 p-4 text-left font-mono">
        <div
            class="border-foreground/20 bg-background-secondary text-label-small text-highlight flex items-center justify-between border-2 p-2 font-bold">
            <span>new post</span>
            <span class="font-emoji text-xs">x</span>
        </div>

        <div class="border-foreground/10 bg-background-tertiary flex items-center gap-3 border p-2">
            <img
                class="size-10 shrink-0"
                src="{{ Vite::image('icons/directory-file.png') }}"
            />
            <div class="min-w-0">
                <p class="text-body-medium text-foreground truncate font-bold">{{ $post->title }}</p>
                <p class="text-label-small text-foreground/50">{{ $post->date->format('d M Y') }}</p>
            </div>
        </div>

        <div class="border-foreground/10 bg-background-secondary flex-1 overflow-hidden border p-4">
            <div class="text-label-small text-highlight-secondary flex items-center gap-1">
                <span>$</span>
                <span class="text-foreground/50">cat post.txt</span>
            </div>
            <p class="text-label-medium text-foreground/80 mt-1 leading-relaxed">
                {{ str($post->content)->stripTags()->limit(200) }}
            </p>
        </div>

        <div class="text-label-small text-foreground/40 flex items-center gap-2">
            <span>user@blog:~$</span>
            <span class="text-highlight-secondary/50">_</span>
        </div>
    </div>
@endsection
