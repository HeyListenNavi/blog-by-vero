@extends('layouts.app')

@section('body')
<div class="min-h-screen w-screen max-w-sm flex flex-col justify-center gap-4 p-2 bg-background-primary">
    <div class="flex flex-wrap gap-2 justify-center">
        <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('trans-lesbians.gif') }}"/>
        <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('bring-up-my-post.gif') }}"/>
        <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('i-view-source.gif') }}"/>
        <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('mitski.webp') }}"/>
        <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('bubblegum-bitch.gif') }}"/>
        <img class="max-w-38" loading="lazy" src="{{ Vite::blinkie('reflection-of-venus.gif') }}"/>
    </div>
    <div class="flex flex-wrap gap-2 justify-center">
        <img loading="lazy" src="{{ Vite::stamp('nintendo-64-record.gif') }}"/>
        <img loading="lazy" src="{{ Vite::stamp('gameboy.gif') }}"/>
        <img loading="lazy" src="{{ Vite::stamp('404-not-found.gif') }}"/>
    </div>
    <div class="flex flex-wrap gap-2 justify-center">
        <img loading="lazy" src="{{ Vite::button('best-viewed-with-eyes.gif') }}"/>
        <img loading="lazy" src="{{ Vite::button('web-design-passion.gif') }}"/>
        <img loading="lazy" src="{{ Vite::button('ao3-freak.gif') }}"/>
        <img loading="lazy" src="{{ Vite::button('parental-advisory.gif') }}"/>
        <img loading="lazy" src="{{ Vite::button('queer-coded.jpg') }}"/>
        <img loading="lazy" src="{{ Vite::button('virtual-diva.jpg') }}"/>
    </div>
    <img class="max-w-32 mx-auto" loading="lazy" src="{{ Vite::image('feel-free-to-make-out.jpg') }}"/>
</div>
@endsection