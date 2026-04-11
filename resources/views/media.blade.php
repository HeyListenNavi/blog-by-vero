@extends('layouts.app')

@section('body')
<main class="min-h-screen w-full p-4 flex flex-col gap-6 bg-background-primary">
    <header class="p-4 border-b-2 border-dashed border-highlight/30">
        <h1 class="text-body-large text-highlight">Media Reviews</h1>
        <p class="text-label-small opacity-70">games, movies, and shows i've experienced</p>
    </header>

    <section class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse ($mediaList as $media)
        <a href="{{ route('media.show', $media) }}" class="group bg-background-primary shadow-window-outline p-2 flex flex-col gap-2 hover:bg-background-secondary transition-colors">
            <div class="relative aspect-[3/4] bg-black border-2 border-background-tertiary overflow-hidden">
                @if($media->poster)
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ Storage::url($media->poster) }}" alt="{{ $media->title }}">
                @else
                    <div class="flex items-center justify-center h-full text-[10px] opacity-20">NO POSTER</div>
                @endif

                @if($media->is_favorite)
                    <div class="absolute top-1 right-1 bg-highlight text-background-primary px-1 text-[8px] font-bold">FAV</div>
                @endif

                <div class="absolute bottom-0 left-0 right-0 bg-background-tertiary/80 backdrop-blur-sm p-1 text-[8px] uppercase tracking-tighter">
                    {{ $media->type }}
                </div>
            </div>

            <div class="flex flex-col gap-1">
                <span class="text-[10px] font-bold text-highlight truncate">{{ $media->title }}</span>
                <div class="flex text-highlight text-[12px] font-emoji leading-none h-3">
                    @for($i = 0; $i < 5; $i++)
                        <span>{{ $i < $media->stars ? 'G' : 'F' }}</span>
                    @endfor
                    @if($media->is_favorite)
                        <span class="ml-1 text-danger">C</span>
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

    <section class="p-4 flex justify-center">
        {{ $mediaList->links('components.pagination') }}
    </section>
</main>
@endsection
