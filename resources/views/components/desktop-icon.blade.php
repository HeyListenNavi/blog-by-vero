@props([
    'name' => 'File',
    'icon' => Vite::image('music-cd.png'),
    'open' => false,

    'extension' => 'exe',
    'description' => 'No description',
    'size' => fake()->numberBetween(0, 999),
    'date' => fake()->date(),
    'location' => '/home/naviheylisten/projects/blog-by-vero',
])

@pushOnce('scripts')       
    <script>
        function makeIconDraggable(id) {
            const iframes = document.querySelectorAll('iframe');
            Draggable.create(`#${id}`, {
                inertia: true,
                bounds: '#desktop',
                snap: function(endValue) { 
                    return Math.round(endValue / 112) * 112;
                },
                throwResistance: 100000,
                maxDuration: 0.1,
                allowContextMenu: true,
                onPress: function() {
                    iframes.forEach(iframe => {
                        iframe.style.pointerEvents = 'none';
                    });
                },
                onRelease: function() {
                    iframes.forEach(iframe => {
                        iframe.style.pointerEvents = 'auto';
                    });
                },
            });
        }
    </script>
@endPushOnce

<div
    x-data="{ id: $id('icon') }"
    @if ($open)
        x-init="
            $store.windowManager.spawn($refs.app);
            makeIconDraggable(id);
        "
    @endif
    x-init="makeIconDraggable(id)"
    
    x-on:click="$store.windowManager.spawn($refs.app)"
    x-on:contextmenu.prevent="$store.windowManager.spawn($refs.properties)"
    x-on:long-press.prevent="$store.windowManager.spawn($refs.properties)"
    
    x-bind:id="id"
    class="icon w-28 h-28 py-2 flex flex-col gap-2 items-center justify-center select-none hover:bg-background-primary/30 hover:text-highlight-secondary"
>
    <img class="h-full pointer-events-none" src="{{ $icon }}">
    <p class="text-shadow-outline text-shadow-background-primary/60">{{ $name }}</p>

    <template x-ref="app">
        <x-window.desktop name="{{ $name }}">
            {{ $slot }}
        </x-window.desktop>
    </template>

    <template x-ref="properties">
        <x-window.properties
            name="{{ $name }} Properties"
            icon="{{ $icon }}"
            extension="{{ $extension }}"
            description="{{ $description }}"
            size="{{ $size }}"
            date="{{ $date }}"
            location="{{ $location }}"
        />
    </template>
</div>