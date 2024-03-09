use yew::prelude::*;

#[derive(PartialEq, Properties)]
pub struct WindowProps {
    pub title: String,
    pub class: String,
    #[prop_or(0)]
    pub buttons: u32,
    pub children: Html, 
}

#[function_component(Window)]
pub fn window(props: &WindowProps) -> Html {
    html! {
        <div class={ format!("window {}", props.class.clone()) }>  
            <div class="titlebar">
                <div class="titlebar__text">{ props.title.clone() }</div>
                {
                    match props.buttons.clone() {
                        1 => {
                            html! {
                                <div class="titlebar__buttons">

                                    <button class="titlebar__button--close">{ "x" }</button>
                                </div>
                            }
                        }
                        2 => {
                            html! {
                                <div class="titlebar__buttons">
                                    <button class="titlebar__button--minimize">{ "-" }</button>
                                    <button class="titlebar__button--close">{ "x" }</button>
                                </div>
                            }
                        }
                        3 | _ => {
                            html! {
                                <div class="titlebar__buttons">
                                    <button class="titlebar__button--minimize">{ "-" }</button>
                                    <button class="titlebar__button--maximize">{ "O" }</button>
                                    <button class="titlebar__button--close">{ "x" }</button>
                                </div>
                            }
                        }
                    }
                }
                
            </div>
            <div class="window__body">
                { props.children.clone() }
            </div>
        </div>
    }
}