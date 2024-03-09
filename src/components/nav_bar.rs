use yew::prelude::*;
use yew_router::prelude::*;
use crate::Route;
use crate::components::window::Window;

#[function_component(NavBar)]
pub fn nav_var() -> Html {
    html! {
        <Window title="Vero's sailing boat" class="navbar" buttons={1}>
            <ul>
                <li>
                    <h3>{ "navigation :0" }</h3>
                </li>
                <li>
                    <Link<Route> to={Route::Home}>{ "Home" }</Link<Route>>
                </li>
                <li>
                    <Link<Route> to={Route::AboutMe}>{ "About me" }</Link<Route>>
                </li>
                <li>
                    <Link<Route> to={Route::Diary}>{ "Diary" }</Link<Route>>
                </li>
                <li>
                    <Link<Route> to={Route::GuestBook}>{ "Guestbook" }</Link<Route>>
                </li>
                <li>
                    <Link<Route> to={Route::Links}>{ "Links" }</Link<Route>>
                </li>
                <li>
                    <Link<Route> to={Route::CameraRoll}>{ "Cameraroll" }</Link<Route>>
                </li>
            </ul>
        </Window>
   }
}