@extends('layouts.app')

@section('body')
    <main class="bg-background-primary flex min-h-screen w-screen flex-col gap-12 overflow-x-hidden p-4">
        <section class="flex flex-col gap-6">
            <header class="border-highlight/30 border-b-2 border-dashed p-4">
                <h1 class="text-body-large text-highlight">Music Reviews</h1>
                <p class="text-label-small opacity-70">albums, singles, and songs i've listened to</p>
            </header>

            <div class="flex min-h-[350px] gap-12 overflow-x-auto px-4 py-8 pr-[150px]">
                @forelse ($musicList as $music)
                    <div
                        class="group relative z-10 flex shrink-0 flex-col gap-2"
                        x-data
                        x-cloak
                    >
                        <div class="relative block">
                            <img
                                class="bg-background-secondary peer relative z-10 aspect-square w-48 object-cover transition-all duration-500 ease-in-out hover:mr-[100px] hover:translate-y-[-10px] hover:shadow-[0_0_15px_5px_rgba(234,187,185,0.3)]"
                                src="{{ $music->url }}"
                                alt="{{ $music->title }} cover"
                                loading="lazy"
                            >

                            <img
                                class="absolute left-2 top-1 -z-10 block aspect-square w-44 animate-[spin_4s_linear_infinite] drop-shadow-[0_0_8px_black] filter transition-all duration-500 ease-in-out peer-hover:left-[45%]"
                                src="{{ Vite::image('vinyl-disc.png') }}"
                                alt="Vinyl disc"
                                loading="lazy"
                            >
                        </div>

                        <div class="flex w-48 flex-col gap-1">
                            <span class="text-highlight block truncate font-bold">{{ $music->title }}</span>
                            <span class="block truncate text-xs opacity-70">{{ $music->artist }}</span>
                            <div class="font-emoji mt-1 flex h-3 gap-0.5 text-lg leading-none">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $music->stars)
                                        <span class="text-highlight">G</span>
                                    @else
                                        <span class="text-foreground/20">F</span>
                                    @endif
                                @endfor
                                @if ($music->is_favorite)
                                    <span class="ml-1 text-red-400">C</span>
                                @endif
                            </div>
                            <p class="text-foreground mt-1 text-[12px]">{{ $music->description }}</p>
                        </div>
                    </div>
                @empty
                    <div class="border-highlight/10 w-full border-2 border-dashed py-20 text-center">
                        <p class="italic opacity-30">no music reviews yet...</p>
                    </div>
                @endforelse
            </div>

            @if ($musicList->hasPages())
                <div class="px-4">
                    {{ $musicList->links('components.pagination') }}
                </div>
            @endif
        </section>

        <section class="flex flex-col gap-6">
            <header class="border-highlight/30 border-b-2 border-dashed p-4">
                <h2 class="text-body-large text-highlight">My Playlists</h2>
                <p class="text-label-small opacity-70">checkout each cassette, they are each carefully selected to express
                    something</p>
            </header>

            <div class="grid gap-8 px-4 pb-12 md:grid-cols-2 lg:grid-cols-4">
                @forelse ($playlists as $playlist)
                    <div class="group flex flex-col gap-4">
                        <model-viewer
                            src="{{ asset('cassette.gltf') }}"
                            style="width: 100%"
                            camera-controls
                            disable-zoom
                            disable-pan
                            touch-action="pan-y"
                            auto-rotate
                            rotation-per-second="30deg"
                            interaction-prompt="none"
                            shadow-intensity="1"
                        >
                        </model-viewer>

                        <a
                            class="flex flex-col items-center gap-4 text-center"
                            href="{{ $playlist->url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <div>
                                <h3 class="text-highlight text-sm font-bold">{{ $playlist->title }}</h3>
                                <p class="text-foreground mt-1 text-[12px]">{{ $playlist->description }}</p>
                            </div>

                            <x-button
                                class="self-center"
                                href="{{ $playlist->url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >Listen on Spotify</x-button>
                        </a>
                    </div>
                @empty
                    <div class="border-highlight/10 col-span-full border-2 border-dashed py-20 text-center">
                        <p class="italic opacity-30">no playlists yet...</p>
                    </div>
                @endforelse
            </div>
        </section>
    </main>
@endsection

@push('styles')
    <style>
        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
@endpush
