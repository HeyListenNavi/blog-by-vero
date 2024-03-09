use yew::prelude::*;
use crate::components::header::Header;
use crate::components::nav_bar::NavBar;
use crate::components::side_bar::SideBar;
use crate::components::window::Window;

#[function_component(Home)]
pub fn home() -> Html { 
    html! {
        <div class="home">
            <Header/>
            <NavBar/>
            <SideBar/>
            <Window title="vero's home" class="main--home">
                <h1>{ "this is home" }</h1>
            </Window>
        </div>
    }
}