use yew::prelude::*;
use yew_router::prelude::*;

use crate::pages::about_me::AboutMe;
use crate::pages::camera_roll::CameraRoll;
use crate::pages::diary::Diary;
use crate::pages::post::Post;
use crate::pages::guest_book::GuestBook;
use crate::pages::home::Home;
use crate::pages::links::Links;
use crate::pages::not_found::NotFound;

#[derive(Clone, Routable, PartialEq)]
pub enum Route {
    #[at("/")]
    Home,
    #[at("/about-me")]
    AboutMe,
    #[at("/diary")]
    Diary,
    #[at("/post/:post_title")]
    Post { post_title: String },
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
        Route::Post { post_title } => html! { <Post title={post_title}/> },
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
                <Switch<Route> render={switch}/>
            </BrowserRouter>
        </>
    }
}