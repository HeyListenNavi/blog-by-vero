<main class="w-full flex-1 bg-background min-h-svh px-4 pt-4 pb-16 flex flex-col gap-4">
    <a
        class="underline cursor-pointer hover:text-highlight-secondary transition-colors"
        href="{{ route('home') }}"
        id="top"
    >
        ← {{$post->date->format('Y-m-d') }}
    </a>

    <section class="w-full max-w-2xl self-center flex flex-col gap-2">
        <x-window title="Post {{ $post->date->format('Y-m-d') }}" :buttons="['minimize', 'maximize', 'close']">
            <div class="px-8 py-6 flex flex-col gap-4">
                <h1 class="text-display-medium text-4xl break-words">{{ $post->title }}</h1>
                <div class="w-full max-w-full prose dark:prose-invert text-xs text-foreground/80 leading-6">
                    {!! 
                        \Filament\Forms\Components\RichEditor\RichContentRenderer::make($post->content)
                            ->customBlocks([
                                \App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\SketchLinkBlock::class,
                            ])
                            ->toHtml() 
                    !!}
                </div>
            </div>
        </x-window>
    </section>

    <x-window 
        class="w-full max-w-md fixed bottom-2 left-1/2 -translate-x-1/2 scale-80 lg:scale-100"
        title="NAVI-gation"
    >
        <div class="flex justify-between gap-4 py-2 px-4">
            <div class="flex justify-start">
                @if($prev = $post->previous())
                <x-button href="{{ route('journal.post', $prev) }}">← Previous</x-button>
            @else
            <x-button disabled>← Previous</x-button>
            @endif
            </div>
            
            <x-button href="#top">Top ^</x-button>
            
            <div class="flex justify-end">
                @if($next = $post->next())
                <x-button href="{{ route('journal.post', $next) }}">Next →</x-button>
                @else
                <x-button disabled>Next →</x-button>
                @endif
            </div>
        </div>
    </x-window>
</main>
