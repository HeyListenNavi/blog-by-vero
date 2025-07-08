@props([
    'href',
    'icon',
    'title',
    'date',
])

<article class="h-fit w-30 p-2 hover:outline-2 hover:outline-dashed hover:outline-foreground/10 cursor-pointer">
    <a href="{{ $href }}" target="_parent">
        <img class="size-30" src="{{ $icon}}" />
        <div class="wrap-break-word">
            <span>{{ $title }}</span>
            <span>{{ $date }}</span>
        </div>
    </a>
</article>