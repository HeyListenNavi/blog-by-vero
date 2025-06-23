@props([
    'name',
    'icon',
    'extension',
    'description',
    'size',
    'date',
    'location',
])
<x-window.desktop
    name="{{ $name }}"
    
    :buttons="['close']"
    
    {{ $attributes->merge(['class' => 'absolute top-1/2 left-1/2 -translate-1/2 w-fit']) }}
>
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

        <li class="flex flex-col gap-0">
            <span class="font-bold">
                Id
            </span>
            <span x-data x-text="$store.windowManager.get(id)?.id"></span>
        </li>
        
        <li>{{ config('app.name') }}</li>
    </ul>
</x-window.desktop>