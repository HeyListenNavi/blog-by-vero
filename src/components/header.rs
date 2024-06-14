use yew::prelude::*;
use crate::components::window::Window;

#[function_component(Header)]
pub fn header() -> Html {
    html! {
        <Window title="vero's place" class="header" buttons={3}>
            <p>{ "cooole png :O" }</p>
        </Window>
    }
}