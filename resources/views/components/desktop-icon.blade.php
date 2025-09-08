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
            const allIcons = document.querySelectorAll('.icon'); 

            Draggable.create(`#${id}`, {
                inertia: true,
                bounds: '#desktop',
                snap: function(endValue) {
                    return Math.round(endValue / 80) * 80;
                },
                throwResistance: 100000,
                maxDuration: 0.1,
                allowContextMenu: true,
                allowEventDefault: true,

                onPress: function() {
                    iframes.forEach(iframe => {
                        iframe.style.pointerEvents = 'none';
                    });
                    
                    this.startX = this.x;
                    this.startY = this.y;
                },

                onRelease: function() {
                    iframes.forEach(iframe => {
                        iframe.style.pointerEvents = 'auto';
                    });
                },

                onDragEnd: function() {
                    let isOverlapping = false;
                    
                    allIcons.forEach(otherIcon => {
                        if (otherIcon !== this.target) {
                            if (this.hitTest(otherIcon, "50%")) {
                                isOverlapping = true;
                            }
                        }
                    });

                    if (isOverlapping) {
                        gsap.to(this.target, {
                            x: this.startX,
                            y: this.startY,
                            duration: 0.3, 
                            ease: 'power2.out'
                        });
                    }
                }
            });
        }
    </script>
@endPushOnce

<article
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
    class="icon min-h-20 w-18 py-2 px-1 flex flex-col gap-2 items-center justify-center select-none hover:bg-background-primary/30 hover:text-highlight-secondary"
>
    <img class="size-10" src="{{ $icon }}">
    <p class="w-full text-center wrap-break-word text-[10px] text-shadow-outline text-shadow-background-primary/60">{{ $name }}</p>

    <template x-ref="app" name="{{ $name }}">
        <x-window.desktop name="{{ $name }}" {{ $attributes->merge() }}>
            {{ $slot }}
        </x-window.desktop>
    </template>

    <template x-ref="properties" name="{{ $name }} Properties">
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
</article>