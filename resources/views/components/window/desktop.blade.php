@props([
    'name',
    'buttons' => ['minimize', 'maximize', 'close'],
])

@pushOnce('scripts')
    <script>
        function makeDraggable(id) {
            gsap.set(`#${id}`, {
                position: 'absolute',
                top: '50%',
                left: '50%',
                xPercent: -50,
                yPercent: -50
            });
            Draggable.create(`#${id}`, {
                inertia: true,
                bounds: '#screen',
                trigger: '#titlebar'
            });
        }
    </script>
@endPushOnce

<x-window
    x-data="{ id: $id('window') }"
    x-bind:id="id"
    x-init="makeDraggable(id)"

    x-show="$store.windowManager.get(id)?.minimized === false"
    x-bind:class="{ 
        'w-full h-full !top-0 !left-0 !transform-none': $store.windowManager.get(id)?.maximized,
    }"

    x-on:close-window="$store.windowManager.close(id)"
    x-on:maximize-window="$store.windowManager.maximize(id)"
    x-on:minimize-window="$store.windowManager.minimize(id)"

    title="{{ $name }}"
    name="{{ $name }}"
    
    :buttons="$buttons"
    
    {{ $attributes->merge(['class' => 'w-fit']) }}
>
    {{ $slot }}
</x-window>