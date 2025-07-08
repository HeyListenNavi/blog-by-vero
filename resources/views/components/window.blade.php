@props([
    'title' => 'title',
    'buttons' => ['close']
])

@php
$buttonMap = [
    'close' => ['label' => 'x', 'event' => 'close-window'],
    'minimize' => ['label' => '-', 'event' => 'minimize-window'],
    'maximize' => ['label' => 'O', 'event' => 'maximize-window'],
];
@endphp

<div {{ $attributes->merge(["class" => "flex flex-col bg-background-primary shadow-window-outline p-2 min-w-42"]) }}>
    <div id="titlebar" class="flex justify-between gap-1 items-center p-2 bg-background-secondary select-none">
        <div>
            {{ $title }}
        </div>
        <div x-data>
            @foreach ($buttons as $button)
                @php $config = $buttonMap[$button] ?? null; @endphp

                @if ($config)
                    <x-button
                        type="button"
                        class="size-6 relative !p-0"
                        x-on:click="$dispatch('{{ $config['event'] }}')"
                    >
                        <span class="absolute leading-none top-1/2 left-1/2 -translate-x-1/2 -translate-y-[60%]">
                            {{ $config['label'] }}
                        </span>
                    </x-button>
                @endif
            @endforeach
        </div>
    </div>
    {{ $slot }}
</div>