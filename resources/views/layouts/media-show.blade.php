@extends('layouts.app')

@section('body')
<main class="min-h-screen w-full p-4 flex flex-col items-center justify-center bg-background-primary overflow-x-hidden">
    <div class="w-full max-w-2xl flex flex-col gap-4">
        {{-- Header / Breadcrumb --}}
        <div class="flex items-center justify-between px-2">
            <a class="text-[10px] uppercase tracking-widest hover:text-highlight transition-colors cursor-pointer" onclick="history.back()">[ Back to Reviews ]</a>
            <div class="text-[10px] uppercase tracking-widest text-highlight">
                Review: {{ $media->title }}
            </div>
        </div>

        {{-- Detail Box --}}
        <article class="bg-background-primary shadow-window-outline p-4 flex flex-col md:grid md:grid-cols-[200px_1fr] gap-6">
            
            {{-- Poster Side --}}
            <div class="flex flex-col gap-4">
                <div class="relative aspect-[3/4] bg-black border-4 border-background-tertiary flex items-center justify-center overflow-hidden">
                    @if($media->poster)
                        <img class="max-w-full max-h-full object-contain" src="{{ Storage::url($media->poster) }}" alt="{{ $media->title }}">
                    @else
                        <div class="flex items-center justify-center h-full text-[10px] opacity-20 italic">NO POSTER</div>
                    @endif
                </div>
                
                {{-- Quick Status Board --}}
                <div class="bg-background-secondary p-3 border-2 border-background-tertiary flex flex-col gap-2">
                    <div class="flex flex-col">
                        <span class="text-[8px] uppercase text-highlight/50">Date Reviewed</span>
                        <span class="text-[10px] font-mono">{{ $media->review_date ? $media->review_date->format('Y-m-d') : 'Unknown' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[8px] uppercase text-highlight/50">Rating</span>
                        <div class="flex text-highlight text-lg font-emoji leading-none h-4">
                            @for($i = 0; $i < 5; $i++)
                                <span>{{ $i < $media->stars ? 'G' : 'F' }}</span>
                            @endfor
                            @if($media->is_favorite)
                                <span class="ml-2 text-red-500">C</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Info Side --}}
            <div class="flex flex-col gap-4">
                <div class="border-b-2 border-dashed border-background-tertiary pb-2">
                    <span class="text-[10px] uppercase tracking-[0.2em] text-highlight/50">{{ $media->type }}</span>
                    <h1 class="text-body-large text-highlight leading-tight">{{ $media->title }}</h1>
                </div>

                <div class="flex-grow">
                    <div class="prose prose-invert prose-sm max-w-none text-xs leading-relaxed text-foreground/80 space-y-4">
                        @if($media->content)
                            <div class="rich-content">
                                {!! $media->content !!}
                            </div>
                        @else
                            <p class="italic opacity-30">No review content provided.</p>
                        @endif
                    </div>
                </div>

                <div class="mt-auto pt-4 flex justify-between items-center opacity-30 text-[8px] uppercase tracking-widest border-t-2 border-background-tertiary">
                    <span>Vero's Media Vault</span>
                    <span>Ref: M-{{ str_pad($media->id, 4, '0', STR_PAD_LEFT) }}</span>
                </div>
            </div>
        </article>
    </div>
</main>
@endsection
