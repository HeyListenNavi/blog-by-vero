use yew::prelude::*;
use crate::components::nav_bar::NavBar;
use crate::components::window::Window;
use common::SERVER_URL;
use web_sys::{HtmlElement, Node};
use wasm_bindgen::JsCast;
use gloo::events::EventListener;
use gloo::utils::{document, body};

pub struct CameraRoll {
    image_displaying: bool
}

pub enum Msg {
    DisplayImage(Option<HtmlElement>)
}

impl Component for CameraRoll {
    type Message = Msg;
    type Properties = ();

    fn create(_ctx: &Context<Self>) -> Self {
        return Self {
            image_displaying: false
        }
    }
    fn update(&mut self, ctx: &Context<Self>, msg: Self::Message) -> bool {
        match msg {
            Msg::DisplayImage(image_element) => {
                match image_element {
                    Some(element) => {
                        element.set_class_name("focus");
                        element.set_id("opened_image");
    
                        let ctx_link = ctx.link().clone();
                        let closure = EventListener::new(&element.clone(), "click", move |_| {
                            ctx_link.send_message(Msg::DisplayImage(None))
                        });
                        closure.forget();
    
                        body().append_child(&element.unchecked_into::<Node>()).expect("Node couldn't be appended into the body");   
                    }
                    None => {
                        let opened_image = document().get_element_by_id("opened_image").unwrap();
                        opened_image.remove();
                    }
                }
                self.image_displaying = !self.image_displaying;
            }
        }
        return true;
    }   
    fn view(&self, _ctx: &Context<Self>) -> Html {
        /* 
            <Window title="">
                <h3>{ "" }</h3>
                <div class="photos">
                    <div>
                        <img src={format!("{SERVER_URL}/api/photography/.jpg")}/>
                    </div>
                </div>
            </Window>
        */
        html! {
            <div class="cameraroll">
                <NavBar/>
                <Window title="camera" class="main">        
                    <h1>{ "A couple of pictures i've taken ;w;" }</h1>
                    <Window title="dress" class="vero"> 
                        <h2>{ "→ october 17, 2023" }</h2>
                        <p>{ "i bought a dress i found on my way to school and decided to see how i look in formal wear ^^" }</p>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/mirror-dress/1.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/mirror-dress/2.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/mirror-dress/3.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/mirror-dress/4.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/mirror-dress/5.jpg")}/>
                            </div>
                        </div>
                    </Window>
                    <Window title="big-ass-mayo-jar">
                        <h2>{ "yes, i drink water from a big ass mayo jar" }</h2>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/vero/big-ass-mayo-jar.jpg")}/>
                            </div>
                        </div>
                    </Window>
                    <Window title="me">
                        <h2>{ "i'm a walking oxymoron" }</h2>
                        <div class="photos">
                            <div>
                                <p>{ "ballons-love-vero.jpg" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/vero/ballons-love-me.jpg")}/>
                            </div>
                            <div>
                                <p>{ "acto 2" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/vero/bunny-ears.jpg")}/>
                            </div>
                            <div>
                                <p>{ "car-highlights.jpg" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/vero/car-highlights.jpg")}/>
                            </div>
                            <div>
                                <p>{ "this picture is a reference to a dark souls video i watched i while ago" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/vero/dark-souls.jpg")}/>
                            </div>
                            <div>
                                <p>{ "me-in-the-fucking-beach.jpg" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/vero/in-the-fucking-beach.jpg")}/>
                            </div>
                            <div>
                                <p>{ "capitulo 4: i simply- don't know" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/vero/defender/1.jpg")}/>
                            </div>
                            <div>
                                <p>{ "in fact my dear, i'm fucking terrified" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/vero/defender/2.jpg")}/>
                            </div>
                            <div>
                                <p>{ "Melanie martinez core :3" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/vero/melanie-martinez-core.jpg")}/>
                            </div>
                            <div>
                                <p>{ "old-car-peace.jpg" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/vero/old-car-peace.jpg")}/>
                            </div>
                            <div>
                                <p>{ "satanist.jpg" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/vero/satanist.jpg")}/>
                            </div>
                            <div>
                                <p>{ "Mr. Preacher man" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/vero/mr-preacher-man.jpg")}/>
                            </div>
                            <div>
                                <p>{ "parrafos; todo cambia" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/vero/right-before-exam.jpg")}/>
                            </div>
                            <div>
                                <p>{ "sand-sillhouette.jpg" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/vero/sand-sillhouette.jpg")}/>
                            </div>
                        </div>
                    </Window>
                    <Window title="milanesa">
                        <h2>{ "a couple pictures of my cat, milanesa <3" }</h2>
                        <div class="photos">
                            <div>
                                <p>{ "credits to astrom for taking the picture" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/milanesa/purple.jpg")}/>
                            </div>
                            <div>
                                <p>{ "kiss my ass milanesa, dejame trabajar porfa 😭" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/milanesa/escritorio/1.jpg")}/>
                                <img src={format!("{SERVER_URL}/api/photography/milanesa/escritorio/2.jpg")}/>
                            </div>
                        </div>
                    </Window>
                    <Window title="travel camera">
                        <h2>{ "i n t e r l u d i o" }</h2>
                        <p>{ "fotos que tomé utilizando el lente de una vieja cámara" }</p>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/old-camera-travel/1.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/old-camera-travel/2.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/old-camera-travel/3.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/old-camera-travel/4.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/old-camera-travel/5.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/old-camera-travel/6.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/old-camera-travel/7.jpg")}/>
                            </div>
                        </div>
                    </Window>
                    <Window title="lu">
                        <h2>{ "⋆ astrom ⋆" }</h2>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/lu/1.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/lu/2.jpg")}/>
                            </div>
                        </div>
                    </Window>
                    <Window title="whiteboard">
                        <h2>{ "me encantan los pizarrones !!11!" }</h2>
                        <div class="photos">
                            <div>
                                <p>{ "odio utilizar la fórmula general, pero la forma en la que se obtiene me parece bellísima ♡" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/pizarron/quadratic-formula.jpg")}/>
                            </div>
                            <div>
                                <p>{ "realizar integrales definidas utilizando la definición de Riemann es simplemente mágico ˚" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/pizarron/riemann-integral.jpg")}/>
                            </div>
                        </div>
                    </Window>
                    <Window title="soy una feminista porque ...">
                        <h2>{ "Viva México" }</h2>
                        <p>{ "El error de ser mujer" }</p>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/viva-mexico/1.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/viva-mexico/2.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/viva-mexico/3.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/viva-mexico/4.jpg")}/>
                            </div>
                        </div>
                    </Window>
                    <Window title="apple cider">
                        <h2>{ "we both like apple cider~" }</h2>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/apple-cider/1.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/apple-cider/2.jpg")}/>
                            </div>
                        </div>
                    </Window>
                    <Window title="ceramic">
                        <h2>{ "pintora de cerámica en un jardín" }</h2>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/ceramic-painter/1.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/ceramic-painter/2.jpg")}/>
                            </div> 
                        </div>
                    </Window>
                    <Window title="frens">
                        <h2>{ "christmas with friends" }</h2>
                        <p>{ "2023" }</p>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/christmas-casa-de-jengibre/1.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/christmas-casa-de-jengibre/2.jpg")}/> 
                            </div>
                        </div>
                    </Window>
                    <Window title="altoids wallet">
                        <h2>{ "making of de mi altoids wallet" }</h2>
                        <p>{ "no me gustan las carteras así que decidí hacer una utilizando altoids" }</p>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/altoids-wallet/1.jpg")}/> 
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/altoids-wallet/2.jpg")}/> 
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/altoids-wallet/3.jpg")}/> 
                            </div>
                        </div>
                    </Window>
                    <Window title="physics" class="physics">
                        <h2>{ "videos de un proyecto de física que realice" }</h2>
                        <p>{ "consiste en una versión pequeña de un holograma que utilice para proyectar un holograma de un video de Hatsune Miku jafskjaf" }</p>
                        <div class="videos">
                            <Window title="hatsune miku" buttons={1}>
                                <video controls={true}>
                                    <source src={format!("{SERVER_URL}/api/photography/physics-project/miku-hologram.mp4")} type="video/mp4"/>
                                </video>
                            </Window>
                            <Window title="vocaloid" buttons={1}>
                                <video controls={true}>
                                    <source src={format!("{SERVER_URL}/api/photography/physics-project/vocaloid-hologram.mp4")} type="video/mp4"/>
                                </video>
                            </Window>
                        </div>
                    </Window>
                    <Window title="electromecánica">
                        <h2>{ "visita al laboratorio de electromecánica de mi universidad @-@" }</h2>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/electromecanica-visita/1.jpg")}/> 
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/electromecanica-visita/2.jpg")}/> 
                            </div>
                        </div>
                    </Window>
                    <Window title="graduación">
                        <h2>{ "e p i l o g o ~ in the seek of my Great Perhaps" }</h2>
                        <p>{ "i graduated bitches" }</p>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/graduation/1.jpg")}/> 
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/graduation/2.jpg")}/> 
                            </div>
                        </div>
                    </Window>
                    <Window title="ensenada">
                        <h2>{ "fuí a Ensenada" }</h2>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/ensenada-travel/electrical-tower.jpg")}/> 
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/ensenada-travel/rocks.jpg")}/> 
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/ensenada-travel/road-signs.jpg")}/> 
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/ensenada-travel/long-road.jpg")}/> 
                            </div>
                        </div>
                    </Window>
                    <Window title="palacio cultural">
                        <h2>{ "visita al palacio de la cultura de mi ciudad" }</h2>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/palacio-cultural/palacio-de-la-cultura.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/palacio-cultural/internet-reality.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/palacio-cultural/feelings-puppets.jpg")}/>
                            </div>
                            <div>
                                <p>{ "odio." }</p>
                                <img src={format!("{SERVER_URL}/api/photography/palacio-cultural/feelings-puppets--odio.jpg")}/>
                            </div>
                            <div>
                                <p>{ "el centro" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/palacio-cultural/el-centro.jpg")}/>
                            </div>
                            <div>
                                <p>{ "policia municipal" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/palacio-cultural/policia-municipal.jpg")}/>
                            </div>
                            <div>
                                <p>{ "esto si es America." }</p>
                                <img src={format!("{SERVER_URL}/api/photography/palacio-cultural/esto-si-es-america.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/palacio-cultural/identidad-cultural-del-pueblo.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/palacio-cultural/mirror-painting/1.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/palacio-cultural/mirror-painting/2.jpg")}/>
                            </div>
                            <div>
                                <p>{ "odio bordar" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/palacio-cultural/odio-bordar/1.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/palacio-cultural/odio-bordar/2.jpg")}/>
                            </div>
                            <div>
                                <p>{ "the truth is in love" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/palacio-cultural/the-truth-is-in-love/1.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/palacio-cultural/the-truth-is-in-love/2.jpg")}/>
                            </div>
                        </div>
                    </Window>
                    <Window title="home">
                        <h2>{ "looking for a place to call home" }</h2>
                        <div class="photos">
                            <div>
                                <p>{ "desk" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/home/veros-desk.jpg")}/>
                            </div>
                            <div>
                                <p>{ "\"swear to me that everything you said about the Fireflies was true\"" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/home/swear-to-me-its-true.jpg")}/>
                            </div>
                            <div>
                                <p>
                                    <span style="margin-right: 2.5rem">{ "b l u r r e d" }</span>
                                    <span>{ "m e m o r i e s" }</span>
                                </p>
                                <img src={format!("{SERVER_URL}/api/photography/home/no-family-photos.jpg")}/>
                            </div>
                            <div>
                                <p>{ "- página 8 -" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/home/night-lamp.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/home/vela-aromatica.jpg")}/>
                            </div>
                            <div>
                                <p>
                                    <p>{ "\"Ser joven y no ser revolucionario es una contradicción hasta biológica\"" }</p>
                                    <p style="text-align: left">{ "- Salvador Allende" }</p>
                                </p>
                                <img src={format!("{SERVER_URL}/api/photography/home/progress-but-still-a-lot-to-do.jpg")}/>
                            </div>
                        </div>
                    </Window>
                    <Window title="nature">
                        <h2>{ "plants" }</h2>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/plants/coffee-table.jpg")}/>
                            </div>
                            <div>
                                <p>
                                    <span style="font-style: italic">{ "c u p i d ," }</span>
                                    { " how could you be so cruel?-" }
                                </p>
                                <img src={format!("{SERVER_URL}/api/photography/plants/cupid.jpg")}/>
                            </div>
                            <div>
                                <p>{ "i'm typing you a message that i know i'll never send, rewriting old excuses, delete the kisses at the end" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/plants/dont-delete-the-kisses-flowers/1.jpg")}/>
                            </div>
                            <div>
                                <p>{ "xoxo ♡" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/plants/dont-delete-the-kisses-flowers/2.jpg")}/>
                            </div>
                            <div>
                                <p>
                                    <p>{ "please don't say you love me" }</p>
                                    <p>{ "胸がはち切れそうで" }</p>
                                </p>
                                <img src={format!("{SERVER_URL}/api/photography/plants/dont-say-you-love-me.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/plants/window-sun.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/plants/hope-flowers.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/plants/mia-rose.jpg")}/>
                            </div>
                            <div>
                                <p>{ "raíces" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/plants/roots.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/plants/suculenta.jpg")}/>
                            </div>
                            <div>
                                <p>{ "~ preludio ~" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/plants/sunflower-letter/1.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/plants/sunflower-letter/2.jpg")}/>
                            </div>
                        </div>
                    </Window>
                    <Window title="landscapes">
                        <h2>{ "various landscapes i've visited" }</h2>
                        <div class="photos">
                            <div>
                                <p>{ "sunset" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/landscapes/beach-sillhoutte.jpg")}/>
                            </div>
                            <div>
                                <p>{ "ferris wheel" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/landscapes/fair-ferris-wheel.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/landscapes/home-lighthouse.jpg")}/>
                            </div>
                            <div>
                                <p>
                                    <p>{ "▌│█║▌ i n t e r l u d i o ║▌║▌║" }</p>
                                    <p>{ "estoy destinada a vivir en un estado constante de nostalgia por un momento que jamás existió" }</p>
                                </p>
                                <img src={format!("{SERVER_URL}/api/photography/landscapes/house-with-radio-tower.jpg")}/>
                            </div>
                            <div>
                                <p>{ "we're all small and stupid" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/landscapes/just-be-a-rock.jpg")}/>
                            </div>
                            <div>
                                <p>{ "look for the light" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/landscapes/lighthouse.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/landscapes/ocean-paper-cutout.jpg")}/>
                            </div>
                            <div>
                                <p>{ "32° 2' 34\" N 115° 54' 24\" W" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/landscapes/snow-travel--landscape.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/landscapes/snow-travel--trees.jpg")}/>
                            </div>
                            <div>
                                <p>{ "⎯⎯ ୨ wandering ୧ ⎯⎯ creo que he perdido la página" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/landscapes/yellow-sunset.jpg")}/>
                            </div>
                            <div>
                                <p>{ "capitulo 6; loveless" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/landscapes/i-see-you-island.jpg")}/>
                            </div>
                            <div>
                                <p>
                                    <p>{ "❜ ─ párrafos, cambio ─ ❛" }</p>
                                    <p>{ "∆ : en matemáticas delta se utiliza para representar el cambio de una variable, se hace una diferencia entre el estado final e inicial para observar cuánto ha cambiado" }</p>
                                </p>
                                <img src={format!("{SERVER_URL}/api/photography/landscapes/house-with-water-well.jpg")}/>
                            </div>
                        </div>
                    </Window>
                    <Window title="photo mode">
                        <h2>{ "pictures i've taken using photo mode" }</h2>
                        <div class="photos">
                            <div>
                                <p>{ "Liars." }</p>
                                <img src={format!("{SERVER_URL}/api/photography/photo-mode/liars.jpg")}/>
                            </div>
                            <div>
                                <p>{ "there is no light" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/photo-mode/no-light.jpg")}/>
                            </div>
                            <div>
                                <p>{ "we tortured" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/photo-mode/choked-on-their-own-blood.jpg")}/>
                            </div>
                            <div>
                                <p>{ "wept." }</p>
                                <img src={format!("{SERVER_URL}/api/photography/photo-mode/the-last-one-cried.jpg")}/>
                            </div>
                            <div>
                                <p>{ "wolfs will get you" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/photo-mode/wolfs.jpg")}/>
                            </div>
                            <div>
                                <p>{ "Hillcrest" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/photo-mode/hillcrest.jpg")}/>
                            </div>
                            <div>
                                <p>{ "strings" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/photo-mode/strings.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/photo-mode/dina-and-ellie.jpg")}/>
                            </div>
                            <div>
                                <p>{ "Umbrella." }</p>
                                <img src={format!("{SERVER_URL}/api/photography/photo-mode/umbrella.jpg")}/>
                            </div>
                        </div>
                    </Window>
                    <Window title="other">
                        <h2>{ "efímero" }</h2>
                        <div class="photos">
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/amar-es-todo-lo-que-tengo.jpg")}/>
                            </div>
                            <div>
                                <p>{ "i'll worship like a dog at the shrine of your lies" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/altar.jpg")}/>
                            </div>
                            <div>
                                <p>{ "why do you write like you're running out of time?" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/clock.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/marcha-pride-2024.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/miku-fiesta.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/school-onestep-polaroid.jpg")}/>
                            </div>
                            <div>
                                <p>{ "tqm mucho <3" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/kirby.jpg")}/>
                            </div>
                            <div>
                                <p>{ "is the Moon still in love with the Sun?" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/moon.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/school-ramen.jpg")}/>
                            </div>
                            <div>
                                <p>{ "me rehusó a dejarlos ir" }</p>
                                <img src={format!("{SERVER_URL}/api/photography/wont-let-shoes-go.jpg")}/>
                            </div>
                            <div>
                                <p>{ "veleros." }</p>
                                <img src={format!("{SERVER_URL}/api/photography/summer-sale-postal.jpg")}/>
                            </div>
                            <div>
                                <img src={format!("{SERVER_URL}/api/photography/culos-de-lectura.jpg")}/>
                            </div>
                        </div>
                    </Window>
                </Window>
            </div>
        }
    }
    fn rendered(&mut self, ctx: &Context<Self>, first_render: bool) {
        if first_render {
            let elements_list = document().query_selector_all(".cameraroll .main .window .body .photos > div").unwrap();
            
            for i in 0..elements_list.length() {
                let image_element = elements_list.item(i).unwrap().unchecked_into::<HtmlElement>();
                
                let ctx_link = ctx.link().clone();
                let closure = EventListener::new(&image_element.clone(), "click", move |_| {
                    let cloned_element = image_element.clone_node_with_deep(true).unwrap().unchecked_into::<HtmlElement>();
                    ctx_link.send_message(Msg::DisplayImage(Some(cloned_element)))
                });
                closure.forget();
            }
        }
    } 
}