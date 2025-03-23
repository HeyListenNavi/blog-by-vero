use yew::prelude::*;
use crate::components::window::Window;

#[function_component(Header)]
pub fn header() -> Html {
    html! {
        <Window class="header" buttons={3}>
            <div class="text">
                <div class="subtitle">
                    <span>{ "i " }</span>
                    <span>{ "think " }</span>
                    <span>{ "we " }</span>
                    <span>{ "can " }</span>
                    <span>{ "put " }</span>
                    <span>{ "our " }</span>
                    <span>{ "differences " }</span>
                    <span>{ "behind " }</span>
                    <span>{ "us" }</span>
                </div>
                <div class="title">
                    <span>{ "for " }</span>
                    <span>{ "science, " }</span>
                    <span>{ "you " }</span>
                    <span>{ "monster" }</span>
               </div>
            </div>
        </Window>
    }
}