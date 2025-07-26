<div x-data="{ show: false }">
    <button
        x-ref="showMore" 
        x-on:click="show = !show"
        x-on:click.outside="show = false"
        class="absolute leading-none top-0 right-0 px-1 font-emoji text-3xl text-foreground/30 hover:text-highlight transition-colors cursor-pointer"
        type="button"
    >
        0
    </button>
    
    <div
        x-anchor.bottom-end="$refs.showMore"
        x-cloak
        x-show="show"
        class="w-max p-3 bg-background-tertiary z-100"
    >
        {{ $slot }}        
    </div>
</div>