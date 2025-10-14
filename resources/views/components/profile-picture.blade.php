@props([
    'letter'
])

<div class="relative md:size-32 size-20 shrink-0 flex items-center justify-center bg-highlight-secondary/80 md:text-7xl text-5xl font-emoji select-none">
    <span class="text-center absolute left-1/2 top-1/2 -translate-x-[40%] -translate-y-1/2">
        {{ $letter }}
    </span>
</div>
