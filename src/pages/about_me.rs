use yew::prelude::*;
use crate::components::nav_bar::NavBar;
use crate::components::window::Window;

#[function_component(AboutMe)]
pub fn about_me() -> Html {
    html! {
        <div class="aboutme">
            <NavBar/>
            <Window title="About me" class="main">        
                <h1>{ "About me :3" }</h1>
            </Window>
        </div>
    }
}