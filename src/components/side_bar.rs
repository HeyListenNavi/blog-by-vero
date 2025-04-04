use crate::components::window::Window;
use yew::prelude::*;
use common::SERVER_ADDRESS;

#[function_component(SideBar)]
pub fn side_bar() -> Html {
    html! {
        <Window title="bar" class="sidebar" buttons={1}>
            <div class="content">
                <p>{ "hey listen!!1!" }</p>
                <p>
                    { "i made this mostly during nights which means the site might contain a lot of bugs, and it's probably best to view this site in your computer, feel free to send me a message if you encounter any interesting things." }
                    <br/>
                    { "with love, navi!" }
                </p>
            </div>
            <div class="decorations">
                <div class="blinkies">
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/addicted-to-the-internet.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/i-love-css.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/i-pirate-movies.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/geek-girls-kick-ascii.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/i-think-therefore-i-am.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/lesbian-pride.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/miku-pls-interact.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/nintendo-ds-lover.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/the-last-of-us.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/twilight-sparkle.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/i-glow-pink-in-the-night.webp")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/i-love-pink.webp")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/transfem.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/mitski-cd.webp")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/ive-kissed-you-before.webp")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/blinkies/i-love-girls.webp")}/>
                </div>
                <div class="buttons">
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/buttons/made-with-css.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/buttons/trans-rights-now.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/buttons/neocities-the-web-is-yours.gif")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/buttons/glados.webp")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/buttons/wii.png")}/>
                    <img loading="lazy" src={format!("{SERVER_ADDRESS}/api/assets/buttons/sparkling-eyes.gif")}/>
                </div>
            </div>
            <div class="comments">
                <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">{ "Comment Box " }</a>{ "loading comments..." }</div>
            </div>
        </Window>
    }
}