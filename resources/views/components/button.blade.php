@props([
    'href' => null,
    'type' => null,
])

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'bg-background-tertiary px-2 py-1 pb-1.5 border-2 border-foreground/30 [border-style:inset] active:border-dashed']) }}>
        {{ $slot }}
    </a>
@elseif ($type)
    <button type="{{ $type }}" {{ $attributes->merge(['class' => 'bg-background-tertiary px-2 py-1 pb-1.5 border-2 border-foreground/30 [border-style:inset] active:border-dashed cursor-pointer']) }}>
        {{ $slot }}
    </button>
@else
    <span {{ $attributes->merge(['class' => 'text-zinc-600 cursor-default select-none bg-background-tertiary px-2 py-1 pb-1.5 border-2 border-foreground/30 [border-style:inset]']) }}>
        {{ $slot }}
    </span>
@endif