use crate::components::window::Window;
use yew::prelude::*;

#[function_component(SideBar)]
pub fn side_bar() -> Html {
    html! {
        <Window title="vero's bar" class="sidebar" buttons={1}>
            <h3>{ "sidebar :3" }</h3>
        </Window>
    }
}