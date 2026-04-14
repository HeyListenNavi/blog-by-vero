@extends('layouts.app')

@section('body')
<main class="min-h-screen w-full p-6 md:p-12 flex flex-col items-center justify-center bg-background-primary overflow-x-hidden">
    <div class="w-full max-w-5xl mb-6">
        <a class="underline cursor-pointer hover:text-highlight-secondary transition-colors" onclick="history.back()">← Return</a>
    </div>

    <div class="w-full max-w-5xl mb-8 relative">
        <div class="bg-background-tertiary">
            <div class="flex justify-between px-4 py-3">
                @for($i=0; $i<20; $i++)
                    <div class="size-1 rounded-full shadow-[0_0_5px_rgb(234,187,185)]">
                        <div class="size-1 rounded-full bg-highlight shadow-[0_0_10px_rgb(234,187,185)]"></div>
                    </div>
                @endfor
            </div>

            <div class="p-6 flex flex-col items-center text-center gap-4">
                <div class="text-xs uppercase text-highlight-secondary/70 font-bold">NOW SHOWING</div>

                <h1 class="pb-4 text-headline-medium lg:text-display-medium text-highlight uppercase tracking-tight leading-none italic font-bold" style="text-shadow: var(--text-shadow-terminal-glow)">
                    {{ $media->title }}
                </h1>

                <div class="flex flex-wrap justify-center items-center gap-4 text-xs uppercase text-highlight/50 font-mono">
                    <span class="bg-highlight/10 px-2 py-0.5">{{ $media->type }}</span>

                    <span class="w-1 h-1 bg-highlight/30"></span>

                    <span>YEAR: {{ $media->review_date ? $media->review_date->format('Y') : 'UNKNOWN' }}</span>
                </div>
            </div>

            <div class="flex justify-between px-4 py-3">
                @for($i=0; $i<20; $i++)
                    <div class="size-1 rounded-full shadow-[0_0_5px_rgb(234,187,185)]">
                        <div class="size-1 rounded-full bg-highlight shadow-[0_0_10px_rgb(234,187,185)]"></div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="w-full max-w-5xl flex flex-col 2xl:grid 2xl:grid-cols-[340px_1fr] gap-0 p-2 bg-background-secondary shadow-window-outline overflow-hidden">
        <div class="p-8 flex flex-col gap-4 bg-background-tertiary">
            <div class="relative group mx-auto w-full">
                <div class="absolute inset-0 bg-linear-to-tr from-transparent via-white/5 to-white/10 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none z-20"></div>
                <div class="aspect-3/4 w-full bg-black border-4 border-background-tertiary overflow-hidden flex items-center justify-center">
                    @if($media->poster)
                        <img class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-all duration-700" src="{{ $media->url }}" alt="{{ $media->title }}">
                    @else
                        <div class="text-[10px] opacity-20 italic uppercase tracking-widest text-center px-4 font-mono">Missing Strip</div>
                    @endif
                </div>
            </div>

            <div class="flex flex-col items-center gap-2 py-6 border-y-2 border-highlight/5 border-dashed">
                <span class="text-highlight-secondary uppercase font-bold text-xs">score:</span>
                <div class="flex text-4xl font-emoji text-highlight gap-2 leading-none h-8">
                    @for($i = 0; $i < 5; $i++)
                        <span>{{ $i < $media->stars ? 'G' : 'F' }}</span>
                    @endfor
                    @if($media->is_favorite)
                        <span class="ml-2 text-red-500">C</span>
                    @endif
                </div>
            </div>

            <div class="py-2 flex flex-col gap-3 opacity-20">
                <div class="flex gap-2 justify-center items-center">
                    <div class="w-0.5 h-3 bg-highlight"></div>
                    <div class="w-0.5 h-3 bg-highlight"></div>
                    <div class="w-0.5 h-3 bg-highlight"></div>

                    <div class="w-1 h-3 bg-highlight"></div>
                    <div class="w-1 h-3 bg-highlight"></div>

                    <div class="w-1.5 h-3 bg-highlight"></div>

                    <div class="w-2 h-3.5 bg-highlight"></div>

                    <div class="w-2.5 h-4 bg-highlight"></div>

                    <div class="w-2.5 h-5 bg-highlight"></div>

                    <div class="w-2.5 h-4 bg-highlight"></div>

                    <div class="w-2 h-3.5 bg-highlight"></div>

                    <div class="w-1.5 h-3 bg-highlight"></div>

                    <div class="w-1 h-3 bg-highlight"></div>
                    <div class="w-1 h-3 bg-highlight"></div>

                    <div class="w-0.5 h-3 bg-highlight"></div>
                    <div class="w-0.5 h-3 bg-highlight"></div>
                    <div class="w-0.5 h-3 bg-highlight"></div>
                </div>
                <div class="text-[8px] text-center tracking-[1em] uppercase">LOG-{{ str_pad($media->id, 6, '0', STR_PAD_LEFT) }}</div>
            </div>
        </div>

        <div class="p-8 flex flex-col gap-4">
            <span class="text-lg uppercase text-highlight font-bold italic">NOTES</span>

            @if($media->content)
                <div class="prose dark:prose-invert text-xs text-foreground/80 leading-6">
                    @markdown($media->content)
                </div>
            @endif
        </div>
    </div>
</main>
@endsection
