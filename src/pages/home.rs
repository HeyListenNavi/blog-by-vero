use yew::prelude::*;
use crate::components::header::Header;
use crate::components::nav_bar::NavBar;
use crate::components::side_bar::SideBar;
use crate::components::window::Window;
use crate::components::decorations_bar::DecoBar;
use gloo_utils::{window, document, head};
use urlencoding::encode;
use web_sys::Node;
use wasm_bindgen::JsCast;
use common::SERVER_ADDRESS;

pub struct Home;

impl Component for Home {
    type Message = ();
    type Properties = ();

    fn create(ctx: &Context<Self>) -> Self {
        return Self
    }

    fn view(&self, _ctx: &Context<Self>) -> Html {
        html! {
            <div class="home">
                <Header/>
                <NavBar/>
                <DecoBar/>
                <SideBar/>
                <Window title="vero's place" class="main">
                    <div class="description">
                        <Window title="i love amy" buttons={1}>
                            <img src={format!("{SERVER_ADDRESS}/api/assets/amy-icon.webp")}/>
                        </Window>
                        <div class="content">
                            <h1 class="title">{ "this is home" }</h1>
                            <p>
                                { "→ You've met with a terrible fate, haven't you?" }
                                <br/>
                                <br/>
                                { "Welcome to my blog! my name is Verónica, i'm currently a computer science student who wants to learn way too many things and has way too many \"to do projects\", i'm a woman who loves to make things her own, either by making them herself or customizing them, i often feel like it's a weird way of self-expression i've developed." }
                                <br/>
                                { "i love musicals, particle physics, math, programming, electronics, videogames, and much more stuff you can read about in my \"about me\" page :3" }
                            </p>
                        </div>
                    </div>
                    
                    <div class="divider"></div>

                    <div class="description--site">
                        <h2>{ "about the site" }</h2>
                        <div class="content">
                            <Window title="old home" buttons={1}>
                                <video controls={true}>
                                    <source src="assets/home-video.mp4" type="video/mp4"/>
                                </video>
                            </Window>
                            <p>
                                { "i really enjoy browsing sites in neocities, so when i saw people were making their own websites for fun, i got inspired by a few different sites that i found and decided to make my own after instagram didn't let me upload a couple photos i had taken (ctm instagram 🖕) and so this website was made as a way to store thoughts, writings, pictures, and other stuff that i'd usually upload to social media." }
                            </p>
                        </div>
                        <div class="content">
                            <p>
                                { "i made the website unnecessarily complicated so i could not only have fun making it, but also learn to get more comfortable using the Rust programming language." }
                                <br/>
                                { "i love Rust, it's been the main programming language i use and i just wanted to implement it into this project too, so when i found that you could use WebAssembly to create websites and much more, i just had to use it, in order to make this a bit easier, i used the Yew framework to make the frontend." }
                                <br/>
                                { "as for the backend, i decided to make a simple server that would store various assets and the posts of my journal in Markdown and turn them into HTML when requested, although i'm planning to add much more things to it. this was done using the Actix Web framework, again... in Rust." }
                            </p>
                            <Window title="rust" buttons={1}>
                                <img src={format!("{SERVER_ADDRESS}/api/assets/project-statistics.png")}/>
                            </Window>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="quote">
                        <img src={format!("{SERVER_ADDRESS}/api/assets/reflection-of-venus.png")}/>
                        <div class="content">
                            <h2>{ "i'm a reflection of venus" }</h2>
                            <p>{ "\"The Barbie dolls played off reflection of Venus.\"" }</p>
                            <p>{ "- Kendrick Lamar Duckworth" }</p>
                        </div>
                    </div>
                    
                    <div class="divider"></div>

                    <div class="experience">
                        <h2>{ "BUILD YOUR OWN SITEEE" }</h2>
                        <p>
                            { "overall, it was a pretty interesting experience, and i believe i learned a lot from this, i think everyone should try to make their own website if they have time, specially if you're a fan of the indie web, profile customization, and things like that" }
                        </p>
                    </div>

                    <div class="divider"></div>
                    
                    <div class="more-description">
                        <Window title="∑ the sum of all" buttons={1}>
                            <img src={format!("{SERVER_ADDRESS}/api/assets/retro-computer.png")}/>
                        </Window>
                        <div class="content">
                            <h2>{ "my integral self" }</h2>
                            <ul>
                                <li>
                                    <span>{ "name: Verónica, Vero, Veru, Navi" }</span>
                                </li>
                                <li>
                                    <span>{ "sign: capricorn !!" }</span>
                                </li>
                                <li>
                                    <span>{ "mbti: infp" }</span>
                                </li>
                                <li>
                                    <span>{ "age: nineteen" }</span>
                                </li>
                                <li>
                                    <span>{ "birthday: late january " }</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="decorations">
                        <h2>{ "visit these too :D" }</h2>
                        <div class="content">
                            <p>
                                { "a list of buttons from various sites i find interesting and also inspired me to make this website" }
                                <br/>
                                { "and if you liked my website feel free to use my button!" }
                            </p>
                            <div class="buttons">
                                <a href="https://hillhouse.neocities.org">
                                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/hillhouse.png")}/>
                                </a>
                                <a href="https://errormine.net/">
                                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/errormine.gif")}/>
                                </a>
                                <a href="https://thegardenofmadeline.neocities.org/pages/foreverandalways">
                                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/garden-of-madeline.gif")}/>
                                </a>
                                <a href="https://ilovebeingtrans.neocities.org/">
                                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/i-love-being-trans.png")}/>
                                </a>
                                <a href="https://32bit.cafe/">
                                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/32-bits-pcb.png")}/>
                                </a>
                                <a href="https://cabbagesorter.neocities.org/">
                                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/cabbage-sorter.gif")}/>
                                </a>
                                <a href="https://cloverbell.neocities.org/">
                                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/cloverbell.gif")}/>
                                </a>
                                <a href="https://lostlove.neocities.org/">
                                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/lunospace.gif")}/>
                                </a>
                                <a href="https://oklama.com/">
                                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/nu-thoughts.jpg")}/>
                                </a>
                            </div>
                        </div>
                        <div class="save">
                            <span>{ "→" }</span>
                            <p>
                                { "to use my button in your own website you can use this code and remember to download the button and upload it to your own website!!" }
                            </p>
                            <span>{ "←" }</span>
                        </div>
                        <div class="buttons">
                            <code>
                                { "<a href=\"https://heylistennavi.neocities.org/\"><img src=\"IMAGE_PATH\" width=\"88\" height=\"31\" alt=\"vero's site button\" style=\"image-rendering: pixelated\"></img></a>" }
                            </code>
                            <a href="https://heylistennavi.neocities.org/">
                                <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/veros-site.gif")}/>
                            </a>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="quote">
                        <div class="content">
                            <p>{ "\"No convierto la sangre en vino pero me lo sé beber, no creo en lo divino pero sí en la mujer.\"" }</p>
                            <p>{ "- Laura Arroyo Gárate" }</p>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="sponsor">
                        <Window title="ilysm gaby" buttons={1}>
                            <img src={format!("{SERVER_ADDRESS}/api/assets/gaby.jpg")}/>
                        </Window>
                        <div class="content">
                            <p>
                                { "this blog was oficially brought with the help of our sponsor" }
                                <br/>
                                <br/>
                                { "*drumroll*" }
                            </p>
                            <a href="https://www.instagram.com/i_stole_your_bacon12/">{ "GABYYY" }</a>
                            <p>
                                { "thank you so much gaby for always being there as the good friend you are and for your five bucks" }
                            </p>
                        </div> 
                    </div>
                </Window>
            </div>
        }
    }

    fn rendered(&mut self, _ctx: &Context<Self>, first_render: bool) {
        if first_render {
            let location = window().location().href().unwrap();
            let window_location_filtered = encode(location.as_str()).into_owned();
            
            let src = format!("https://www.htmlcommentbox.com/jread?page={window_location_filtered}&mod=%241%24wq1rdBcg%24lY61U0cSNderaAvNo.3e0%2F&opts=16798&num=10&ts=1722650541155");
            
            let script_element = document().create_element("script").expect("Expected to create script element");
            script_element.set_attribute("type", "text/javascript").expect("Expected to set type attribute to \"text/javascript\"");
            script_element.set_attribute("src", src.as_str()).expect("Expected to set the source of the script element to the link provided by HtmlCommentBox");
    
            head().append_child(&script_element.unchecked_into::<Node>()).expect("Expected to append script element into head element");
        }
    }
}