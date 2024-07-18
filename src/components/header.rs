use yew::prelude::*;
use crate::components::window::Window;

#[function_component(Header)]
pub fn header() -> Html {
    html! {
        <Window class="header" buttons={3}>
            <div class="title">
                <span>{ "i think we can put our differences behind us" }</span>
                <h1>{ "for science, you monster" }</h1>
            </div>
        </Window>
    }
}