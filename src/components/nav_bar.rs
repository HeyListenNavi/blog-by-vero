use yew::prelude::*;
use yew_router::prelude::*;
use crate::app::Route;
use crate::components::window::Window;
use common::SERVER_URL;

#[function_component(NavBar)]
pub fn nav_var() -> Html {
    html! {
        <Window title="sailing boat" class="navbar" buttons={1}>
            <div class="content">
                <div class="title">
                    <h3>{ "navi-gation :0" }</h3>
                </div>
                <ul>
                    <li>
                        {html!( <Link<Route> to={Route::Home}>{ "Home" }</Link<Route>> )}
                    </li>
                    <li>
                        {html!( <Link<Route> to={Route::AboutMe}>{ "About me" }</Link<Route>> )}
                    </li>
                    <li>
                        {html!( <Link<Route> to={Route::Journal}>{ "Journal" }</Link<Route>> )}
                    </li>
                    <li>
                        {html!( <Link<Route> to={Route::CameraRoll}>{ "Cameraroll" }</Link<Route>> )}
                    </li>
                </ul>
            </div>
            <div class="decorations">
                <div class="blinkies">
                    <img src={format!("{SERVER_URL}/api/assets/blinkies/trans-lesbians.gif")}/>
                    <img src={format!("{SERVER_URL}/api/assets/blinkies/bring-up-my-post.gif")}/>
                    <img src={format!("{SERVER_URL}/api/assets/blinkies/i-view-source.gif")}/>
                    <img src={format!("{SERVER_URL}/api/assets/blinkies/mitski.webp")}/>
                    <img src={format!("{SERVER_URL}/api/assets/blinkies/bubblegum-bitch.gif")}/>
                    <img src={format!("{SERVER_URL}/api/assets/blinkies/reflection-of-venus.gif")}/>
                </div>
                <div class="stamps">
                    <img src={format!("{SERVER_URL}/api/assets/stamps/404-not-found.gif")}/>
                    <img src={format!("{SERVER_URL}/api/assets/stamps/gameboy.gif")}/>
                    <img src={format!("{SERVER_URL}/api/assets/stamps/nintendo-64-record.gif")}/>
                </div>
                <div class="buttons">
                    <img src={format!("{SERVER_URL}/api/assets/buttons/best-viewed-with-eyes.gif")}/>
                    <img src={format!("{SERVER_URL}/api/assets/buttons/web-design-passion.gif")}/>
                    <img src={format!("{SERVER_URL}/api/assets/buttons/ao3-freak.gif")}/>
                    <img src={format!("{SERVER_URL}/api/assets/buttons/parental-advisory.gif")}/>
                    <img src={format!("{SERVER_URL}/api/assets/buttons/queer-coded.jpg")}/>
                    <img src={format!("{SERVER_URL}/api/assets/buttons/virtual-diva.jpg")}/>
                </div>
                <img src={format!("{SERVER_URL}/api/assets/feel-free-to-make-out.jpg")}/>
            </div>
        </Window>
    }
}