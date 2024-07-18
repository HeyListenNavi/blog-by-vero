use crate::components::window::Window;
use yew::prelude::*;

#[function_component(SideBar)]
pub fn side_bar() -> Html {
    html! {
        <Window title="bar" class="sidebar" buttons={1}>
            <p>{ "hey listen!!1!" }</p>
            <p>{ "i made this mostly during nights which means the site might contain a lot of bugs, and it's probably best to view this site in your computer, feel free to send me a message if you encounter any interesting things. with love, navi!" }</p>
        </Window>
    }
}