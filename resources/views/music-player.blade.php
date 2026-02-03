@extends('layouts.app')

@pushOnce('scripts')
    <script src="https://open.spotify.com/embed/iframe-api/v1" async></script>
@endPushOnce

@section('body')
    <div x-data="musicPlayer()" class="flex flex-col items-center gap-4 p-4">
        <div class="text-center">
            <p class="text-[10px] uppercase opacity-50">Now Playing</p>
            <h3 class="truncate text-sm font-bold" x-text="currentSong.name || 'Select a song'"></h3>
        </div>

        <div class="text-center">
            <p class="text-[10px] uppercase opacity-50">By</p>
            <h3 class="truncate text-[10px] font-bold" x-text="currentSong.artist || 'Unknown Artist'"></h3>
        </div>

        <div x-data="{ dots: '' }" x-init="setInterval(() => { dots = dots.length >= 3 ? '' : dots + '.' }, 400)" class="text-highlight-secondary h-2 text-center text-[10px]">
            <p x-show="status === 'loading'">Connecting to Spotify<span x-text="dots" class="inline-block w-4"></span></p>
        </div>

        <div class="flex flex-col gap-1 w-full">
            <label class="text-[10px] uppercase opacity-50">Playlist</label>
            <select
                class="bg-background-tertiary text-foreground border-foreground/10 focus:border-highlight-secondary cursor-pointer border-2 p-2 text-[12px] outline-none"
                x-on:change="playSong(playlist.find(s => s.uri === $event.target.value))"
            >
                <option value="" disabled selected>Choose a track...</option>
                <template x-for="song in playlist" x-bind:key="song.uri">
                    <option x-bind:value="song.uri" x-text="`${song.name} by ${song.artist}`"></option>
                </template>
            </select>
        </div>

        <div class="flex w-full justify-between gap-2">
            <x-button type="button" class="flex-1 px-4" x-on:click="playPause"
                x-bind:disabled="currentSong.name === ''">
                <span x-show="status !== 'playing'">▶</span>
                <span x-show="status === 'playing'">⏸</span>
            </x-button>

            <x-button type="button" class="flex-1 px-4" x-on:click="restart"
                x-bind:disabled="currentSong.name === ''">
                <span>■</span>
            </x-button>
        </div>

        <div class="h-0 overflow-hidden opacity-0">
            <div id="spotify-player"></div>
        </div>
    </div>
@endsection
