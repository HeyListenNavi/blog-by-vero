use yew::prelude::*;
use yew_router::prelude::*;
use crate::Route;

#[function_component(NavBar)]
pub fn nav_var() -> Html {
    html! {
        <nav class="navbar">
            <Link<Route> to={Route::Home}>{ "Home" }</Link<Route>>
            <Link<Route> to={Route::AboutMe}>{ "About me" }</Link<Route>>
            <Link<Route> to={Route::Diary}>{ "Diary" }</Link<Route>>
            <Link<Route> to={Route::GuestBook}>{ "Guestbook" }</Link<Route>>
            <Link<Route> to={Route::Links}>{ "Links" }</Link<Route>>
            <Link<Route> to={Route::CameraRoll}>{ "Cameraroll" }</Link<Route>>
        </nav> 
    }
}