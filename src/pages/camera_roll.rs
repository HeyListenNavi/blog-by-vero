use yew::prelude::*;
use crate::components::nav_bar::NavBar;
use crate::components::window::Window;

#[function_component(CameraRoll)]
pub fn camera_roll() -> Html {
    html! {
        <div class="cameraroll">
            <NavBar/>
            <Window title="camera" class="main">        
                <h1>{ "A couple of pictures i've taken ;w;" }</h1>
            </Window>
        </div>
    }
}