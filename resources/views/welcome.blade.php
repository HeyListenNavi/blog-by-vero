@extends('layouts.app')

@section('body')
    <div class="bg-background-primary flex min-h-screen w-screen max-w-4xl flex-col gap-4 p-2">
        <div class="flex flex-col gap-4 lg:grid lg:grid-cols-12 lg:items-center">
            <x-window title="i love amy" class="col-span-4">
                <img loading="lazy" src="{{ Vite::image('amy-icon.webp') }}" />
            </x-window>
            <div class="col-span-8">
                <h1 class="text-body-medium font-bold">this is home</h1>
                <p>
                    → You've met with a terrible fate, haven't you?
                    <br />
                    <br />
                    Welcome to my blog! my name is Verónica, i'm currently a computer science student who wants to
                    learn way too many things and has way too many "to do projects", i'm a woman who loves to make
                    things her own, either by making them herself or customizing them, i often feel like it's a
                    weird way of self-expression i've developed.
                </p>
                <p>
                    i love musicals, particle physics, math, programming, electronics, videogames, and much more
                    stuff you can read about in my "about me" page :3
                </p>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <h2 class="text-body-medium font-bold">about the site</h2>
            <div class="flex flex-col gap-4 lg:grid lg:grid-cols-2 lg:items-center">
                <x-window title="old home">
                    <video controls=true>
                        <source src="{{ Vite::image('home-video.mp4') }}" type="video/mp4" />
                    </video>
                </x-window>
                <p>
                    i really enjoy browsing sites in neocities, so when i saw people were making their own websites
                    for fun, i got inspired by a few different sites that i found and decided to make my own after
                    instagram didn't let me upload a couple photos i had taken (ctm instagram 🖕) and so this
                    website was made as a way to store thoughts, writings, pictures, and other stuff that i'd
                    usually upload to social media.
                </p>
            </div>
            <p>i was specially inspired by sites like oklama and lunospace, i think this blog works as an artistic outlet
                for myself, a space where i can share stuff i feel, do, see, and so much more</p>
            <p>
                i made the website unnecessarily complicated so i could not only have fun making it, but also
                learn to get more comfortable using the Rust programming language.
            </p>
            <p>
                i love Rust, it's been the main programming language i use and i just wanted to implement it
                into this project too, so when i found that you could use WebAssembly to create websites and
                much more, i just had to use it, in order to make this a bit easier, i used the Yew framework to
                make the frontend.
            </p>
            <p>
                as for the backend, i decided to make a simple server that would store various assets and the
                posts of my journal in Markdown and turn them into HTML when requested, although i'm planning to
                add much more things to it. this was done using the Actix Web framework, again... in Rust.
            </p>
            <h3 class="font-bold">My love for Laravel</h3>
            <p>
                So yeah, the website was originally made with Rust, but a lot has changed since then, i was able to learn a
                bunch of stuff, see all the mistakes i had done with the site, and i met a bunch of people, and someone
                introduced me to Laravel, one of the most lovely frameworks i think i'll ever meet, as you can imagine, i
                migrated everything to Laravel, it's just so much easier to work with it, it allows me to focus on the
                important stuff i want to get done, and not have to worry about re-inventing the wheel. I was able to create
                a proper backend and an admin panel thanks to FilamentPhp (WHICH BTW just realesed it's 4.0 Stable Version),
                so yeah, as a personal opinion, although experimenting with Yew and ActixWeb was fun, it was definitively
                NOT the right tool for the job, that's why i decided to migrate to a more traditional approach.
            </p>
        </div>

        <div class="flex flex-col gap-4 lg:grid lg:grid-cols-12 lg:items-center">
            <img class="col-span-4" loading="lazy" src="{{ Vite::image('reflection-of-venus.png') }}" />
            <div class="col-span-8 flex flex-col gap-2">
                <h2 class="text-body-medium font-bold">i'm a reflection of venus</h2>
                <div class="flex flex-col">
                    <span class="font-bold">"The Barbie dolls played off reflection of Venus."</span>
                    <span class="self-end">- Kendrick Lamar Duckworth</span>
                </div>
            </div>
        </div>

        <div class="ga-2 flex flex-col">
            <h2 class="text-body-medium font-bold">BUILD YOUR OWN SITEEE"</h2>
            <p>
                overall, it was a pretty interesting experience, and i believe i learned a lot from this, i think
                everyone should try to make their own website if they have time, specially if you're a fan of the
                indie web, profile customization, and things like that
            </p>
        </div>

        <div class="flex flex-col gap-4 lg:grid lg:grid-cols-2 lg:items-center">
            <x-window title="∑ i am">
                <img loading="lazy" src="{{ Vite::image('code-eye.jpeg') }}" />
            </x-window>
            <div class="flex flex-col gap-2">
                <h2 class="text-body-medium font-bold">my integral self</h2>
                <ul>
                    <li class="before:text-highlight flex gap-1 before:block before:content-['→']">
                        <span>name: Verónica, Vero, Veru, Navi</span>
                    </li>
                    <li class="before:text-highlight flex gap-1 before:block before:content-['→']">
                        <span>sign: capricorn !!</span>
                    </li>
                    <li class="before:text-highlight flex gap-1 before:block before:content-['→']">
                        <span>mbti: infp</span>
                    </li>
                    <li class="before:text-highlight flex gap-1 before:block before:content-['→']">
                        <span>
                            age:
                            {{ \Carbon\Carbon::parse('2005-01-18')->diffForHumans(now(), [
                                'parts' => 3,
                                'join' => true,
                                'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE,
                            ]) }}
                        </span>
                    </li>

                    <li class="before:text-highlight flex gap-1 before:block before:content-['→']">
                        <span>birthday: late january </span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex flex-col gap-1">
            <p class="font-bold">"No convierto la sangre en vino pero me lo sé beber, no creo en lo divino pero sí en la
                mujer."</p>
            <p class="self-end">- Laura Arroyo Gárate</p>
        </div>

        <div class="flex flex-col gap-2">
            <h2 class="text-body-medium font-bold">visit these too :D</h2>
            <div class="flex flex-col gap-2">
                <p>
                    a list of buttons from various sites i find interesting and also inspired me to make this
                    website, and if you liked my website feel free to use my button!
                </p>
                <div class="flex max-w-md flex-wrap gap-1 self-center">
                    <a class="max-w-22" href="https://hillhouse.neocities.org">
                        <img loading="lazy" src="{{ Vite::button('hillhouse.png') }}" />
                    </a>
                    <a class="max-w-22" href="https://errormine.net/">
                        <img loading="lazy" src="{{ Vite::button('errormine.gif') }}" />
                    </a>
                    <a class="max-w-22" href="https://thegardenofmadeline.neocities.org/pages/foreverandalways">
                        <img loading="lazy" src="{{ Vite::button('garden-of-madeline.gif') }}" />
                    </a>
                    <a class="max-w-22" href="https://ilovebeingtrans.neocities.org/">
                        <img loading="lazy" src="{{ Vite::button('i-love-being-trans.png') }}" />
                    </a>
                    <a class="max-w-22" href="https://32bit.cafe/">
                        <img loading="lazy" src="{{ Vite::button('32-bits-pcb.png') }}" />
                    </a>
                    <a class="max-w-22" href="https://cabbagesorter.neocities.org/">
                        <img loading="lazy" src="{{ Vite::button('cabbage-sorter.gif') }}" />
                    </a>
                    <a class="max-w-22" href="https://cloverbell.neocities.org/">
                        <img loading="lazy" src="{{ Vite::button('cloverbell.gif') }}" />
                    </a>
                    <a class="max-w-22" href="https://lostlove.neocities.org/">
                        <img loading="lazy" src="{{ Vite::button('lunospace.gif') }}" />
                    </a>
                    <a class="max-w-22" href="https://oklama.com/">
                        <img loading="lazy" src="{{ Vite::button('nu-thoughts.jpg') }}" />
                    </a>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <p class="text-xs">
                    to use my button in your own website you can use this code and remember to download the button
                    and upload it to your own website!!
                </p>
                <div class="flex flex-col lg:grid lg:grid-cols-12">
                    <div class="border-foreground col-span-8 border-[1px] p-2">
                        <p class="wrap-break-word font-mono">
                            {{ '<a href="https://heylistennavi.neocities.org">' }}
                            <br>
                            <br>
                            {{ '<img loading="lazy" src="IMAGE_PATH" width="88" height="31" alt="vero\'s site button" style="image-rendering:pixelated"/>' }}
                            <br>
                            <br>
                            {{ '</a>' }}
                        </p>
                    </div>
                    <div class="border-foreground col-span-4 flex items-center justify-center border-[1px] p-2">
                        <a class="max-w-32" href="https://heylistennavi.neocities.org/">
                            <img loading="lazy" src="{{ Vite::button('veros-site.gif') }}" />
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center gap-2 text-center">
            <p>
                this blog was oficially brought with the help of our sponsor
                <br />
                <br />
                *drumroll*
            </p>
            <a class="text-body-small font-bold underline" href="https://www.instagram.com/snow_rise1">GABYYY</a>
            <p>
                thank you so much gaby for always being there as the good friend you are and for your five bucks
            </p>
        </div>
    </div>
@endsection
