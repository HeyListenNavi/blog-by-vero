use yew::prelude::*;

#[function_component(NotFound)]
pub fn not_found() -> Html {
    html! {
        <h1>{ "Whoops, you weren't supposed to be here ;-;" }</h1>
    }
}