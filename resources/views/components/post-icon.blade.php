@props([
    'href',
    'icon',
    'title',
    'date',
])

<article class="h-fit w-24 p-2 hover:outline-2 hover:outline-dashed hover:outline-foreground/10 cursor-pointer">
    <a class="flex flex-col items-center gap-1" href="{{ $href }}" target="_parent">
        <img class="size-10" src="{{ asset('storage/' . $icon) }}" />
        <div class="wrap-break-word text-center text-sm">
            <span>{{ $title }}</span>
            <span>{{ $date }}</span>
        </div>
    </a>
</article>
