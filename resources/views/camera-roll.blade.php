@extends('layouts.page')

@section('title', 'photography')
@section('window_title', 'camera')

@section('content')
    <div class="cameraroll">
        <div class="title">
            <h1>A couple of pictures i've taken ;w;</h1>
        </div>
        <x-window title="dress">
            <h2>→ october 17, 2023</h2>
            <p>i bought a dress i found on my way to school and decided to see how i look in formal wear ^^</p>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('mirror-dress/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('mirror-dress/2.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('mirror-dress/3.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('mirror-dress/4.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('mirror-dress/5.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="big-ass-mayo-jar">
            <h2>yes, i drink water from a big ass mayo jar</h2>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('vero/big-ass-mayo-jar/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('vero/big-ass-mayo-jar/2.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="me">
            <h2>i'm a walking oxymoron</h2>
            <div class="photos">
                <div>
                    <p>ballons-love-vero.jpg</p>
                    <img loading="lazy" src="{{ Vite::photo('vero/ballons-love-me.jpg') }}" />
                </div>
                <div>
                    <p>acto 2</p>
                    <img loading="lazy" src="{{ Vite::photo('vero/bunny-ears.jpg') }}" />
                </div>
                <div>
                    <p>car-highlights.jpg</p>
                    <img loading="lazy" src="{{ Vite::photo('vero/car-highlights.jpg') }}" />
                </div>
                <div>
                    <p>this picture is a reference to a dark souls video i watched i while ago</p>
                    <img loading="lazy" src="{{ Vite::photo('vero/dark-souls.jpg') }}" />
                </div>
                <div>
                    <p>me-in-the-fucking-beach.jpg</p>
                    <img loading="lazy" src="{{ Vite::photo('vero/in-the-fucking-beach.jpg') }}" />
                </div>
                <div>
                    <p>capitulo 4: i simply- don't know</p>
                    <img loading="lazy" src="{{ Vite::photo('vero/defender/1.jpg') }}" />
                </div>
                <div>
                    <p>in fact my dear, i'm fucking terrified</p>
                    <img loading="lazy" src="{{ Vite::photo('vero/defender/2.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('vero/defender/3.jpg') }}" />
                </div>
                <div>
                    <p>Melanie martinez core :3</p>
                    <img loading="lazy" src="{{ Vite::photo('vero/melanie-martinez-core.jpg') }}" />
                </div>
                <div>
                    <p>old-car-peace.jpg</p>
                    <img loading="lazy" src="{{ Vite::photo('vero/old-car-peace.jpg') }}" />
                </div>
                <div>
                    <p>satanist.jpg</p>
                    <img loading="lazy" src="{{ Vite::photo('vero/satanist.jpg') }}" />
                </div>
                <div>
                    <p>Mr. Preacher man</p>
                    <img loading="lazy" src="{{ Vite::photo('vero/mr-preacher-man.jpg') }}" />
                </div>
                <div>
                    <p>parrafos; todo cambia</p>
                    <img loading="lazy" src="{{ Vite::photo('vero/right-before-exam.jpg') }}" />
                </div>
                <div>
                    <p>sand-sillhouette.jpg</p>
                    <img loading="lazy" src="{{ Vite::photo('vero/sand-sillhouette.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="milanesa">
            <h2>a couple pictures of my cat, milanesa <3< /h2>
                    <div class="photos">
                        <div>
                            <p>credits to astrom for taking the picture</p>
                            <img loading="lazy" src="{{ Vite::photo('milanesa/purple.jp') }}g" />
                        </div>
                        <div>
                            <p>kiss my ass milanesa, dejame trabajar porfa 😭</p>
                            <img loading="lazy" src="{{ Vite::photo('milanesa/escritorio/1.jpg') }}" />
                            <img loading="lazy" src="{{ Vite::photo('milanesa/escritorio/2.jpg') }}" />
                        </div>
                    </div>
        </x-window>
        <x-window title="travel camera">
            <h2>i n t e r l u d i o</h2>
            <p>fotos que tomé utilizando el lente de una vieja cámara</p>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('old-camera-travel/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('old-camera-travel/2.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('old-camera-travel/3.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('old-camera-travel/4.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('old-camera-travel/5.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('old-camera-travel/6.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('old-camera-travel/7.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="lu">
            <h2>⋆ astrom ⋆</h2>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('lu/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('lu/2.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="whiteboard">
            <h2>me encantan los pizarrones !!11!</h2>
            <div class="photos">
                <div>
                    <p>odio utilizar la fórmula general, pero la forma en la que se obtiene me parece bellísima ♡
                    </p>
                    <img loading="lazy" src="{{ Vite::photo('pizarron/quadratic-formula.jpg') }}" />
                </div>
                <div>
                    <p>realizar integrales definidas utilizando la definición de Riemann es simplemente mágico ˚
                    </p>
                    <img loading="lazy" src="{{ Vite::photo('pizarron/riemann-integral.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="soy una feminista porque ...">
            <h2>Viva México</h2>
            <p>El error de ser mujer</p>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('viva-mexico/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('viva-mexico/2.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('viva-mexico/3.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('viva-mexico/4.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="apple cider">
            <h2>we both like apple cider~</h2>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('apple-cider/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('apple-cider/2.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="ceramic">
            <h2>pintora de cerámica en un jardín</h2>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('ceramic-painter/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('ceramic-painter/2.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="frens">
            <h2>christmas with friends</h2>
            <p>2023</p>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('christmas-casa-de-jengibre/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('christmas-casa-de-jengibre/2.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="altoids wallet">
            <h2>making of de mi altoids wallet</h2>
            <p>no me gustan las carteras así que decidí hacer una utilizando altoids</p>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('altoids-wallet/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('altoids-wallet/2.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('altoids-wallet/3.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="physics" class="physics">
            <h2>videos de un proyecto de física que realice</h2>
            <p>consiste en una versión pequeña de un holograma que utilice para proyectar un holograma de un video de
                Hatsune Miku jafskjaf</p>
            <div class="videos">
                <x-window title="hatsune miku">
                    <video controls={true}>
                        <source src="{{ Vite::photo('physics-project/miku-hologram.mp4') }}" type="video/mp4" />
                    </video>
                </x-window>
                <x-window title="vocaloid">
                    <video controls={true}>
                        <source src="{{ Vite::photo('physics-project/vocaloid-hologram.mp4') }}" type="video/mp4" />
                    </video>
                </x-window>
            </div>
        </x-window>
        <x-window title="electromecánica">
            <h2>visita al laboratorio de electromecánica de mi universidad @-@</h2>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('electromecanica-visita/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('electromecanica-visita/2.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="graduación">
            <h2>e p i l o g o ~ in the seek of my Great Perhaps</h2>
            <p>i graduated bitches</p>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('graduation/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('graduation/2.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="ensenada">
            <h2>fuí a Ensenada</h2>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('ensenada-travel/electrical-tower.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('ensenada-travel/rocks.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('ensenada-travel/road-signs.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('ensenada-travel/long-road.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="palacio cultural">
            <h2>visita al palacio de la cultura de mi ciudad</h2>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('palacio-cultural/palacio-de-la-cultura.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('palacio-cultural/internet-reality.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('palacio-cultural/feelings-puppets.jpg') }}" />
                </div>
                <div>
                    <p>odio.</p>
                    <img loading="lazy" src="{{ Vite::photo('palacio-cultural/feelings-puppets--odio.jpg') }}" />
                </div>
                <div>
                    <p>el centro</p>
                    <img loading="lazy" src="{{ Vite::photo('palacio-cultural/el-centro.jpg') }}" />
                </div>
                <div>
                    <p>policia municipal</p>
                    <img loading="lazy" src="{{ Vite::photo('palacio-cultural/policia-municipal.jpg') }}" />
                </div>
                <div>
                    <p>esto si es America.</p>
                    <img loading="lazy" src="{{ Vite::photo('palacio-cultural/esto-si-es-america.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('palacio-cultural/identidad-cultural-del-pueblo.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('palacio-cultural/mirror-painting/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('palacio-cultural/mirror-painting/2.jpg') }}" />
                </div>
                <div>
                    <p>odio bordar</p>
                    <img loading="lazy" src="{{ Vite::photo('palacio-cultural/odio-bordar/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('palacio-cultural/odio-bordar/2.jpg') }}" />
                </div>
                <div>
                    <p>the truth is in love</p>
                    <img loading="lazy" src="{{ Vite::photo('palacio-cultural/the-truth-is-in-love/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('palacio-cultural/the-truth-is-in-love/2.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="home">
            <h2>looking for a place to call home</h2>
            <div class="photos">
                <div>
                    <p>desk</p>
                    <img loading="lazy" src="{{ Vite::photo('home/veros-desk.jpg') }}" />
                </div>
                <div>
                    <p>"swear to me that everything you said about the Fireflies was true"</p>
                    <img loading="lazy" src="{{ Vite::photo('home/swear-to-me-its-true.jpg') }}" />
                </div>
                <div>
                    <p>
                        <span style="margin-right: 2.5rem">b l u r r e d</span>
                        <span>m e m o r i e s</span>
                    </p>
                    <img loading="lazy" src="{{ Vite::photo('home/no-family-photos.jpg') }}" />
                </div>
                <div>
                    <p>- página 8 -</p>
                    <img loading="lazy" src="{{ Vite::photo('home/night-lamp.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('home/vela-aromatica.jpg') }}" />
                </div>
                <div>
                    <p>
                    <p>"Ser joven y no ser revolucionario es una contradicción hasta biológica"</p>
                    <p style="text-align: left">- Salvador Allende</p>
                    </p>
                    <img loading="lazy" src="{{ Vite::photo('home/progress-but-still-a-lot-to-do.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="nature">
            <h2>plants</h2>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('plants/coffee-table.jpg') }}" />
                </div>
                <div>
                    <p>
                        <span style="font-style: italic">c u p i d ,</span>
                        how could you be so cruel?-
                    </p>
                    <img loading="lazy" src="{{ Vite::photo('plants/cupid.jpg') }}" />
                </div>
                <div>
                    <p>i'm typing you a message that i know i'll never send, rewriting old excuses, delete the kisses
                        at the end</p>
                    <img loading="lazy" src="{{ Vite::photo('plants/dont-delete-the-kisses-flowers/1.jpg') }}" />
                </div>
                <div>
                    <p>xoxo ♡</p>
                    <img loading="lazy" src="{{ Vite::photo('plants/dont-delete-the-kisses-flowers/2.jpg') }}" />
                </div>
                <div>
                    <p>
                    <p>please don't say you love me</p>
                    <p>胸がはち切れそうで</p>
                    </p>
                    <img loading="lazy" src="{{ Vite::photo('plants/dont-say-you-love-me.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('plants/window-sun.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('plants/hope-flowers.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('plants/mia-rose.jpg') }}" />
                </div>
                <div>
                    <p>raíces</p>
                    <img loading="lazy" src="{{ Vite::photo('plants/roots.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('plants/suculenta.jpg') }}" />
                </div>
                <div>
                    <p>~ preludio ~</p>
                    <img loading="lazy" src="{{ Vite::photo('plants/sunflower-letter/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('plants/sunflower-letter/2.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="landscapes">
            <h2>various landscapes i've visited</h2>
            <div class="photos">
                <div>
                    <p>sunset</p>
                    <img loading="lazy" src="{{ Vite::photo('landscapes/beach-sillhoutte.jpg') }}" />
                </div>
                <div>
                    <p>ferris wheel</p>
                    <img loading="lazy" src="{{ Vite::photo('landscapes/fair-ferris-wheel.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('landscapes/home-lighthouse.jpg') }}" />
                </div>
                <div>
                    <p>
                    <p>▌│█║▌ i n t e r l u d i o ║▌║▌║</p>
                    <p>estoy destinada a vivir en un estado constante de nostalgia por un momento que jamás existió</p>
                    </p>
                    <img loading="lazy" src="{{ Vite::photo('landscapes/house-with-radio-tower.jpg') }}" />
                </div>
                <div>
                    <p>we're all small and stupid</p>
                    <img loading="lazy" src="{{ Vite::photo('landscapes/just-be-a-rock.jpg') }}" />
                </div>
                <div>
                    <p>look for the light</p>
                    <img loading="lazy" src="{{ Vite::photo('landscapes/lighthouse.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('landscapes/ocean-paper-cutout.jpg') }}" />
                </div>
                <div>
                    <p>32° 2' 34\" N 115° 54' 24\" W</p>
                    <img loading="lazy" src="{{ Vite::photo('landscapes/snow-travel--landscape.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('landscapes/snow-travel--trees.jpg') }}" />
                </div>
                <div>
                    <p>⎯⎯ ୨ wandering ୧ ⎯⎯ creo que he perdido la página</p>
                    <img loading="lazy" src="{{ Vite::photo('landscapes/yellow-sunset.jpg') }}" />
                </div>
                <div>
                    <p>capitulo 6; loveless</p>
                    <img loading="lazy" src="{{ Vite::photo('landscapes/i-see-you-island.jpg') }}" />
                </div>
                <div>
                    <p>
                    <p>❜ ─ párrafos, cambio ─ ❛</p>
                    <p>∆ : en matemáticas delta se utiliza para representar el cambio de una variable, se hace una
                        diferencia entre el estado final e inicial para observar cuánto ha cambiado</p>
                    </p>
                    <img loading="lazy" src="{{ Vite::photo('landscapes/house-with-water-well.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="photo mode">
            <h2>pictures i've taken using photo mode</h2>
            <div class="photos">
                <div>
                    <p>Liars.</p>
                    <img loading="lazy" src="{{ Vite::photo('photo-mode/liars.jpg') }}" />
                </div>
                <div>
                    <p>there is no light</p>
                    <img loading="lazy" src="{{ Vite::photo('photo-mode/no-light.jpg') }}" />
                </div>
                <div>
                    <p>we tortured</p>
                    <img loading="lazy" src="{{ Vite::photo('photo-mode/choked-on-their-own-blood.jpg') }}" />
                </div>
                <div>
                    <p>wept.</p>
                    <img loading="lazy" src="{{ Vite::photo('photo-mode/the-last-one-cried.jpg') }}" />
                </div>
                <div>
                    <p>wolfs will get you</p>
                    <img loading="lazy" src="{{ Vite::photo('photo-mode/wolfs.jpg') }}" />
                </div>
                <div>
                    <p>Hillcrest</p>
                    <img loading="lazy" src="{{ Vite::photo('photo-mode/hillcrest.jpg') }}" />
                </div>
                <div>
                    <p>strings</p>
                    <img loading="lazy" src="{{ Vite::photo('photo-mode/strings.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('photo-mode/dina-and-ellie.jpg') }}" />
                </div>
                <div>
                    <p>Umbrella.</p>
                    <img loading="lazy" src="{{ Vite::photo('photo-mode/umbrella.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="other">
            <h2>efímero</h2>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('amar-es-todo-lo-que-tengo.jpg') }}" />
                </div>
                <div>
                    <p>i'll worship like a dog at the shrine of your lies</p>
                    <img loading="lazy" src="{{ Vite::photo('altar.jpg') }}" />
                </div>
                <div>
                    <p>why do you write like you're running out of time?</p>
                    <img loading="lazy" src="{{ Vite::photo('clock.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('marcha-pride-2024.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('miku-fiesta.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('school-onestep-polaroid.jpg') }}" />
                </div>
                <div>
                    <p>tqm mucho &gt;3</p>
                    <img loading="lazy" src="{{ Vite::photo('kirby.jpg') }}" />
                </div>
                <div>
                    <p>is the Moon still in love with the Sun?</p>
                    <img loading="lazy" src="{{ Vite::photo('school-ramen.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('moon.jpg') }}" />
                </div>
                <div>
                    <p>me rehusó a dejarlos ir</p>
                    <img loading="lazy" src="{{ Vite::photo('wont-let-shoes-go.jpg') }}" />
                </div>
                <div>
                    <p>veleros.</p>
                    <img loading="lazy" src="{{ Vite::photo('summer-sale-postal/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('culos-de-lectura.jpg') }}" />
                </div>
            </div>
        </x-window>
        <x-window title="moon">
            <h2>m o o n</h2>
            <p>the moon is gorgeus, isn't it?</p>
            <div class="photos">
                <div>
                    <img loading="lazy" src="{{ Vite::photo('moon/1.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('moon/2.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('moon/3.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('moon/4.jpg') }}" />
                </div>
                <div>
                    <img loading="lazy" src="{{ Vite::photo('moon/5.jpg') }}" />
                </div>
            </div>
        </x-window>
    </div>
@endsection
