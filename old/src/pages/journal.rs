use yew::prelude::*;
use crate::components::decorations_bar::DecoBar;
use crate::components::nav_bar::NavBar;
use crate::components::window::Window;
use crate::components::posts_list::PostsList;

#[function_component(Journal)]
pub fn journal() -> Html {
    html! {
        <div class="journal">
            <NavBar/>
            <DecoBar/>
            <Window title="Journal !!!" class="main">        
                <h1>{ "This is my journal <3" }</h1>
                <h2>{ "pwap" }</h2>
                <PostsList/>
            </Window>
        </div>
    }
}