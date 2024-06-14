use yew::prelude::*;
use yew_router::prelude::*;
use crate::app::Route;

#[function_component(NotFound)]
pub fn not_found() -> Html {
    html! (
        <div class="notfound">
            <h1>{ "Whoops, you weren't supposed to be here ;-;" }</h1>
            <Link<Route> to={Route::Home}>{ "← go home" }</Link<Route>>
        </div>
    )
}