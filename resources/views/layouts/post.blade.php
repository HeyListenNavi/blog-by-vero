@extends('layouts.app')

@section('body')
<main class="w-screen bg-background min-h-svh px-4 pt-4 pb-16 flex flex-col gap-4">
    <a
        class="underline cursor-pointer hover:text-highlight-secondary transition-colors"
        href="{{ route('home') }}"
        id="top"
    >
        ← {{$post->date }}
    </a>

    <section class="w-full max-w-2xl self-center flex flex-col gap-2">
        <x-window title="Post {{ $post->date }}" :buttons="['minimize', 'maximize', 'close']">
            <div class="px-8 py-6 flex flex-col gap-4">
                <h1 class="text-display-medium text-4xl break-words">{{ $post->title }}</h1>
                <div class="w-full max-w-full prose dark:prose-invert text-xs text-foreground/80 leading-6">
                    @markdown($post->content)
                </div>
            </div>
        </x-window>
    </section>

    <nav class="w-full max-w-2xl flex justify-between gap-4 fixed bottom-0 left-1/2 -translate-x-1/2 px-8 py-3 bg-background-tertiary font-bold">
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
    </nav>
</main>
@endsection
