<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{
        state: $wire.entangle('{{ $getStatePath() }}'),
        hover: 0,
        stars: {{ $getStars() }}
    }" class="flex items-center select-none">
        <template x-for="i in stars">
            <span
                {{-- G equal filled star and F equals empty star --}}
                x-text=" (hover >= i || (hover === 0 && state >= i)) ? 'G' : 'F'"
                class="cursor-pointer px-0.5 font-emoji text-4xl transition-colors"
                :style="{
                    'color': (hover >= i || (hover === 0 && state >= i)) ? '#eabbb9' : '#444',
                }"
                x-on:mouseenter="hover = i"
                x-on:mouseleave="hover = 0"
                x-on:click="state = i"
            ></span>
        </template>

        <button
            type="button"
            x-show="state > 0"
            x-on:click="state = 0"
            class="ml-4 text-[10px] uppercase opacity-50 hover:opacity-100"
        >
            [clear]
        </button>
    </div>
</x-dynamic-component>
