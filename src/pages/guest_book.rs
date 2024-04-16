use yew::prelude::*;
use crate::components::nav_bar::NavBar;
use crate::components::window::Window;

#[function_component(GuestBook)]
pub fn guest_book() -> Html {
    html! {
        <div class="guestbook">
            <NavBar/>
            <Window title="guestsss" class="main">        
                <h1>{ "sign here!!!!" }</h1>
            </Window>
        </div>
    }
}