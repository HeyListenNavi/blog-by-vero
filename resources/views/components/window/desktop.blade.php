@props([
    'id',
    'name',
    'buttons' => ['minimize', 'maximize', 'close'],
])

<x-window
    x-data="{ id: '{{ $id }}' }"
    x-init="windowDraggable(id);"
    x-bind:id="id"

    x-show="$store.windowManager.get(id)?.minimized === false"
    x-bind:class="{ 
        'w-full h-full top-0 left-0 translate-0': $store.windowManager.get(id)?.maximized,
    }"

    x-on:close-window="$store.windowManager.close(id)"
    x-on:maximize-window="$store.windowManager.maximize(id)"
    x-on:minimize-window="$store.windowManager.minimize(id)"

    title="{{ $name }}"
    name="{{ $name }}"
    
    :buttons="$buttons"
    
    {{ $attributes->merge(['class' => 'absolute top-1/2 left-1/2 -translate-1/2 w-fit']) }}
>
    {{ $slot }}
</x-window>