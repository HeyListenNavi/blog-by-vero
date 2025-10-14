@props([
    'title' => 'title',
    'buttons' => ['close'],
])

@php
    $buttonMap = [
        'close' => ['label' => 'x', 'event' => 'close-window'],
        'minimize' => ['label' => 'l', 'event' => 'minimize-window'],
        'maximize' => ['label' => 'o', 'event' => 'maximize-window'],
    ];
@endphp

<div {{ $attributes->merge(['class' => 'flex flex-col bg-background-primary shadow-window-outline p-2 min-w-42']) }}>
    <header id="titlebar" class="bg-background-secondary flex select-none items-center justify-between gap-1 p-2">
        <div>
            {{ $title }}
        </div>
        <div x-data>
            @foreach ($buttons as $button)
                @if ($button == 'close')
                    <x-button type="button" class="relative size-6 !p-0" x-on:click="$dispatch('close-window')">
                        <span
                            class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-[65%] font-bold leading-none">
                            x
                        </span>
                    </x-button>
                @endif

                @if ($button == 'maximize')
                    <x-button type="button" class="relative size-6 !p-0" x-on:click="$dispatch('maximize-window')">
                        <span
                            class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-[65%] font-bold leading-none">
                            o
                        </span>
                    </x-button>
                @endif

                @if ($button == 'minimize')
                    <x-button type="button" class="relative size-6 !p-0" x-on:click="$dispatch('minimize-window')">
                        <span
                            class="absolute left-1/2 top-1/2 -translate-1/2 rotate-90 font-bold leading-none">
                            l
                        </span>
                    </x-button>
                @endif
            @endforeach
        </div>
    </header>
    {{ $slot }}
</div>
