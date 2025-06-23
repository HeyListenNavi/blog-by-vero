@props([
    'title' => 'File',
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
        function windowDraggable(id) {
            createDraggable(`#${id}`, {
                container: '#screen',
                trigger: `#${id} > #titlebar`, 
                containerFriction: 1,
            });
        }

        function iconDraggable(id) {
            createDraggable(`#${id}`, {
                container: '#desktop',
                velocityMultiplier: 0,
                releaseMass: 0,
                snap: 112,
                containerFriction: 1,
            })
        }
    </script>
@endPushOnce

<div
    x-data="{ id: $id('{{ Str::slug($title) }}-icon') }"
    x-init="iconDraggable(id)"
    @if ($open)
        x-init="
            iconDraggable(id)
            $store.windowManager.spawn($refs.properties)
        "
    @endif
    
    x-on:click="$store.windowManager.spawn($refs.app)"
    x-on:contextmenu.prevent="$store.windowManager.spawn($refs.properties)"
    x-on:long-press.prevent="$store.windowManager.spawn($refs.properties)"

    x-bind:id="id"
    class="w-28 h-28 py-2 flex flex-col gap-2 items-center justify-center select-none hover:bg-background-primary/30 hover:text-highlight-secondary"
>
    <img class="h-full pointer-events-none" src="{{ $icon }}">
    <p class="text-shadow-outline text-shadow-background-primary/60">{{ $title }}</p>

    <template x-ref="app">
        <x-window
            x-data="{ id: $id('{{ Str::slug($title) }}') }"
            x-init="windowDraggable(id);"
            x-bind:id="id"

            x-show="$store.windowManager.get(id)?.minimized === false"
            x-bind:class="{ 
                'w-full h-full top-0 left-0 translate-0': $store.windowManager.get(id)?.maximized,
            }"

            x-on:close-window="$store.windowManager.close(id)"
            x-on:maximize-window="$store.windowManager.maximize(id)"
            x-on:minimize-window="$store.windowManager.minimize(id)"

            name="{{ $title }}"
            title="{{ $title }}"
            :buttons="['minimize', 'maximize', 'close']"
            class="absolute top-1/2 left-1/2 -translate-1/2 w-fit"
        >
            {{ $slot }}
        </x-window>
    </template>

    <template x-ref="properties">
        <x-window
            x-data="{ id: $id('{{ Str::slug($title) }}-properties') }"
            x-init="windowDraggable(id);"
            x-bind:id="id"

            x-on:close-window="$store.windowManager.close(id)"
            
            name="{{ $title }} Properties"
            title="{{ $title }} Properties"
            class="absolute w-64 top-1/2 left-1/2 -translate-1/2"
        >
            <ul class="flex flex-col gap-2">
                <li class="flex flex-col gap-0">
                    <span class="font-bold">
                        Title
                    </span>
                    {{ $title }}
                </li>

                <li class="flex flex-col gap-0">
                    <span class="font-bold">
                        Icon
                    </span>
                    {{ $icon }}
                </li>

                <li class="flex flex-col gap-0">
                    <span class="font-bold">
                        File
                    </span>
                    {{ Str::slug($title) }}.{{ $extension }}
                </li>

                <li class="flex flex-col gap-0">
                    <span class="font-bold">
                        Description
                    </span>
                    {{ $description }}
                </li>

                <li class="flex flex-col gap-0">
                    <span class="font-bold">
                        Size
                    </span>
                    {{ $size }} KB
                </li>

                <li class="flex flex-col gap-0">
                    <span class="font-bold">
                        Date
                    </span>
                    {{ $date }}
                </li>

                <li class="flex flex-col gap-0">
                    <span class="font-bold">
                        Location
                    </span>
                    {{ $location }}
                </li>
                
                <li>{{ config('app.name') }}</li>
            </ul>
        </x-window>
    </template>
</div>