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
    <div id="titlebar" class="flex justify-between items-center p-2 bg-background-secondary select-none">
        <div>
            {{ $title }}
        </div>
        <div x-data>
            @foreach ($buttons as $button)
                @php $config = $buttonMap[$button] ?? null; @endphp

                @if ($config)
                    <button class="w-6 pb-1 border-2 border-foreground/30 cursor-pointer [border-style:_inset]"
                        x-on:click="$dispatch('{{ $config['event'] }}')">
                        {{ $config['label'] }}
                    </button>
                @endif
            @endforeach
        </div>
    </div>
    <div class="h-full overflow-auto p-2">
        {{ $slot }}
    </div>
</div>