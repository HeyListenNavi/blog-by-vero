use yew::prelude::*;
use crate::components::nav_bar::NavBar;
use crate::components::window::Window;
use common::SERVER_URL;

#[function_component(AboutMe)]
pub fn about_me() -> Html {
    html! {
        <div class="aboutme">
            <NavBar/>
            <Window title="yapping about myself" class="main">        
                <div class="desc">
                    <div class="content">
                        <Window title="woah" buttons={1}>
                            <img src={format!("{SERVER_URL}/api/assets/trans-bunny.jpg")} width="200px" alt="bunny with a trans flag icon"/>
                        </Window>
                        <div>
                            <h1>{ "About me !!1!" }</h1>
                            <p>{ "holiii, my name's Verónica, i'm a self-made woman (a.k.a. trans), and i study computer science. i'd say i'm a bit of an awkward person (maybe a lot), i don't tend to share much, and social interactions have always been my Achilles heel, but i do love writing stuff, either about how i feel, what i've done, opinions i have, interests, or anything fhjsaf." }</p>
                        </div>
                    </div>
                </div>
                <div class="love">
                    <h2>{ "things i love" }</h2>
                    <ul>
                        <li>
                            <p>{ "coding, it's been the hobby i've held for the longest, i fell in love with it when i was like fourteen. initially i wanted to make my own videogame so i decided to start learning c# on my own through youtube videos, it started simple with simple programming concepts in a console app, eventually it evolved into learning the objects oriented paradigm and actual desktop apps using windows forms and wpf later, at this point i had dropped any intent of making a video game and just wanted to learn more about this, i went to learn web development, and now i'm kind of  in a \"a little bit of everything\" stage, i decided to properly learn rust, and it's just amazing, i love the language and i'm just experimenting to see what else i can do with it, i'm really excited to see what other things i can do with the language and just expand my knowledge about computer science in general." }</p>
                        </li>
                        <li>
                            <p>{ "cats, i love cats, i think it's a bit ironic because i'm actually allergic to cats, but that won't stop me from absolutely fucking loving cats lmfao, i currently have a cat, don't ask me what breed she is because i have no idea, but she's mostly white with gray and orange spots. i think we are both very similar, she sleeps a lot, usually either in my bed or a chair i have in my room; she loves to be petted and rub herself on people, yet she's usually afraid of people; she has this habit of jumping into the border of my window and just staying there, staring at what's happening outside; some say she's grumpy, i believe quite the opposite - they just haven't met her enough." }</p>
                        </li>
                        <li>
                            <p>{ "photography. i've been really into photography since like a year ago, although i've tried to keep it as a casual hobby because as soon as i start to take it seriously i think it'll lose the peaceful feeling it gives me, i mostly like to take pictures of objects that somehow managed to metaphorically mean an event that happened in my life or parts of a landscape to remember somewhere." }</p>
                        </li>
                        <li>
                            <p>{ "videogames, i've played videogames since i was a child, i'm absolutely in love with story-driven videogames, i think the interaction they can give you allows for some fascinating stories to be told in a way that you connect with the story way more than you would with other mediums, the current console i usually play with is a ps4, but before that i've played in a nintendo ds, nintendo wii, ps vita, the original xbox, xbox 360, and all the emulators that my old laptop is able to handle, lately i've been wanting to go back to emulation and try some old games i'm interested in, so i will probably see if i can install some in my laptop." }</p>
                        </li>
                        <li>
                            <p>{ "physics and math, i've had a love for math since i was introduced to it, and the amazing synergy that it has with physics, being able to describe a phenomenon using a mathematical model totally blows up my mind, fields like quantum mechanics totally fascinate me. in the future, i'd love to study a career in physics and work in a field that somehow mixes both physics and computer science together, something like quantum computing (another one of my interests)." }</p>
                        </li>
                        <li>
                            <p>{ "musicals, i absolutely love musicals, Hamilton, SIX, Dear Evan Hansen, Hazbin Hotel, Tick Tick Boom, Heathers, i just love them all, and there's just so many i haven't watched, i think it's amazing to be able to tell a story through music. the first musical i listened to and enjoyed was Hamilton, and oh my god, it made me go through so many emotions by just listening to music, it's so mesmerizing to be able to connect emotionally with a character whose story i've only heard in a music song, i just absolutely love musicals, and one of my dreams is being able to watch a musical in a theater." }</p>
                        </li>
                    </ul>
                </div>
                <div class="dreamer">
                    <Window title="mitsuki" buttons={1}>
                        <img src={format!("{SERVER_URL}/api/assets/mitsuki-icon.jpeg")} width="250px" alt="mitsuki icon"/>
                    </Window>
                    <div class="content">
                        <h2>{ "dreamer" }</h2>
                        <ul>
                            <li>
                                <span>{ "prefered nickname: Vero or Navi" }</span>
                            </li>
                            <li>
                                <span>{ "transfem lesbian!!" }</span>
                            </li>
                            <li>
                                <div class="flags">
                                    <span class="lesbian-flag"></span>
                                    <span class="transfem-flag"></span>
                                </div>
                            </li>
                            <li>
                                <span>{ "spanish and english speaker" }</span>
                            </li>
                            <li>
                                <span>{ "favorite color: " } <span style="background-color: var(--color-title); color: var(--color-bg);">{ "#EABBB9" }</span></span>
                            </li>
                            <li>
                                <span>{ "favorite season: winter" }</span>
                            </li>
                            <li>
                                <span>{ "usual pastimes: coding, gaming, reading, photography, sleeping" }</span>
                            </li>
                            <li>
                                <span>{ "i love the animatics series called " } <a href="https://seahousestation.weebly.com/plot.html">{ "Little Pickle Town" }</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="favorite">
                    <h2>{ "favorite things" }</h2>
                    <div class="favorite-stuff">
                        <Window title="films" class="film--list" buttons={1}>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/i-saw-the-tv-glow-poster.jpg")} alt="I saw the TV Glow (2024) poster"/>
                                <p>{ "I Saw the TV Glow (Jane Schoenbrun. 2024)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/civil-war-poster.jpg")} alt="Civil War (2024) poster"/>
                                <p>{ "Civil War (Alex Garland. 2024)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/everything-everywhere-all-at-once-poster.jpg")} alt="Everything Everywhere All at Once (2022) poster"/>
                                <p>{ "Everything Everywhere All at Once (Daniel Kwan and Daniel Scheinert. 2022)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/lady-bird-poster.jpg")} alt="Lady bird (2017) poster"/>
                                <p>{ "Lady Bird (Greta Gerwig. 2017)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/bottoms-poster.jpg")} alt="Bottoms (2023) poster"/>
                                <p>{ "Bottoms (Emma Seligman. 2023)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/nimona-poster.jpg")} alt="Nimona (2023) poster"/>
                                <p>{ "Nimona (Nick Bruno and Troy Quane. 2023)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/a-silent-voice-poster.jpg")} alt="A Silent Voice (2016) poster"/>
                                <p>{ "A Silent Voice (Taichi Ishidate and Naoko Yamada. 2016)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/suzume-poster.jpg")} alt="Suzume (2022) poster"/>
                                <p>{ "Suzume (Makoto Shinkai. 2022)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/the-batman-poster.jpg")} alt="The Batman (2022) poster"/>
                                <p>{ "The Batman (Matt Reeves. 2022)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/spiderman-across-the-spiderverse-poster.jpg")} alt="Spider-man Across the Spider-Verse (2023) poster"/>
                                <p>{ "Spider-Man: Across the Spider-Verse (Joaquim Dos Santos, Kemp Powers and Justin K. Thompson. 2023)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/portrait-of-a-lady-on-fire-poster.jpg")} alt="Portrait of a Lady on Fire (2019) poster"/>
                                <p>{ "Portrait of a Lady on Fire (Céline Sciamma. 2019)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/all-the-bright-places-poster.jpg")} alt="All the Bright Places (2020) poster"/>
                                <p>{ "All the Bright Places (Brett Haley. 2020)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/the-perks-of-being-a-wallflower-poster.jpg")} alt="the perks of being a wallflower (2012) poster"/>
                                <p>{ "the perks of being a wallflower (Stephen Chbosky. 2012)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/una-pelicula-de-policias-poster.jpg")} alt="una película de policías (2021) poster"/>
                                <p>{ "Una película de policías (Alonso Ruizpalacios. 2021)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/temporada-de-patos-poster.jpg")} alt="temporada de patos (2004) poster"/>
                                <p>{ "Temporada de patos (Fernando Eimbcke. 2004)" }</p>
                            </div>
                            <div class="film">
                                <img src={format!("{SERVER_URL}/api/assets/cosas-imposibles-poster.jpg")} alt="Cosas Imposibles (2021) poster"/>
                                <p>{ "Cosas Imposibles (Ernesto Contreras. 2021)" }</p>
                            </div>
                        </Window>
                        <Window title="series" class="series--list" buttons={1}>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/arcane-poster.jpg")} alt="Arcane poster"/>
                                <p>{ "Arcane (Christian Linke and Alex Yee)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/better-call-saul-poster.jpg")} alt="Better Call Saul poster"/>
                                <p>{ "Better Call Saul (Vince Gilligan and Peter Gould)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/fleabag-poster.jpg")} alt="Fleabag poster"/>
                                <p>{ "Fleabag (Phoebe Waller-Bridge)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/wonder-egg-priority-poster.jpg")} alt="Wonder Egg Priority poster"/>
                                <p>{ "Wonder Egg Priority (Shinji Nojima)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/inside-job-poster.jpg")} alt="Inside Job poster"/>
                                <p>{ "Inside Job (Shion Takeuchi and Alex Hirsch)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/moral-orel-poster.jpg")} alt="Moral Orel poster"/>
                                <p>{ "Moral Orel (Dino Stamatopoulos)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/violet-evergarden-poster.jpg")} alt="Violet Evergarden poster"/>
                                <p>{ "Violet Evergarden (Kana Akatsuki)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/blue-eye-samurai-poster.jpg")} alt="Blue Eye Samurai poster"/>
                                <p>{ "Blue Eye Samurai (Michael Green and Amber Noizumi)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/looking-for-alaska-poster.jpg")} alt="Looking for Alaska poster"/>
                                <p>{ "Looking for Alaska (Josh Schwartz)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/desenfrenadas-poster.jpg")} alt="Desenfrenadas poster"/>
                                <p>{ "Desenfrenadas (Diego Martínez Ulanosky)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/baby-reindeer-poster.jpg")} alt="Baby Reindeer poster"/>
                                <p>{ "Baby Reindeer ()" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/the-owl-house-poster.jpg")} alt="The Owl House poster"/>
                                <p>{ "The Owl House (Dana Terrace)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/star-vs-the-forces-of-evil-poster.jpg")} alt="Star vs The Forces of Evil poster"/>
                                <p>{ "Star vs The Forces of Evil (Daron Nefcy, Dave Wasson and Jordana Arkin)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/helluva-boss-poster.jpg")} alt="Helluva Boss poster"/>
                                <p>{ "Helluva Boss (Vivienne Medrano)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/hazbin-hotel-poster.jpg")} alt="Hazbin Hotel poster"/>
                                <p>{ "Hazbin Hotel (Vivienne Medrano)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/the-boys-poster.jpg")} alt="The Boys poster"/>
                                <p>{ "The Boys (Eric Kripke)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/bee-and-puppycat-poster.jpg")} alt="Bee and PuppyCat poster"/>
                                <p>{ "Bee and PuppyCat (Natasha Allegri)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/fallout-poster.jpg")} alt="Fallout poster"/>
                                <p>{ "Fallout (Geneva Robertson-Dworet and Graham Wagner)" }</p>
                            </div>
                            <div class="series">
                                <img src={format!("{SERVER_URL}/api/assets/the-last-of-us-poster.jpg")} alt="The Last of Us poster"/>
                                <p>{ "The Last of Us (Neil Druckmann and Craig Mazin)" }</p>
                            </div>
                        </Window>
                        <Window title="videogames :3" class="game--list" buttons={1}>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/the-last-of-us-game-poster.jpg")} alt="The Last of Us poster"/>
                                <p>{ "The Last of Us" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/the-last-of-us-part-two-game-poster.jpg")} alt="The Last of Us: Part 2 poster"/>
                                <p>{ "The Last of Us: Part II" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/red-dead-redemtion-two-poster.jpg")} alt="Red Dead Redemtion 2 poster"/>
                                <p>{ "Red Dead Redemtion 2" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/portal-poster.jpg")} alt="Portal poster"/>
                                <p>{ "Portal" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/portal-two-poster.jpg")} alt="Portal 2 poster"/>
                                <p>{ "Portal 2" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/resident-evil-2-poster.jpg")} alt="Resident Evil 2 Remake poster"/>
                                <p>{ "Resident Evil 2 Remake" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/resident-evil-4-poster.jpg")} alt="Resident Evil 4 poster"/>
                                <p>{ "Resident Evil 4" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/resident-evil-6-poster.jpg")} alt="Resident Evil 6 poster"/>
                                <p>{ "Resident Evil 6" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/resident-evil-7-poster.jpg")} alt="Resident Evil 7 Biohazard poster"/>
                                <p>{ "Resident Evil 7: Biohazard" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/resident-evil-8-poster.jpg")} alt="Resident Evil 8 Village poster"/>
                                <p>{ "Resident Evil 8: Village" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/celeste-poster.jpg")} alt="Celeste poster"/>
                                <p>{ "Celeste" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/metroid-prime-trilogy-poster.jpg")} alt="Metroid Prime Trilogy poster"/>
                                <p>{ "Metroid Prime Trilogy" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/metroid-other-m-poster.jpg")} alt="Metroid Other M poster"/>
                                <p>{ "Metroid: Other M" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/the-legend-of-zelda-oot-poster.jpg")} alt="The Legend of Zelda Ocarina of Time poster"/>
                                <p>{ "The Legend of Zelda: Ocarina of Time" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/the-legend-of-zelda-ww-poster.jpg")} alt="The Legend of Zelda Wind Waker poster"/>
                                <p>{ "The Legend of Zelda: Wind Waker" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/the-legend-of-zelda-botw-poster.jpg")} alt="The Legend of Zelda Breath of the Wild poster"/>
                                <p>{ "The Legend of Zelda: Breath of the Wild" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/donkey-kong-64-poster.jpg")} alt="Donkey Kong 64 poster"/>
                                <p>{ "Donkey Kong 64" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/donkey-kong-country-returns-poster.jpg")} alt="Donkey Kong Country Returns"/>
                                <p>{ "Donkey Kong: Country Returns" }</p>
                            </div>
                            <div class="game">
                                <img src={format!("{SERVER_URL}/api/assets/minecraft-poster.jpg")} alt="Minecraft poster"/>
                                <p>{ "Minecraft" }</p>
                            </div>
                        </Window>
                        <Window title="m u s i c" class="music--list" buttons={1}>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/be-the-cowboy.jpg")} alt="Be the Cowboy album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Be the Cowboy by Mitski (album)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/bury-me-at-makeout-creek.jpg")} alt="Bury Me at Makeout Creek album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Bury Me at Makeout Creek by Mitski (album)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/damn.jpg")} alt="DAMN. album by Kendrick Lamar" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "DAMN. by Kendrick Lamar (album)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/mr-morale-and-the-big-steppers.jpg")} alt="Mr Morale and the big steppers album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Mr. Morale & The Big Steppers by Kendrick Lamar (album)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/hit-me-hard-and-soft.jpg")} alt="Hit me Hard and Soft album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "HIT ME HARD AND SOFT by Billie Eilish (album)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/sour.jpg")} alt="Sour album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Sour by Olivia Rodrigo (album)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/guts.jpg")} alt="Guts album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Guts by Olivia Rodrigo (album)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/delusion.jpg")} alt="Delusion album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Delusión de Bratty (album)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/tdbn.jpg")} alt="tdbn album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "tdbn de Bratty (album)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/otros-colores.jpg")} alt="Otros Colores single cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Otros Colores de Bratty y Daniel Quién (single)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/sobredosis-de-tempra.jpg")} alt="Sobredosis de Tempra single cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Sobredósis de Tempra de Bratty (single)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/axolotes-mexicanos.jpg")} alt=":3 album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ ":3 de Axolotes Mexicanos (album)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/porfiado.jpg")} alt="Porfiado album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Porfiado de Cuarteto de Nos (album)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/blue-banisters.jpg")} alt="Blue Banisters album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Dealer by Lana del Rey (song)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/no-burden.jpg")} alt="No Burden album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "I Don't Wanna Be Funny Anymore by Lucy Dacus (song)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/home-video.jpg")} alt="Home Video album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Brando by Lucy Dacus (song)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/historian.jpg")} alt="Historian album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Night Shift by Lucy Dacus (song)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/bewitched.jpg")} alt="Bewitched album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Dreamer by Laufey (song)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/lumbreras.jpg")} alt="Lumbreras single cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Lumbreras de AQUILES (single)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/labour.jpg")} alt="Labour single cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "labour by Paris Paloma (single)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/1940-carmen.jpg")} alt="1940 Carmen album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "1940 Carmen de Mon Laferte (album)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/cabras.jpg")} alt="Cabras single cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Cabras de Little Jesus y Jimena Gonzáles (single)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/freshman-year.jpg")} alt="Freshman Year album cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "freshman year by Hop Along, Queen Ansleis (album)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/dear-god.jpg")} alt="Dear God song cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Dear God by XTC (song)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/fin-de-semana.jpg")} alt="Fin de Semana song cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "Fin de Semana de Sam Vazquez (cover)" }</p>
                            </div>
                            <div class="music">
                                <img src={format!("{SERVER_URL}/api/assets/ccpseddh.jpg")} alt="¿Cuántas Cosas Podrían Sucederme El Día De Hoy? song cover" class="cover"/>
                                <img src="assets/vinyl-disc.png" alt="Vinyl disc" class="disc"/>
                                <p>{ "¿Cuántas Cosas Podrían Sucederme El Día De Hoy? de NXNNI, Sam Vazquez y Alehtse Vargas (single)" }</p>
                            </div>
                        </Window>
                    </div>
                </div>
                <div class="social">
                    <Window title="shooting star" buttons={1}>
                        <img src={format!("{SERVER_URL}/api/assets/last-words-of-a-shooting-star-sticker.jpg")} alt="Last Words of a Shooting Star, Mitski sticker"/>
                    </Window>
                    <div class="content">
                        <h2>{ "social profiles and contact" }</h2>
                        <ul>
                            <li>
                                <a href="https://open.spotify.com/user/31wfjfd7x6lie7cvcfxbpkft3zcu?si=7174c0c75c114c18">{ "spotify" }</a>
                            </li>
                            <li>
                                <a href="https://www.tumblr.com/naviheylisten9?source=share">{ "tumblr: naviheylisten9" }</a>
                            </li>
                            <li>
                                <a href="https://github.com/HeyListenNavi">{ "github: HeyListenNavi" }</a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/heylisten.navi?igsh=aGtub3I3dHJhbXRs">{ "instagram" }</a>
                            </li>
                            <li>
                                <span>{ "discord tag: naviheylisten" }</span>
                            </li>
                            <li>
                                <span>{ "psn tag: heyListenNavi91" }</span>
                            </li>
                            <li>
                                <span>{ "email: heylistennavi@proton.me" }</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </Window>
        </div>
    }
}