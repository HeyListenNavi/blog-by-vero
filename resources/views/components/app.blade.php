@props([
    'title' => 'File',
    'icon' => Vite::image('music-cd.png'),
    'href' => '#',
    'open' => false
])

<div>
    @pushOnce('scripts')       
        <script>
            function initDraggable(id) {
                gsap.set(`#${id}`, {
                    position: 'absolute',
                    top: '50%',
                    left: '50%',
                    xPercent: -50,
                    yPercent: -50
                });
                window.Draggable.create(`#${id}`, {
                    inertia: true,
                    bounds: '#desktop',
                    onClick: () => console.log('clicked'),
                    onDragEnd: () => console.log('drag ended'),
                });
            }
        </script>
    @endPushOnce

    <a
        x-data
        x-on:click="$store.windowManager.spawn($refs.app)"
        href="{{ $href }}"
        class="py-3 px-8 flex flex-col gap-2 items-center justify-center w-32 select-none cursor-pointer hover:bg-background-primary/30 hover:text-highlight-secondary"
    >
        <img class="w-full" src="{{ $icon }}">
        <p class="text-shadow-outline text-shadow-background-primary/60">{{ $title }}</p>
        
        <template x-ref="app">
            <x-window
                x-data="{ id: $id('{{ Str::slug($title) }}') }"
                x-init="initDraggable(id);"
                x-bind:id="id"

                x-show="$store.windowManager.get(id)?.minimized === false"
                x-bind:class="{ 
                    'w-full h-full !absolute !top-0 !left-0 !transform-none': $store.windowManager.get(id)?.maximized,
                }"

                x-on:close-window="$store.windowManager.close(id)"
                x-on:maximize-window="$store.windowManager.maximize(id)"
                x-on:minimize-window="$store.windowManager.minimize(id)"

                name="{{ $title }}"
                title="{{ $title }}"
                :buttons="['minimize', 'maximize', 'close']"
            >
                {{ $slot }}
            </x-window>
        </template>
    </a>
</div>
