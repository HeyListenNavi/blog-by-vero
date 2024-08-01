use crate::components::window::Window;
use yew::prelude::*;
use common::SERVER_ADDRESS;

#[function_component(SideBar)]
pub fn side_bar() -> Html {
    let server_address_filtered = SERVER_ADDRESS.replace(":", "%3A").replace("/", "%2F");
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
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/addicted-to-the-internet.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/i-love-css.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/i-pirate-movies.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/geek-girls-kick-ascii.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/i-think-therefore-i-am.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/lesbian-pride.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/miku-pls-interact.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/nintendo-ds-lover.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/the-last-of-us.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/twilight-sparkle.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/i-glow-pink-in-the-night.webp")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/i-love-pink.webp")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/transfem.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/mitski-cd.webp")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/ive-kissed-you-before.webp")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/blinkies/i-love-girls.webp")}/>
                </div>
                <div class="buttons">
                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/made-with-css.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/trans-rights-now.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/neocities-the-web-is-yours.gif")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/glados.webp")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/wii.png")}/>
                    <img src={format!("{SERVER_ADDRESS}/api/assets/buttons/sparkling-eyes.gif")}/>
                </div>
            </div>
            <div class="comments">
                <script type="text/javascript" src={format!("https://www.htmlcommentbox.com/jread?page={server_address_filtered}&mod=%241%24wq1rdBcg%24X3OvKZEBYF.ZF%2FQAZxJql1&opts=16798&num=10&ts=1722071580458")}></script>
                <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">{ "Comment Box " }</a>{ "loading comments..." }</div>
            </div>
        </Window>
    }
}