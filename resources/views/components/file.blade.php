@props([
'title' => 'File',
'icon' => Vite::image('music-cd.png'),
'href' => '#'
])

<a
    href="{{ $href }}"
    class="py-3 px-4 flex flex-col gap-2 items-center justify-center w-32 select-none cursor-pointer hover:bg-background-primary/30 hover:text-highlight-secondary">
    <img src="{{ $icon }}">
    <p class="text-shadow-outline text-shadow-background-primary/60">{{ $title }}</p>
</a>