@extends('layouts.app')

@section('body')

@pushOnce('scripts')
    <script>
        function crtEmulator() {
            return {
                powerOn: false,
                isBooting: false,
                activeLines: [],
                messages: [
                    'BOOTING...',
                    'CHECKING_RAM... 640KB OK',
                    'LOADING_KERNEL...',
                    'MOUNTING_FILESYSTEM...',
                    'INIT_GRAPHICS_DRIVERS...',
                    'Welcome to Navi@HeyListen'
                ],
                async runBoot() {
                    this.isBooting = true;
                    this.activeLines = [];
                    for (let msg of this.messages) {
                        if (!this.powerOn) break;
                        this.activeLines.push(msg);
                        await new Promise(l => setTimeout(l, 500));
                    }
                    setTimeout(() => { this.isBooting = false; }, 600);
                }
            }
        }
    </script>
@endPushOnce

<main
    x-data="crtEmulator()"
    x-effect="if (powerOn) runBoot();"
    x-bind:class="{ 'is-on': powerOn }"
    class="min-h-svh w-screen bg-background-primary p-8 flex flex-col gap-4"
>
    <a class="underline cursor-pointer hover:text-highlight-secondary transition-colors" href="{{ route('home') }}">← ~/</a>

    <div
        x-show="!powerOn"
        x-transition:enter="transition-opacity duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed bottom-40 right-4 pt-3 text-xs text-center text-highlight-secondary animate-bounce z-50"
    >
        <p>POWER ON HERE</p>
        <p>↓</p>
    </div>
    <div class="fixed bottom-6 right-6 z-50 flex flex-col gap-4 items-center bg-background-secondary p-3 border border-black shadow-lg shadow-black">
        <button
            type="button"
            x-on:click="powerOn = !powerOn"
            class="switch focus:outline-none"
            x-bind:aria-pressed="powerOn"
            aria-label="Toggle Power"
        >
            <div class="button">
                <div class="light"></div>
                <div class="dots"></div>
                <div class="characters"></div>
            </div>
        </button>

        <div class="flex gap-2 items-center">
            <div class="status-indicator"></div>
            <span class="text-xs text-highlight/60">POWER</span>
        </div>
    </div>

    <section class="w-full 4xl:p-8 flex flex-col items-center justify-start gap-8 max-w-8xl mx-auto">
        <header class="w-full flex flex-col justify-between items-start gap-4">
            <div class="flex items-center gap-4 text-highlight text-xs">
                <span class="px-1.5 py-0.5 bg-highlight text-background-primary font-bold">LIVE</span>
                <span class="opacity-40">PORT: 8000</span>
            </div>

             <h1 class="text-3xl 4xl:text-5xl text-foreground font-black tracking-tighter uppercase italic"
                style="text-shadow: 3px 3px 0 color-mix(in srgb, var(--color-highlight), transparent 40%)">
                > {{ $sketch->title }}
            </h1>
        </header>

        <article class="w-full grid grid-cols-1 4xl:grid-cols-[1fr_30%] gap-8">
            <div class="flex flex-col gap-4">
                <x-window title="{{ $sketch->title }}">
                    <div class="crt-container relative group bg-black aspect-video md:aspect-3/2 lg:aspect-16/9 overflow-hidden">
                        <div
                            x-show="isBooting"
                            x-transition:leave="transition ease-in duration-500"
                            class="absolute top-5 left-5 z-30 flex flex-col gap-1 pointer-events-none"
                        >
                            <template x-for="line in activeLines">
                                <div
                                    x-text="line"
                                    class="text-highlight font-mono text-[10px] md:text-xs leading-none"
                                    style="text-shadow: 0 0 5px var(--color-highlight);"
                                ></div>
                            </template>
                        </div>

                        <div class="crt-screen w-full h-full transition-opacity duration-1000" :class="{ 'opacity-0': isBooting, 'opacity-100': !isBooting }">
                            <iframe
                                class="w-full h-full"
                                src="{{ $sketch->url }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                            >
                            </iframe>
                        </div>
                    </div>
                </x-window>

                <div class="flex items-center gap-4">
                    <x-button
                        :href="$sketch->url"
                        target="_blank"
                        class="ml-auto 4xl:ml-0"
                    >
                        [ FULLSCREEN ]
                    </x-button>
                </div>
            </div>

            <aside class="flex flex-col gap-6 pb-28">
                <div class="flex flex-col gap-8 border-2 border-background-tertiary p-4 bg-background-secondary relative">
                    <section class="flex flex-col gap-2 font-mono text-xs">
                        <div>
                            <p class="text-foreground/30"><span class="text-foreground/70">vero@navi:~$</span> <span class="text-foreground">pwd</span></p>
                            <p class="text-foreground/40">/home/vero/projects/sketches</p>
                        </div>

                        <div>
                            <p class="text-foreground/30"><span class="text-foreground/70">vero@navi:~/sketches$</span> <span class="text-foreground">ls</span></p>
                            <p class="text-foreground/40">archive/  <span class="text-highlight">src/</span>  <span class="text-highlight-secondary">{{ Str::slug($sketch->title) }}/</span>  README.md</p>
                        </div>

                        <p class="text-foreground/30"><span class="text-foreground/70">vero@navi:~/sketches$</span> <span class="text-foreground">cd {{ Str::slug($sketch->title) }}</span></p>

                        <p class="text-foreground/30"><span class="text-foreground/70">vero@navi:~/sketches/{{ Str::slug($sketch->title) }}$</span> <span class="text-highlight font-bold tracking-widest">php artisan serve</span></p>
                    </section>

                    <section class="flex flex-col gap-1">
                        <div class="flex items-center gap-2">
                            <span class="text-highlight-secondary text-xs">●</span>
                            <h3 class="text-xs font-bold tracking-widest text-highlight">cat README.md</h3>
                        </div>
                        <div class="text-xs text-foreground/70 leading-relaxed border-l-2 border-highlight/20 pl-4 py-1">
                            @if($sketch->description)
                                {{ $sketch->description }}
                            @else
                                <span class="italic opacity-30">NO_DATA_STREAM_AVAILABLE</span>
                            @endif
                        </div>
                    </section>

                    <footer class="flex justify-center">
                        <a class="text-xs text-center text-foreground/20 hover:text-highlight-secondary hover:underline transition-all" href="https://p5js.org/" target="_blank">core: p5.js</a>
                    </footer>
                </div>
            </aside>
        </article>
    </section>
</main>

<style>
    :root {
        --ease-out-quint: cubic-bezier(0.230, 1.000, 0.320, 1.000);
        --ease-in-quint: cubic-bezier(0.755, 0.050, 0.855, 0.060);
        --screen-background: #121010;
        --switch-color: var(--color-highlight);
        --switch-width: 50px;
        --switch-height: 70px;
        --pivot-distance: 8px;
        --rotation: 30deg;
    }

    .status-indicator {
        width: 6px;
        height: 6px;
        background: #300;
        border-radius: 1px;
        transition: background-color 0.3s;
    }

    /* Power led indicator, when switch is checked change the background color */
    .is-on .status-indicator {
        background: var(--color-highlight);
        box-shadow: 0 0 8px var(--color-highlight);
    }

    /* 3D Switch Logic */
    .switch {
        background-color: #000;
        width: var(--switch-width);
        height: var(--switch-height);
        box-shadow:
            0 0 0 2px #000,
            inset 0 0 2px 6px #1a1a1a,
            inset 0 0 2px 10px #000;
        perspective: 500px;
        cursor: pointer;
        display: block;
        border: none;
        padding: 0;
    }

    .switch .button {
        transition: all 0.3s var(--ease-out-quint);
        transform-origin: center center calc(-1 * var(--pivot-distance));
        transform: translateZ(var(--pivot-distance)) rotateX(calc(-1 * var(--rotation)));
        transform-style: preserve-3d;
        width: 100%;
        height: 100%;
        position: relative;
        background: linear-gradient(#2a0f0f 0%, #1a0a0a 30%, #1a0a0a 70%, #2a0f0f 100%);
    }

    .is-on .switch .button {
        transform: translateZ(var(--pivot-distance)) rotateX(var(--rotation));
        background: linear-gradient(#4a1a1a 0%, #3a1515 30%, #3a1515 70%, #4a1a1a 100%);
    }

    .switch .button::before {
        content: "";
        background: linear-gradient(rgba(255, 255, 255, 0.15) 10%, transparent 30%, #000 90%);
        width: 100%;
        height: 15px;
        transform-origin: top;
        transform: rotateX(-90deg);
        position: absolute;
        top: 0;
        left: 0;
    }

    .switch .button::after {
        content: "";
        background: #000;
        width: 100%;
        height: 15px;
        transform-origin: top;
        transform: translateY(15px) rotateX(-90deg);
        position: absolute;
        bottom: 0;
        box-shadow: 0 15px 10px rgba(0, 0, 0, 0.8);
        left: 0;
    }

    .switch .light {
        opacity: 0;
        position: absolute;
        width: 100%;
        height: 100%;
        background-image: radial-gradient(circle, #fff 0%, var(--switch-color) 40%, transparent 70%);
        transition: opacity 0.3s;
    }

    .is-on .switch .light {
        opacity: 0.6;
        animation: flicker-switch 0.2s infinite 0.3s;
    }

    .switch .dots {
        position: absolute;
        width: 100%;
        height: 100%;
        background-image: radial-gradient(transparent 30%, rgba(0, 0, 0, 0.4) 70%);
        background-size: 4px 4px;
    }

    .switch .characters {
        position: absolute;
        width: 100%;
        height: 100%;
        background:
            linear-gradient(#fff, #fff) 50% 20% / 3px 10px,
            radial-gradient(circle, transparent 50%, #fff 52%, #fff 70%, transparent 72%) 50% 80% / 14px 14px;
        background-repeat: no-repeat;
        opacity: 0.4;
    }

    .is-on .switch .characters {
        opacity: 0.9;
    }

    /* CRT Effects Targeting */
    .crt-screen {
        animation: turn-off 0.55s var(--ease-out-quint);
        animation-fill-mode: forwards;
        pointer-events: none;
        /* Disable when off */
    }

    .is-on .crt-screen {
        animation: turn-on 5s linear;
        animation-fill-mode: forwards;
        pointer-events: auto;
        /* Enable when on */
    }

    .is-on .crt-container::after {
        animation: flicker 0.15s infinite;
    }

    @keyframes flicker-switch {
        0% {
            opacity: 0.6
        }

        80% {
            opacity: 0.4
        }

        100% {
            opacity: 0.6
        }
    }

    /* Keep existing CRT animations below */
    @keyframes flicker {
        0% {
            opacity: 0.17611;
        }

        5% {
            opacity: 0.23944;
        }

        10% {
            opacity: 0.24231;
        }

        15% {
            opacity: 0.24654;
        }

        20% {
            opacity: 0.41245;
        }

        25% {
            opacity: 0.00713;
        }

        30% {
            opacity: 0.30412;
        }

        35% {
            opacity: 0.00405;
        }

        40% {
            opacity: 0.19123;
        }

        45% {
            opacity: 0.28789;
        }

        50% {
            opacity: 0.27312;
        }

        55% {
            opacity: 0.28823;
        }

        60% {
            opacity: 0.15765;
        }

        65% {
            opacity: 0.00473;
        }

        70% {
            opacity: 0.22345;
        }

        75% {
            opacity: 0.01158;
        }

        80% {
            opacity: 0.43412;
        }

        85% {
            opacity: 0.14523;
        }

        90% {
            opacity: 0.15381;
        }

        95% {
            opacity: 0.00905;
        }

        100% {
            opacity: 0.23589;
        }
    }

    @keyframes turn-on {
        0% {
            transform: scale(1, 0.8) translate3d(0, 0, 0);
            filter: brightness(30);
            opacity: 1;
        }

        3.5% {
            transform: scale(1, 0.8) translate3d(0, 100%, 0);
        }

        3.6% {
            transform: scale(1, 0.8) translate3d(0, -100%, 0);
            opacity: 1;
        }

        9% {
            transform: scale(1.3, 0.6) translate3d(0, 100%, 0);
            filter: brightness(30);
            opacity: 0;
        }

        11% {
            transform: scale(1, 1) translate3d(0, 0, 0);
            filter: contrast(0) brightness(0);
            opacity: 0;
        }

        100% {
            transform: scale(1, 1) translate3d(0, 0, 0);
            filter: contrast(1) brightness(1.5) saturate(1.1);
            opacity: 1;
        }
    }

    @keyframes turn-off {
        0% {
            transform: scale(1, 1.3) translate3d(0, 0, 0);
            filter: brightness(1);
            opacity: 1;
        }

        60% {
            transform: scale(1.3, 0.001) translate3d(0, 0, 0);
            filter: brightness(10);
        }

        100% {
            transform: scale(0.000, 0.0001) translate3d(0, 0, 0);
            filter: brightness(50);
            animation-timing-function: var(--ease-in-quint);
        }
    }

    .crt-container::before {
        content: " ";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.1) 50%),
            linear-gradient(90deg, rgba(255, 0, 0, 0.03), rgba(0, 255, 0, 0.01), rgba(0, 0, 255, 0.03));
        z-index: 20;
        background-size: 100% 2px, 3px 100%;
        pointer-events: none;
    }

    .crt-container::after {
        content: " ";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background: rgba(18, 16, 16, 0.05);
        opacity: 0;
        z-index: 20;
        pointer-events: none;
    }
</style>
@endsection
