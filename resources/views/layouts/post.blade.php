@extends('layouts.app')

@section('body')
    <main class="flex min-h-svh w-screen flex-col gap-4 bg-white px-0 pb-20 pt-4 lg:px-4">
        <div
            class="drop-shadow-black/20 before:drop-shadow-black/20 scale-80 w-fit -rotate-3 font-serif italic drop-shadow-md before:fixed before:-top-2 before:left-0 before:-z-10 before:size-10 before:rounded-sm before:bg-[#97ddff] before:drop-shadow-md before:content-[''] lg:scale-100">
            <div class ="flex justify-between gap-4 rounded-sm bg-[#6bccf9] px-3 py-2">
                <a
                    class="text-indigo-600 transition-colors hover:text-indigo-800 hover:underline"
                    id="top"
                    href="{{ route('home') }}"
                >
                    ← {{ $post->date->format('d / m / Y') }}
                </a>
            </div>
        </div>

        <div
            class="bg-cutting-mat drop-shadow-black/40 3xl:py-32 flex w-full max-w-5xl flex-col items-center self-center rounded-3xl px-6 py-8 drop-shadow-xl lg:rotate-[0.5deg] lg:px-12"
            style="
                background-position: top center, bottom center, center center;
                background-repeat: no-repeat, no-repeat, repeat-y;
                background-size: 100% auto
            "
        >
            <section
                class="paper-bg animate-paper-throw flex max-w-3xl flex-col gap-12 px-6 py-8 opacity-0 shadow-xl shadow-black/40 lg:-rotate-[0.6deg] lg:px-12 lg:py-14"
                style="animation-delay: 400ms"
            >
                <div class="text-background-tertiary flex flex-col gap-2 break-words text-center">
                    <div>
                        <u><i>heylistennavi@proton.me</i></u>
                        <p class="text-body-small">Aperture Science Research Facility</p>
                    </div>
                    <h1 class="text-display-medium text-4xl">{{ $post->title }}</h1>
                </div>

                <header class="text-background-primary grid grid-cols-2 justify-between gap-4">
                    <p>REPORT: <b>#{{ sprintf('%05d', $post->id) }}</b></p>
                    <p>PUBLISHED: <b>{{ $post->created_at }}</b></p>

                    <p>DATE: <b>{{ $post->date->format('l, F j, Y') }}</b></p>
                    <p>ORIGINALLY KNWON AS: <b>[ REDACTED ]</b></p>

                    <p class="col-span-2">SUBJECT: <b><i>[ {{ $post->slug }} ]</i></b></p>
                </header>

                <div class="prose w-full max-w-full text-xs leading-6">
                    {!! 
                        \Filament\Forms\Components\RichEditor\RichContentRenderer::make($post->content)
                            ->customBlocks([
                                \App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\SketchLinkBlock::class,
                            ])
                            ->toHtml() 
                    !!}
                </div>

                <footer class="flex items-center justify-between">
                    <div class="text-background-primary scale-80 lg:scale-100">
                        <p>
                            ALL INFORMATION CONTAINED <br />
                            HERE IS
                            <span class="relative">
                                UNCLASSIFIED
                                <img
                                    class="absolute -top-2.5 left-0 h-8 w-fit opacity-95"
                                    src="{{ Vite::image('marker-line-texture/1.png') }}"
                                />
                            </span>
                        </p>
                        <p>
                            DATE: <b><i><u>{{ $post->date }}</u></i></b>
                        </p>
                        <p>
                            BY:
                            <span class="relative">
                                NAVIHEYLISTEN
                                <img
                                    class="absolute -top-1 left-0 h-6 w-fit opacity-95"
                                    src="{{ Vite::image('marker-line-texture/2.png') }}"
                                />
                            </span>
                        </p>
                    </div>

                    <div class="text-background-primary scale-80 lg:scale-100">
                        <p class="text-center">WRITTEN AND APPROVED BY:</p>
                        <div class="relative">
                            <img
                                class="w-52"
                                src="{{ Vite::image('signature.png') }}"
                            />
                            <img
                                class="absolute left-0 top-3 opacity-95"
                                src="{{ Vite::image('marker-line-texture/3.png') }}"
                            />
                        </div>
                        <span class="my-2 block h-0.5 w-full bg-black"></span>
                        <p class="text-center font-bold">[ REDACTED ]</p>
                    </div>
                </footer>
            </section>
        </div>

        <div
            class="drop-shadow-black/20 before:drop-shadow-black/20 scale-80 fixed bottom-4 left-1/2 w-full max-w-md -translate-x-1/2 font-serif italic drop-shadow-md before:fixed before:-top-2 before:left-0 before:-z-10 before:size-10 before:rounded-sm before:bg-[#ffd485] before:drop-shadow-md before:content-[''] lg:scale-100">
            <nav class="flex justify-between gap-4 rounded-sm bg-[#ffe1a8] px-4 py-3">
                @if ($prev = $post->previous())
                    <a
                        class="text-indigo-600 transition-colors hover:text-indigo-800 hover:underline"
                        href="{{ route('journal.post', $prev) }}"
                    >
                        ← Previous
                    </a>
                @else
                    <span
                        class="text-gray-700"
                        href=""
                    >
                        ← No more
                    </span>
                @endif

                <a
                    class="text-indigo-600 transition-colors hover:text-indigo-800 hover:underline"
                    href="#top"
                >
                    Top ^
                </a>

                @if ($next = $post->next())
                    <a
                        class="text-indigo-600 transition-colors hover:text-indigo-800 hover:underline"
                        href="{{ route('journal.post', $next) }}"
                    >
                        Next →
                    </a>
                @else
                    <span
                        class="text-gray-700"
                        href=""
                    >
                        No more →
                    </span>
                @endif
            </nav>
        </div>
    </main>
@endsection
