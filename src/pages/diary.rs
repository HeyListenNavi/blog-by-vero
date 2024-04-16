use yew::prelude::*;
use crate::components::nav_bar::NavBar;
use crate::components::window::Window;

#[function_component(Diary)]
pub fn diary() -> Html {
    html! {
        <div class="diary">
            <NavBar/>
            <Window title="Diary !!!" class="main">        
                <h1>{ "This is my diary <3" }</h1>
            </Window>
        </div>
    }
}