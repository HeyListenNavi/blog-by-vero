@props([
    'href',
    'icon',
    'title',
    'date',
])

<div class="w-28">
    <a href="{{ $href }}" target="_parent">
        <img class="size-28" src="{{ $icon}}" />
        <div class="wrap-break-word">
            <span>{{ $title }}</span>
            <span>{{ $date }}</span>
        </div>
    </a>
</div>