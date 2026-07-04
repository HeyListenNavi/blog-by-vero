@extends('layouts.story', ['title' => $photographyPost->title])

@section('content')
    <div class="text-shadow-terminal-glow text-shadow-highlight/60 flex size-full flex-col gap-3 p-4 text-left font-mono">
        <div
            class="border-foreground/20 bg-background-secondary text-label-small text-highlight flex items-center justify-between border-2 p-2 font-bold">
            <span>camera roll</span>
            <span class="font-emoji text-xs">x</span>
        </div>

        <div class="border-foreground/10 bg-background-tertiary flex items-center gap-3 border p-2">
            <img
                class="size-10 shrink-0"
                src="{{ Vite::image('icons/cassette.png') }}"
            />
            <div class="min-w-0">
                <p class="text-body-medium text-foreground truncate font-bold">{{ $photographyPost->title }}</p>
                <p class="text-label-small text-foreground/50">{{ $photographyPost->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <div class="border-foreground/10 bg-background-secondary flex-1 overflow-hidden border p-4">
            @if ($photographyPost->description)
                <div class="text-label-small text-highlight-secondary flex items-center gap-1">
                    <span>$</span>
                    <span class="text-foreground/50">cat description.txt</span>
                </div>
                <p class="text-label-medium text-foreground/80 mt-1 leading-relaxed">
                    {{ str($photographyPost->description)->limit(200) }}
                </p>
            @else
                <div class="text-label-small text-foreground/50 flex items-center gap-1">
                    <span>$</span>
                    <span>ls photos/</span>
                </div>
                <p class="text-label-medium text-foreground/50 mt-1 italic">
                    no description
                </p>
            @endif
        </div>

        <div class="text-label-small text-highlight-secondary/70 flex items-center gap-1">
            <span>$</span>
            <span>photos/ --count</span>
            <span class="text-foreground/60">&rarr;
                {{ $photographyPost->relationLoaded('photographies') ? $photographyPost->photographies->count() : '—' }}</span>
        </div>

        <div class="text-label-small text-foreground/40 flex items-center gap-2">
            <span>user@blog:~$</span>
            <span class="text-highlight-secondary/50">_</span>
        </div>
    </div>
@endsection
