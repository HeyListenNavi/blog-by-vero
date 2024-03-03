use yew::prelude::*;
use crate::components::side_bar::SideBar;

#[function_component(Home)]
pub fn home() -> Html { 
    html! {
        <>
            <SideBar/>
            <div class="main--home">
                <h1>{ "Home" }</h1>
            </div>
        </>
    }
}