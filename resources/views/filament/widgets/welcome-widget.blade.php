<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex flex-col md:flex-row items-start gap-6">
            <img
                src="{{ Vite::image('portal-icon.png') }}"
                class="size-32 rounded-md shrink-0"
                alt="Portal icon"
            >
            <div class="flex-1 space-y-2">
                <p class="text-xl font-bold tracking-tight">
                    It's been a long time, {{ $user->name }}.
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    The Enrichment Center welcomes you.
                    <br>
                    This dashboard is <span class="italic">property of Aperture Science</span> —
                    a facility for authorised test subjects and personnel only.
                </p>
                <p class="text-xs text-gray-400 dark:text-gray-500">
                    "While it's been a privilege to watch you work, please remember:
                    the cake is not a lie. The button, however, is waiting."
                </p>
                @if ($panelUrl)
                    <div class="pt-2">
                        <x-filament::button
                            tag="a"
                            :href="$panelUrl"
                            target="_blank"
                            rel="noopener noreferrer"
                            icon="heroicon-m-arrow-top-right-on-square"
                            icon-position="after"
                        >
                            Enter the Portal Panel
                        </x-filament::button>
                    </div>
                @endif
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
