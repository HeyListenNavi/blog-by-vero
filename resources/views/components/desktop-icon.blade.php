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
    x-data="{ id: $id('{{ Str::slug($name) }}-icon') }"
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
    <p class="text-shadow-outline text-shadow-background-primary/60">{{ $name }}</p>

    <template x-ref="app">
        <x-window.desktop id="{{ Str::slug($name) }}" name="{{ $name }}">
            {{ $slot }}
        </x-window.desktop>
    </template>

    <template x-ref="properties">
        <x-window.desktop id="{{ Str::slug($name) }}-properties" name="{{ $name }} Properties" :buttons="['close']">
            <ul class="flex flex-col gap-2">
                <li class="flex flex-col gap-0">
                    <span class="font-bold">
                        Title
                    </span>
                    {{ $name }}
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
                    {{ Str::slug($name) }}.{{ $extension }}
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
        </x-window.desktop>
    </template>
</div>