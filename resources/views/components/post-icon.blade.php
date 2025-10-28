@props([
    'href',
    'icon',
    'title',
    'date',
    'newTab' => false,
])

<article class="h-fit w-18 lg:w-24 p-1 lg:p-2 hover:outline-2 hover:outline-dashed hover:outline-foreground/10 cursor-pointer">
    <a class="flex flex-col items-center gap-1" href="{{ $href }}" @if ($newTab) target="_parent @endif">
        <img class="size-10" src="{{ $icon }}" />
        <div class="text-center text-xs">
            <span class="wrap-break-word hyphens-auto">{{ $title }}</span>
            <span>{{ $date }}</span>
        </div>
    </a>
</article>
