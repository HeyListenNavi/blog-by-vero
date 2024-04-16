use yew::prelude::*;
use crate::components::nav_bar::NavBar;
use crate::components::window::Window;

#[function_component(Links)]
pub fn links() -> Html {
    html! {
        <div class="links">
            <NavBar/>
            <Window title="contact me" class="main">        
                <h1>{ "rANDOM links :p" }</h1>
            </Window>
        </div>
    }
}