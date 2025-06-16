@props([
    'title' => 'title',
    'buttons' => ['close']
])

<div
    {{ $attributes->merge(["class" => "flex flex-col bg-background-primary shadow-window-outline p-2 min-w-42"]) }}
>
    <div class="flex justify-between items-center p-2 bg-background-secondary">
        <div>
            {{ $title }}
        </div>
        <div>
            @foreach ($buttons as $button)
                <button 
                    class="w-6 pb-1 border-2 border-foreground/30 [border-style:_inset]"
                    @if ($button == "close")
                        x-on:click="$dispatch('close-window')" 
                    @endif 
                >
                    @switch($button)
                        @case("close")
                            x
                            @break
                        @case("minimize")
                            -
                            @break
                        @case("maximize")
                            O
                            @break
                    @endswitch
                </button>
            @endforeach
        </div>
    </div>
    <div class="h-full p-2">
        {{ $slot }}
    </div>
</div>