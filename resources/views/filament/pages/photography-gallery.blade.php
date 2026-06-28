<x-filament-panels::page>
    @php($photographies = $this->getPhotographies())

    <div class="grid grid-cols-2 gap-2 md:grid-cols-3 md:gap-3 lg:grid-cols-4 lg:gap-4">
        @foreach ($photographies as $photography)
            <a
                href="{{ $this->getPostUrl($photography) }}"
                class="block overflow-hidden rounded-lg"
            >
                <img
                    src="{{ $photography->url }}"
                    alt=""
                    class="h-48 w-full object-cover transition-transform duration-300 hover:scale-105 md:h-64"
                    loading="lazy"
                >
            </a>
        @endforeach
    </div>

    @if ($photographies->hasMorePages())
        <div
            x-data="{
                init() {
                    const observer = new IntersectionObserver(([entry]) => {
                        if (entry.isIntersecting) {
                            $wire.loadMore();
                        }
                    }, { rootMargin: '200px' });
                    observer.observe(this.$el);
                }
            }"
            class="flex items-center justify-center py-8"
        >
            <x-filament::loading-indicator class="h-8 w-8" />
        </div>
    @endif
</x-filament-panels::page>
