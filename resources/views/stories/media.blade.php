@extends('layouts.story', ['title' => $media->title])

@section('content')
    <div class="text-shadow-terminal-glow text-shadow-highlight/60 flex size-full flex-col gap-3 p-4 text-left font-mono">
        <div
            class="border-foreground/20 bg-background-secondary text-label-small text-highlight flex items-center justify-between border-2 p-2 font-bold">
            <span>{{ $media->type }} review</span>
            <span class="font-emoji text-xs">x</span>
        </div>

        <div class="border-foreground/10 bg-background-tertiary flex items-center gap-3 border p-2">
            <img
                class="size-10 shrink-0"
                src="{{ Vite::image('icons/cd-audio.png') }}"
            />
            <div class="min-w-0">
                <p class="text-body-medium text-foreground truncate font-bold">{{ $media->title }}</p>
                @if ($media->review_date)
                    <p class="text-label-small text-foreground/50">{{ $media->review_date->format('d M Y') }}</p>
                @endif
            </div>
        </div>

        <div class="border-foreground/10 bg-background-secondary flex flex-1 flex-col gap-1 border p-4">
            <div class="text-label-small text-highlight-secondary flex items-center gap-1">
                <span>$</span>
                <span class="text-foreground/50">cat rating.log</span>
            </div>
            <div class="font-emoji mt-1 flex gap-1 text-2xl leading-none">
                @for ($i = 0; $i < $media->stars; $i++)
                    <span style="color: #eabbb9;">G</span>
                @endfor
                @for ($i = $media->stars; $i < 5; $i++)
                    <span style="color: #444;">F</span>
                @endfor
            </div>
        </div>

        <div class="text-label-small text-foreground/40 flex items-center gap-2">
            <span>user@blog:~$</span>
            <span class="text-highlight-secondary/50">_</span>
        </div>
    </div>
@endsection
