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
                        <div class="content">
                            <Window title="i love amy" buttons={1}>
                                <img src={format!("{SERVER_URL}/api/assets/amy-icon.webp")}/>
                            </Window>
                            <div>
                                <h1 class="title">{ "this is home" }</h1>
                                <p>
                                    { "Hello! welcome to my site." }
                                    <br/>
                                    { "My name is Verónica, this is where i usually share my thoughts, interests, and things i've been doing haha, i'm currently a cs student that wants to learn way too many things." }
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="more-description">
                        <Window title="old home" buttons={1}>
                            <video controls={true}>
                                <source src="assets/home-video.mp4" type="video/mp4"/>
                            </video>
                        </Window>
                        <div>
                            <h2>{ "∑ short about me" }</h2>
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