<div class="bg-background-primary p-2 flex gap-4 items-center">
    <x-button type="button" class="size-8 text-2xl relative">
        <span class="font-emoji absolute top-1/2 left-1/2 -translate-1/2">v</span>
    </x-button>
    <div x-data class="flex gap-2 overflow-x-auto max-w-full">
        <template x-for="window in $store.windowManager.windows">
            <x-button
                type="button"
                x-on:click="$store.windowManager.minimize(window.id);"
                x-bind:class="{
                    'bg-foreground/10': window.minimized
                }"
                class="shrink-0"
            >
                <span x-text="window.minimized ? '^' : ''"></span>
                <span x-text="window.title"></span>
            </x-button>
        </template>
    </div>
</div>