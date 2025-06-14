@props([
    'title' => 'File',
    'icon' => Vite::image('music-cd.png'),
    'href' => '#'
])

<div x-data="{ open: false }">
    <script>
        function initDraggable() {
            gsap.set("#app", {
                position: "absolute",
                top: "50%",
                left: "50%",
                xPercent: -50,
                yPercent: -50
            });
            window.Draggable.create('#app', {
                inertia: true,
                bounds: "#desktop",
                onClick: () => console.log('clicked'),
                onDragEnd: () => console.log('drag ended'),
            });
        }
    </script>
    <a
        x-on:click="open = !open" 
        href="{{ $href }}"
        class="py-3 px-8 flex flex-col gap-2 items-center justify-center w-32 select-none cursor-pointer hover:bg-background-primary/30 hover:text-highlight-secondary"
    >    
        <img class="w-full" src="{{ $icon }}">
        <p class="text-shadow-outline text-shadow-background-primary/60">{{ $title }}</p>
    </a>
    <div
        x-show="open"
        x-cloak
        x-init="initDraggable()" 
        id="app"
        class="w-92 h-64 flex items-center justify-center bg-background-primary z-50"
    >
        {{ $slot }}
    </div>
</div>