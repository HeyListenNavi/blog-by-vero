use yew::prelude::*;

use crate::components::nav_bar::NavBar;
use crate::components::window::Window;
use crate::components::posts_list::PostsList;

#[function_component(Diary)]
pub fn diary() -> Html {
    let fallback = html! {<div>{"Loading..."}</div>};

    html! {
        <div class="diary">
            <NavBar/>
            <Window title="Diary !!!" class="main">        
                <h1>{ "This is my diary <3" }</h1>
                <h2>{ "pwap" }</h2>
                <Suspense {fallback}>
                    <PostsList/>
                </Suspense>
            </Window>
        </div>
    }
}