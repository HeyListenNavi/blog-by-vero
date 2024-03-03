use yew::prelude::*;
use yew_router::prelude::*;

mod pages;
mod components;

use pages::home::Home;
use pages::about_me::AboutMe;
use pages::diary::Diary;
use pages::guest_book::GuestBook;
use pages::links::Links;
use pages::camera_roll::CameraRoll;
use pages::not_found::NotFound;
use components::header::Header;
use components::nav_bar::NavBar;

#[derive(Clone, Routable, PartialEq)]
enum Route {
    #[at("/")]
    Home,
    #[at("/about-me")]
    AboutMe,
    #[at("/diary")]
    Diary,
    #[at("/guest-book")]
    GuestBook,
    #[at("/links")]
    Links,
    #[at("/camera-roll")]
    CameraRoll,
    #[not_found]
    #[at("/404")]
    NotFound,
}

fn switch(routes: Route) -> Html {
    match routes {
        Route::Home => html! { <Home/> },
        Route::AboutMe => html! { <AboutMe/> },
        Route::Diary => html! { <Diary/> },
        Route::GuestBook => html! { <GuestBook/> },
        Route::Links => html! { <Links/> },
        Route::CameraRoll => html! { <CameraRoll/> }, 
        Route::NotFound => html! { <NotFound/> },
    }
}

#[function_component(App)]
pub fn app() -> Html {
    html! {
        <>
            <BrowserRouter>
                <Header/>
                <NavBar/>
                <Switch<Route> render={switch}/>
            </BrowserRouter>
        </>
    }
}