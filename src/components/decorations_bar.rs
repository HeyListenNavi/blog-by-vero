use yew::prelude::*;
use crate::components::window::Window;
use common::SERVER_ADDRESS;

#[function_component(DecoBar)]
pub fn decorations_var() -> Html {
    html! {
        <Window title="deco bar" class="decobar" buttons={1}>
            <div class="decorations">
                <div class="blinkies">
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/trans-lesbians.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/bring-up-my-post.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/i-view-source.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/mitski.webp")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/bubblegum-bitch.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/reflection-of-venus.gif")}/>
                </div>
                <div class="stamps">
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/stamps/404-not-found.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/stamps/gameboy.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/stamps/nintendo-64-record.gif")}/>
                </div>
                <div class="buttons">
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/buttons/best-viewed-with-eyes.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/buttons/web-design-passion.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/buttons/ao3-freak.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/buttons/parental-advisory.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/buttons/queer-coded.jpg")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/buttons/virtual-diva.jpg")}/>
                </div>
                <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/feel-free-to-make-out.jpg")}/>
            </div>
        </Window>
    }
}