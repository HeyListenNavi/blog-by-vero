use yew::prelude::*;
use yew_router::prelude::*;
use crate::app::Route;
use crate::components::window::Window;

#[function_component(NavBar)]
pub fn nav_var() -> Html {
    html! (
        <Window title="sailing boat" class="navbar" buttons={1}>
            <h3>{ "navi-gation :0" }</h3>
            <ul>
                <li>
                    <Link<Route> to={Route::Home}>{ "Home" }</Link<Route>>
                </li>
                <li>
                    <Link<Route> to={Route::AboutMe}>{ "About me" }</Link<Route>>
                </li>
                <li>
                    <Link<Route> to={Route::Journal}>{ "Journal" }</Link<Route>>
                </li>
                <li>
                    <Link<Route> to={Route::CameraRoll}>{ "Cameraroll" }</Link<Route>>
                </li>
            </ul>
        </Window>
    )
}