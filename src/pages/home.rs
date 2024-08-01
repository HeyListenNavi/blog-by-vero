use yew::prelude::*;
use crate::components::header::Header;
use crate::components::nav_bar::NavBar;
use crate::components::side_bar::SideBar;
use crate::components::window::Window;
use common::SERVER_URL;

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
                <SideBar/>
                <Window title="vero's place" class="main">
                    <div class="description">
                        <Window title="i love amy" buttons={1}>
                            <img src={format!("{SERVER_URL}/api/assets/amy-icon.webp")}/>
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
                                <img src={format!("{SERVER_URL}/api/assets/project-statistics.png")}/>
                            </Window>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="quote">
                        <img src={format!("{SERVER_URL}/api/assets/reflection-of-venus.png")}/>
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
                            { "overall, it was a pretty interesting experience, and i believe i learned a lot from this, i think everyone should try to make their own website if they have time, specially if you're a fan of the old web, profile customization, and things like that" }
                        </p>
                    </div>

                    <div class="divider"></div>
                    
                    <div class="more-description">
                        <Window title="∑ the sum of all" buttons={1}>
                            <img src={format!("{SERVER_URL}/api/assets/retro-computer.png")}/>
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
                </Window>
            </div>
        }
    }
}