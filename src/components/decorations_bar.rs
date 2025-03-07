use yew::prelude::*;
use crate::components::window::Window;
use common::SERVER_ADDRESS;

#[function_component(DecoBar)]
pub fn decorations_var() -> Html {
    html! {
        <Window title="deco bar" class="decobar" buttons={1}>
            <div class="decorations">
                <div class="blinkies">
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/trans-lesbians.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/bring-up-my-post.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/i-view-source.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/mitski.webp")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/bubblegum-bitch.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/reflection-of-venus.gif")}/>
                </div>
                <div class="stamps">
                    <img src={format!("{SERVER_ADDRESS}/api/assets/stamps/404-not-found.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/stamps/gameboy.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/stamps/nintendo-64-record.gif")}/>
                </div>
                <div class="buttons">
                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/best-viewed-with-eyes.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/web-design-passion.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/ao3-freak.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/parental-advisory.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/queer-coded.jpg")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/virtual-diva.jpg")}/>
                </div>
                <img src={format!("{SERVER_ADDRESS}/api/assets/feel-free-to-make-out.jpg")}/>
            </div>
        </Window>
    }
}