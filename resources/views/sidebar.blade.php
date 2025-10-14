@extends('layouts.app')

@section('body')
<div class="min-h-screen w-screen max-w-sm flex flex-col gap-4 p-2 bg-background-primary">
    <div class="flex flex-col gap-2">
        <p class="text-body-medium font-bold">hey listen!!1!</p>
        <p>
            i made this mostly during nights which means the site might contain a lot of bugs, and it's probably best to view this site in your computer, feel free to send me a message if you encounter any interesting things.
            <br/>
            with love, navi!
        </p>
    </div>
    <div class="flex flex-col gap-4">
        <div class="flex flex-wrap gap-2 justify-center">
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('addicted-to-the-internet.gif') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('i-love-css.gif') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('i-pirate-movies.gif') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('geek-girls-kick-ascii.gif') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('i-think-therefore-i-am.gif') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('lesbian-pride.gif') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('miku-pls-interact.gif') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('nintendo-ds-lover.gif') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('the-last-of-us.gif') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('twilight-sparkle.gif') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('ive-kissed-you-before.webp') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('i-love-girls.webp') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('mitski-cd.webp') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('transfem.gif') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('i-love-pink.webp') }}"/>
            <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('i-glow-pink-in-the-night.webp') }}"/>
        </div>
        <div class="flex flex-wrap gap-2 justify-center">
            <img loading="lazy" src="{{ Vite::button('made-with-css.gif') }}"/>
            <img loading="lazy" src="{{ Vite::button('trans-rights-now.gif') }}"/>
            <img loading="lazy" src="{{ Vite::button('neocities-the-web-is-yours.gif') }}"/>
            <img loading="lazy" src="{{ Vite::button('glados.webp') }}"/>
            <img loading="lazy" src="{{ Vite::button('wii.png') }}"/>
            <img loading="lazy" src="{{ Vite::button('sparkling-eyes.gif') }}"/>
        </div>
    </div>
</div>
@endsection