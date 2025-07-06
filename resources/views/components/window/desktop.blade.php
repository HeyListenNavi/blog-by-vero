@props([
    'name',
    'buttons' => ['minimize', 'maximize', 'close'],
])

<x-window
    x-data="{ id: $id('window') }"
    x-bind:id="id"

    x-show="$store.windowManager.get(id)?.minimized === false"
    x-bind:class="{ 
        '!w-full !h-full !top-0 !left-0 !transform-none': $store.windowManager.get(id)?.maximized,
    }"

    x-on:close-window="$store.windowManager.close(id)"
    x-on:maximize-window="$store.windowManager.maximize(id)"
    x-on:minimize-window="$store.windowManager.minimize(id)"

    title="{{ $name }}"
    
    :buttons="$buttons"
    
    {{ $attributes->merge(['class' => 'w-fit max-h-svh']) }}
>
    {{ $slot }}
</x-window>