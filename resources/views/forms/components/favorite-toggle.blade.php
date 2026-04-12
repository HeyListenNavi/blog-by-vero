<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{
        state: $wire.entangle('{{ $getStatePath() }}')
    }" class="flex items-center select-none" style="height: 40px;">
        <span
            class="cursor-pointer font-emoji text-5xl transition-all duration-150 hover:scale-110 transform"
            :style="{
                'color': state ? '#ef4444' : '#444',
            }"
            x-on:click="state = !state"
        >
            C
        </span>
    </div>
</x-dynamic-component>
