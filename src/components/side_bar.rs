use yew::prelude::*;
use crate::components::window::Window;

#[function_component(SideBar)]
pub fn side_bar() -> Html {
    html! {
        <Window title="vero's bar" class="sidebar--home" buttons={1}>
            <h3>{ "sidebar :3" }</h3>
        </Window>    
    }
}