@extends('layouts.app')

@section('body')
<div class="min-h-screen w-screen max-w-4xl flex flex-col gap-4 p-2 bg-background-primary">
    <div class="flex flex-col lg:grid lg:grid-cols-12 lg:items-center gap-4">
        <x-window title="woah" class="col-span-4">
            <img loading="lazy" src="{{ Vite::image('trans-bunny.jpg') }}" alt="bunny with a trans flag icon" />
        </x-window>
        <div class="col-span-8 flex flex-col gap-2">
            <h1 class="text-body-medium font-bold">About me !!1!</h1>
            <p>
                holiii, my name's Verónica, i'm a self-made woman (a.k.a. trans), and i study computer science. i'd say i'm a bit of an awkward person (maybe a lot), i don't tend to share much, and social interactions have always been my Achilles heel, but i do love writing stuff, either about how i feel, what i've done, opinions i have, interests, or anything fhjsaf.
            </p>
        </div>
    </div>

    <div class="flex flex-col gap-2">
        <h2 class="text-body-medium font-bold">things i love</h2>
        <ul class="pl-4 p-2 flex flex-col gap-4">
            <li class="before:block before:content-['→'] before:text-xl before:text-highlight flex gap-1">
                <div>
                    <h3 class="text-body-small">Coding</h3>
                    <p>
                        coding, it's been the hobby i've held for the longest, i fell in love with it when i was like fourteen. initially i wanted to make my own videogame so i decided to start learning c# on my own through youtube videos, it started simple with simple programming concepts in a console app, eventually it evolved into learning the objects oriented paradigm and actual desktop apps using windows forms and wpf later, at this point i had dropped any intent of making a video game and just wanted to learn more about this, i went to learn web development, and now i'm kind of in a "a little bit of everything" stage, i decided to properly learn rust, and it's just amazing, i love the language and i'm just experimenting to see what else i can do with it, i'm really excited to see what other things i can do with the language and just expand my knowledge about computer science in general.
                    </p>
                </div>
            </li>
            <li class="before:block before:content-['→'] before:text-xl before:text-highlight flex gap-1">
                <div>
                    <h3 class="text-body-small">Cats</h3>
                    <p>
                        cats, i love cats, i think it's a bit ironic because i'm actually allergic to cats, but that won't stop me from absolutely fucking loving cats lmfao, i currently have a cat, don't ask me what breed she is because i have no idea, but she's mostly white with gray and orange spots. i think we are both very similar, she sleeps a lot, usually either in my bed or a chair i have in my room; she loves to be petted and rub herself on people, yet she's usually afraid of people; she has this habit of jumping into the border of my window and just staying there, staring at what's happening outside; some say she's grumpy, i believe quite the opposite - they just haven't met her enough.
                    </p>
                </div>
            </li>
            <li class="before:block before:content-['→'] before:text-xl before:text-highlight flex gap-1">
                <div>
                    <h3 class="text-body-small">Photography</h3>
                    <p>
                        photography. i've been really into photography since like a year ago, although i've tried to keep it as a casual hobby because as soon as i start to take it seriously i think it'll lose the peaceful feeling it gives me, i mostly like to take pictures of objects that somehow managed to metaphorically mean an event that happened in my life or parts of a landscape to remember somewhere.
                    </p>
                </div>
            </li>
            <li class="before:block before:content-['→'] before:text-xl before:text-highlight flex gap-1">
                <div>
                    <h3 class="text-body-small">Videogames</h3>
                    <p>
                        videogames, i've played videogames since i was a child, i'm absolutely in love with story-driven videogames, i think the interaction they can give you allows for some fascinating stories to be told in a way that you connect with the story way more than you would with other mediums, the current console i usually play with is a ps4, but before that i've played in a nintendo ds, nintendo wii, ps vita, the original xbox, xbox 360, and all the emulators that my old laptop is able to handle, lately i've been wanting to go back to emulation and try some old games i'm interested in, so i will probably see if i can install some in my laptop.
                    </p>
                </div>
            </li>
            <li class="before:block before:content-['→'] before:text-xl before:text-highlight flex gap-1">
                <div>
                    <h3 class="text-body-small">Physics and Math</h3>
                    <p>
                        physics and math, i've had a love for math since i was introduced to it, and the amazing synergy that it has with physics, being able to describe a phenomenon using a mathematical model totally blows up my mind, fields like quantum mechanics totally fascinate me. in the future, i'd love to study a career in physics and work in a field that somehow mixes both physics and computer science together, something like quantum computing (another one of my interests).
                    </p>
                </div>
            </li>
            <li class="before:block before:content-['→'] before:text-xl before:text-highlight flex gap-1">
                <div>
                    <h3 class="text-body-small">Musicals</h3>
                    <p>
                        musicals, i absolutely love musicals, Hamilton, SIX, Dear Evan Hansen, Hazbin Hotel, Tick Tick Boom, Heathers, i just love them all, and there's just so many i haven't watched, i think it's amazing to be able to tell a story through music. the first musical i listened to and enjoyed was Hamilton, and oh my god, it made me go through so many emotions by just listening to music, it's so mesmerizing to be able to connect emotionally with a character whose story i've only heard in a music song, i just absolutely love musicals, and one of my dreams is being able to watch a musical in a theater.
                    </p>
                </div>
            </li>
        </ul>
    </div>

    <div class="flex flex-col lg:grid lg:grid-cols-2 lg:items-center gap-4">
        <x-window title="mitsuki">
            <img loading="lazy" src="{{ Vite::image('mitsuki-icon.jpeg') }}" alt="mitsuki icon" />
        </x-window>
        <div class="flex flex-col gap-2">
            <h2 class="text-body-medium font-bold">dreamer</h2>
            <ul>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <span>prefered nickname: Vero or Navi</span>
                </li>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <span>transfem lesbian!!</span>
                </li>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <div class="inline-block h-12 aspect-[3/2] leading-[1] rounded-[10px] align-middle border-2 border-foreground shadow-[inset_0_0_1px_#fff,0_1px_2px_#0004] bg-[linear-gradient(to_bottom,#c64425_0%_20%,#d38534_20%_40%,#e9d0b6_40%_60%,#d96596_60%_80%,#9e344e_80%_100%)]">
                    </div>
                    <div class="inline-block h-12 aspect-[3/2] leading-[1] rounded-[10px] align-middle border-2 border-foreground shadow-[inset_0_0_1px_#fff,0_1px_2px_#0004] bg-[linear-gradient(to_bottom,#7996d0_0%_14.3%,#d7a1b9_14.3%_28.6%,#d986ae_28.6%_42.9%,#d06897_42.9%_57.1%,#d986ae_57.1%_71.4%,#d7a1b9_71.4%_85.7%,#7996d0_85.7%_100%)]">
                    </div>
                </li>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <span>spanish and english speaker</span>
                </li>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <span>favorite color: <span class="bg-highlight text-background-primary">#EABBB9</span></span>
                </li>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <span>favorite season: winter</span>
                </li>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <span>usual pastimes: coding, gaming, reading, photography, sleeping</span>
                </li>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <span>i love the animatics series called <a
                            href="https://littlepickletown.weebly.com/">Little
                            Pickle Town</a></span>
                </li>
            </ul>
        </div>
    </div>

    <div class="flex flex-col gap-2">
        <h2 class="text-body-medium font-bold">favorite things</h2>
        <div class="flex flex-col gap-4">
            <div x-data="{
                    films: [
                        { title: 'I Saw the TV Glow', director: 'Jane Schoenbrun', year: 2024, poster: 'i-saw-the-tv-glow-poster.jpg' },
                        { title: 'Civil War', director: 'Alex Garland', year: 2024, poster: 'civil-war-poster.jpg' },
                        { title: 'Everything Everywhere All at Once', director: 'Daniel Kwan and Daniel Scheinert', year: 2022, poster: 'everything-everywhere-all-at-once-poster.jpg' },
                        { title: 'Lady Bird', director: 'Greta Gerwig', year: 2017, poster: 'lady-bird-poster.jpg' },
                        { title: 'Bottoms', director: 'Emma Seligman', year: 2023, poster: 'bottoms-poster.jpg' },
                        { title: 'Nimona', director: 'Nick Bruno and Troy Quane', year: 2023, poster: 'nimona-poster.jpg' },
                        { title: 'A Silent Voice', director: 'Taichi Ishidate and Naoko Yamada', year: 2016, poster: 'a-silent-voice-poster.jpg' },
                        { title: 'Suzume', director: 'Makoto Shinkai', year: 2022, poster: 'suzume-poster.jpg' },
                        { title: 'The Batman', director: 'Matt Reeves', year: 2022, poster: 'the-batman-poster.jpg' },
                        { title: 'Spider-Man: Across the Spider-Verse', director: 'Joaquim Dos Santos, Kemp Powers and Justin K. Thompson', year: 2023, poster: 'spiderman-across-the-spiderverse-poster.jpg' },
                        { title: 'Portrait of a Lady on Fire', director: 'Céline Sciamma', year: 2019, poster: 'portrait-of-a-lady-on-fire-poster.jpg' },
                        { title: 'All the Bright Places', director: 'Brett Haley', year: 2020, poster: 'all-the-bright-places-poster.jpg' },
                        { title: 'The Perks of Being a Wallflower', director: 'Stephen Chbosky', year: 2012, poster: 'the-perks-of-being-a-wallflower-poster.jpg' },
                        { title: 'Una película de policías', director: 'Alonso Ruizpalacios', year: 2021, poster: 'una-pelicula-de-policias-poster.jpg' },
                        { title: 'Temporada de patos', director: 'Fernando Eimbcke', year: 2004, poster: 'temporada-de-patos-poster.jpg' },
                        { title: 'Cosas Imposibles', director: 'Ernesto Contreras', year: 2021, poster: 'cosas-imposibles-poster.jpg' }
                    ]
                }"
            >
                <x-window title="films">
                    <div class="flex gap-4 mx-4 py-2 overflow-x-auto">
                        <template x-for="film in films" :key="film.poster">
                            <div class="flex flex-col gap-1">
                                <img class="w-48 max-w-none" loading="lazy" :src="`/images/posters/${film.poster}`" :alt="`${film.title} (${film.year}) poster`" />
                                <p class="text-xs" x-text="`${film.title} (${film.director}. ${film.year})`"></p>
                            </div>
                        </template>
                    </div>
                </x-window>
            </div>

            <div x-data="{
                series: [
                    { title: 'Arcane', creators: 'Christian Linke and Alex Yee', poster: 'arcane-poster.jpg' },
                    { title: 'Better Call Saul', creators: 'Vince Gilligan and Peter Gould', poster: 'better-call-saul-poster.jpg' },
                    { title: 'Fleabag', creators: 'Phoebe Waller-Bridge', poster: 'fleabag-poster.jpg' },
                    { title: 'Wonder Egg Priority', creators: 'Shinji Nojima', poster: 'wonder-egg-priority-poster.jpg' },
                    { title: 'Inside Job', creators: 'Shion Takeuchi and Alex Hirsch', poster: 'inside-job-poster.jpg' },
                    { title: 'Moral Orel', creators: 'Dino Stamatopoulos', poster: 'moral-orel-poster.jpg' },
                    { title: 'Violet Evergarden', creators: 'Kana Akatsuki', poster: 'violet-evergarden-poster.jpg' },
                    { title: 'Blue Eye Samurai', creators: 'Michael Green and Amber Noizumi', poster: 'blue-eye-samurai-poster.jpg' },
                    { title: 'Looking for Alaska', creators: 'Josh Schwartz', poster: 'looking-for-alaska-poster.jpg' },
                    { title: 'Desenfrenadas', creators: 'Diego Martínez Ulanosky', poster: 'desenfrenadas-poster.jpg' },
                    { title: 'Baby Reindeer', creators: '', poster: 'baby-reindeer-poster.jpg' },
                    { title: 'The Owl House', creators: 'Dana Terrace', poster: 'the-owl-house-poster.jpg' },
                    { title: 'Star vs The Forces of Evil', creators: 'Daron Nefcy, Dave Wasson and Jordana Arkin', poster: 'star-vs-the-forces-of-evil-poster.jpg' },
                    { title: 'Helluva Boss', creators: 'Vivienne Medrano', poster: 'helluva-boss-poster.jpg' },
                    { title: 'Hazbin Hotel', creators: 'Vivienne Medrano', poster: 'hazbin-hotel-poster.jpg' },
                    { title: 'The Boys', creators: 'Eric Kripke', poster: 'the-boys-poster.jpg' },
                    { title: 'Bee and PuppyCat', creators: 'Natasha Allegri', poster: 'bee-and-puppycat-poster.jpg' },
                    { title: 'Fallout', creators: 'Geneva Robertson-Dworet and Graham Wagner', poster: 'fallout-poster.jpg' },
                    { title: 'The Last of Us', creators: 'Neil Druckmann and Craig Mazin', poster: 'the-last-of-us-poster.jpg' }
                ]
            }">
                <x-window title="series">
                    <div class="flex gap-4 mx-4 py-2 overflow-x-auto">
                        <template x-for="s in series" :key="s.poster">
                            <div class="flex flex-col gap-1">
                                <img class="w-48 max-w-none" loading="lazy" :src="`/images/posters/${s.poster}`" :alt="`${s.title} poster`">
                                <p class="text-xs" x-text="`${s.title} (${s.creators})`"></p>
                            </div>
                        </template>
                    </div>
                </x-window>
            </div>

            <div x-data="{
                games: [
                    { title: 'The Last of Us', poster: 'the-last-of-us-game-poster.jpg' },
                    { title: 'The Last of Us: Part II', poster: 'the-last-of-us-part-two-game-poster.jpg' },
                    { title: 'Red Dead Redemption 2', poster: 'red-dead-redemtion-two-poster.jpg' },
                    { title: 'Portal', poster: 'portal-poster.jpg' },
                    { title: 'Portal 2', poster: 'portal-two-poster.jpg' },
                    { title: 'Resident Evil 2 Remake', poster: 'resident-evil-2-poster.jpg' },
                    { title: 'Resident Evil 4', poster: 'resident-evil-4-poster.jpg' },
                    { title: 'Resident Evil 6', poster: 'resident-evil-6-poster.jpg' },
                    { title: 'Resident Evil 7: Biohazard', poster: 'resident-evil-7-poster.jpg' },
                    { title: 'Resident Evil 8: Village', poster: 'resident-evil-8-poster.jpg' },
                    { title: 'Celeste', poster: 'celeste-poster.jpg' },
                    { title: 'Metroid Prime Trilogy', poster: 'metroid-prime-trilogy-poster.jpg' },
                    { title: 'Metroid: Other M', poster: 'metroid-other-m-poster.jpg' },
                    { title: 'The Legend of Zelda: Ocarina of Time', poster: 'the-legend-of-zelda-oot-poster.jpg' },
                    { title: 'The Legend of Zelda: Wind Waker', poster: 'the-legend-of-zelda-ww-poster.jpg' },
                    { title: 'The Legend of Zelda: Breath of the Wild', poster: 'the-legend-of-zelda-botw-poster.jpg' },
                    { title: 'Donkey Kong 64', poster: 'donkey-kong-64-poster.jpg' },
                    { title: 'Donkey Kong: Country Returns', poster: 'donkey-kong-country-returns-poster.jpg' },
                    { title: 'Minecraft', poster: 'minecraft-poster.jpg' }
                ]
            }">
                <x-window title="videogames :3">
                    <div class="flex gap-4 mx-4 py-2 overflow-x-auto">
                        <template x-for="g in games" :key="g.poster">
                            <div class="flex flex-col gap-1">
                                <img class="w-48 max-w-none" loading="lazy" :src="`/images/posters/${g.poster}`" :alt="`${g.title} poster`">
                                <p class="text-xs" x-text="g.title"></p>
                            </div>
                        </template>
                    </div>
                </x-window>
            </div>

            <div x-data="{
                music: [
                    { title: 'Be the Cowboy', artist: 'Mitski', type: 'album', cover: 'be-the-cowboy.jpg' },
                    { title: 'Bury Me at Makeout Creek', artist: 'Mitski', type: 'album', cover: 'bury-me-at-makeout-creek.jpg' },
                    { title: 'DAMN.', artist: 'Kendrick Lamar', type: 'album', cover: 'damn.jpg' },
                    { title: 'Mr. Morale & The Big Steppers', artist: 'Kendrick Lamar', type: 'album', cover: 'mr-morale-and-the-big-steppers.jpg' },
                    { title: 'HIT ME HARD AND SOFT', artist: 'Billie Eilish', type: 'album', cover: 'hit-me-hard-and-soft.jpg' },
                    { title: 'Sour', artist: 'Olivia Rodrigo', type: 'album', cover: 'sour.jpg' },
                    { title: 'Guts', artist: 'Olivia Rodrigo', type: 'album', cover: 'guts.jpg' },
                    { title: 'Delusión', artist: 'Bratty', type: 'album', cover: 'delusion.jpg' },
                    { title: 'tdbn', artist: 'Bratty', type: 'album', cover: 'tdbn.jpg' },
                    { title: 'Otros Colores', artist: 'Bratty y Daniel Quién', type: 'single', cover: 'otros-colores.jpg' },
                    { title: 'Sobredósis de Tempra', artist: 'Bratty', type: 'single', cover: 'sobredosis-de-tempra.jpg' },
                    { title: ':3', artist: 'Axolotes Mexicanos', type: 'album', cover: 'axolotes-mexicanos.jpg' },
                    { title: 'Porfiado', artist: 'Cuarteto de Nos', type: 'album', cover: 'porfiado.jpg' },
                    { title: 'Dealer', artist: 'Lana del Rey', type: 'song', cover: 'blue-banisters.jpg' },
                    { title: 'I Don\'t Wanna Be Funny Anymore', artist: 'Lucy Dacus', type: 'song', cover: 'no-burden.jpg' },
                    { title: 'Brando', artist: 'Lucy Dacus', type: 'song', cover: 'home-video.jpg' },
                    { title: 'Night Shift', artist: 'Lucy Dacus', type: 'song', cover: 'historian.jpg' },
                    { title: 'Dreamer', artist: 'Laufey', type: 'song', cover: 'bewitched.jpg' },
                    { title: 'Lumbreras', artist: 'AQUILES', type: 'single', cover: 'lumbreras.jpg' },
                    { title: 'Labour', artist: 'Paris Paloma', type: 'single', cover: 'labour.jpg' },
                    { title: '1940 Carmen', artist: 'Mon Laferte', type: 'album', cover: '1940-carmen.jpg' },
                    { title: 'Cabras', artist: 'Little Jesus y Jimena Gonzáles', type: 'single', cover: 'cabras.jpg' },
                    { title: 'Freshman Year', artist: 'Hop Along, Queen Ansleis', type: 'album', cover: 'freshman-year.jpg' },
                    { title: 'Dear God', artist: 'XTC', type: 'song', cover: 'dear-god.jpg' },
                    { title: 'Fin de Semana', artist: 'Sam Vazquez', type: 'cover', cover: 'fin-de-semana.jpg' },
                    { title: '¿Cuántas Cosas Podrían Sucederme El Día De Hoy?', artist: 'NXNNI, Sam Vazquez y Alehtse Vargas', type: 'single', cover: 'ccpseddh.jpg' },
                    { title: 'Don\'t Delete the Kisses', artist: 'Wolf Alice', type: 'song', cover: 'visions-of-a-life.jpg' },
                    { title: 'Abril', artist: 'Cala Vento', type: 'song', cover: 'cala-vento.jpg' }
                ]
            }">
                <x-window title="m u s i c" class="music--list">
                    <div class="flex gap-4 mx-4 py-8 overflow-x-auto pr-[130px]">
                        <template x-for="m in music" :key="m.cover">
                            <div class="relative z-10">
                                <img class="peer w-48 max-w-none hover:translate-y-[-10px] hover:shadow-[0_0_8px_5px_black] hover:mr-[130px] transition-[shadow_transform_margin-right] duration-300 ease-in-out" loading="lazy" :src="`/images/music/${m.cover}`" :alt="`${m.title} album cover`">
                                <img class="w-48 max-w-none absolute -top-2 left-0 peer-hover:left-[35%] -z-10 block animate-[spin_3s_linear_infinite] filter drop-shadow-[0_0_8px_black] transition-[box-shadow_left] duration-300 ease-in-out" loading="lazy" src="{{ Vite::image('vinyl-disc.png') }}" alt="Vinyl disc">
                                <p class="w-48 text-xs" x-text="`${m.title} by ${m.artist} (${m.type})`"></p>
                            </div>
                        </template>
                    </div>
                </x-window>
            </div>
        </div>
    </div>


    <div class="flex flex-col gap-2">
        <h2 class="text-body-medium font-bold">mis playlists &gt;3</h2>
        <div class="flex flex-col gap-4">
            <x-window title="dependo emocionalmente de la música">
                <iframe style="border-radius:12px"
                    src="https://open.spotify.com/embed/playlist/3TZJGahUA0FMdQfV1qnTzC?utm_source=generator"
                    width="100%" height="352" frameBorder="0" allowfullscreen={false}
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                    loading="lazy"></iframe>
            </x-window>
            <x-window title="construyendo mis malditas alas">
                <iframe style="border-radius:12px"
                    src="https://open.spotify.com/embed/playlist/0FqxaaCa7LNKlss5B34CAN?utm_source=generator&theme=0"
                    width="100%" height="352" frameBorder="0" allowfullscreen={false}
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                    loading="lazy"></iframe>
            </x-window>
            <x-window title="ser joven y no ser revolucionario">
                <iframe style="border-radius:12px"
                    src="https://open.spotify.com/embed/playlist/2uaBp593dKM1N9M2uT5Pu3?utm_source=generator&theme=0"
                    width="100%" height="352" frameBorder="0" allowfullscreen={false}
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                    loading="lazy"></iframe>
            </x-window>
            <x-window title="AMO LOS FUCKING MUSICALES">
                <iframe style="border-radius:12px"
                    src="https://open.spotify.com/embed/playlist/28SULrkzqvUr9Jnk4PoD8X?utm_source=generator"
                    width="100%" height="352" frameBorder="0" allowfullscreen={false}
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                    loading="lazy"></iframe>
            </x-window>
            <x-window title="she's moody (yo)">
                <iframe style="border-radius:12px"
                    src="https://open.spotify.com/embed/playlist/371xAlIZtbUZPAWDaNusxR?utm_source=generator"
                    width="100%" height="352" frameBorder="0" allowfullscreen={false}
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                    loading="lazy"></iframe>
            </x-window>
        </div>
    </div>

    <div class="flex flex-col md:grid md:grid-cols-2 md:items-center gap-4">
        <x-window title="shooting star">
            <img loading="lazy" src="{{ Vite::image('last-words-of-a-shooting-star-sticker.jpg') }}"
                alt="Last Words of a Shooting Star, Mitski sticker" />
        </x-window>
        <div class="flex flex-col gap-2">
            <h2 class="text-body-medium font-bold">social profiles and contact</h2>
            <ul>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <a
                        href="https://open.spotify.com/user/31wfjfd7x6lie7cvcfxbpkft3zcu?si=7174c0c75c114c18">spotify</a>
                </li>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <a href="https://www.tumblr.com/naviheylisten9?source=share">tumblr: naviheylisten9</a>
                </li>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <a href="https://github.com/HeyListenNavi">github: HeyListenNavi</a>
                </li>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <a href="https://www.instagram.com/heylisten.navi?igsh=aGtub3I3dHJhbXRs">instagram:
                        heylisten.navi</a>
                </li>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <span>discord tag: naviheylisten</span>
                </li>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <span>psn tag: heyListenNavi91</span>
                </li>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <span>email: heylistennavi@proton.me</span>
                </li>
                <li class="before:block before:content-['→'] before:text-highlight flex gap-1">
                    <a href="https://ko-fi.com/naviheylisten">kofi: naviheylisten</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
