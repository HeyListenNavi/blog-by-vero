use yew::prelude::*;

#[function_component(SideBar)]
pub fn side_bar() -> Html {
    html! {
        <div class="sidebar--home">
            <p>{ "Side bar :3" }</p>
        </div>
    }
}