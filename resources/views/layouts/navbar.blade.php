@pushOnce('scripts')
    <script>
        function timeAndDate() {
            return {
                time: new Date(),
                init() {
                    setInterval(() => {
                        this.time = new Date();
                    }, 1000);
                },
                getDate() {
                    return this.time.toLocaleString('en-US', {
                        weekday: 'short',
                        month: 'long',
                        day: 'numeric',
                    });
                },
                getTime() {
                    return this.time.toLocaleString('en-US', {
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit',
                        hour12: true
                    });
                }
            }
        }
    </script>
@endPushOnce

<footer class="bg-background-primary flex items-center gap-2 p-2 text-[10px] md:text-base">
    <x-button type="button" class="relative size-8 md:text-[20px] text-[16px]">
        <span class="font-emoji -translate-1/2 absolute left-1/2 top-1/2">v</span>
    </x-button>

    <nav x-data class="flex w-full max-w-full gap-2 overflow-x-auto">
        <template x-for="window in $store.windowManager.windows">
            <x-button type="button" x-on:click="$store.windowManager.minimize(window.id);"
                x-bind:class="{
                    'bg-foreground/10': window.minimized
                }"
                class="shrink-0">
                <span x-text="window.minimized ? '^' : ''"></span>
                <span x-text="window.title"></span>
            </x-button>
        </template>
    </nav>

    <div x-data="timeAndDate()" x-init="init()" class="w-58 flex h-full flex-col items-end text-end">
        <span x-text="getTime()"></span>
        <span x-text="getDate()"></span>
    </div>
</footer>
