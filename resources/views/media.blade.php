@extends('layouts.app')

@section('body')
<main class="min-h-screen w-screen p-4 flex flex-col gap-6 bg-background-primary">
    <header class="p-4 border-b-2 border-dashed border-highlight/30">
        <h1 class="text-body-large text-highlight">Media Reviews</h1>
        <p class="text-label-small opacity-70">games, movies, and shows i've experienced</p>
    </header>

    <section class="grid lg:grid-cols-4 grid-cols-2 gap-4">
        @forelse ($mediaList as $media)
        <a href="{{ route('media.show', $media) }}" class="group bg-background-primary shadow-window-outline p-2 flex flex-col gap-2">
            <div class="relative aspect-3/4 overflow-hidden">
                @if($media->poster)
                    <img class="w-full h-full object-cover" src="{{ Storage::url($media->poster) }}" alt="{{ $media->title }}">
                @else
                    <div class="flex items-center justify-center h-full text-[10px] opacity-20">NO POSTER</div>
                @endif

                @if($media->is_favorite)
                    <div class="absolute top-1 right-3 text-highlight text-lg font-emoji">C</div>
                @endif

                <div class="absolute bottom-0 left-0 right-0 bg-background-tertiary/20 backdrop-blur-md p-1 text-[8px] uppercase tracking-tighter">
                    {{ $media->type }}
                </div>
            </div>

            <div class="flex flex-col gap-1 px-4 pb-4 pt-1">
                <span class="font-bold text-highlight wrap-break-word">{{ $media->title }}</span>
                <div class="flex text-lg font-emoji leading-none h-3 gap-0.5">
                    @for($i = 0; $i < 5; $i++)
                        @if ($i < $media->stars)
                            <span class="text-highlight">G</span>
                        @else
                            <span class="text-foreground/40">F</span>
                        @endif
                    @endfor
                    @if($media->is_favorite)
                        <span class="ml-1 text-red-400">C</span>
                    @endif
                </div>
            </div>
        </a>
        @empty
        <div class="col-span-full text-center py-20 border-2 border-dashed border-highlight/10">
            <p class="opacity-30 italic">no reviews yet...</p>
        </div>
        @endforelse
    </section>

    <section class="p-8">
        {{ $mediaList->links('components.pagination') }}
    </section>
</main>
@endsection
