use yew::prelude::*;

#[derive(PartialEq, Properties)]
pub struct WindowProps {
  #[prop_or("".to_string())]
  pub title: String,
  #[prop_or("".to_string())]
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
        <div class="text">{ props.title.clone() }</div>
        {
          match props.buttons.clone() {
            1 => {
              html! {
                <div class="buttons">
                  <button class="button--close">{ "x" }</button>
                </div>
              }
            }
            2 => {
              html! {
                <div class="buttons">
                  <button class="button--minimize">{ "-" }</button>
                  <button class="button--close">{ "x" }</button>
                </div>
              }
            }
            3 | _ => {
              html! {
                <div class="buttons">
                  <button class="button--minimize">{ "-" }</button>
                  <button class="button--maximize">{ "O" }</button>
                  <button class="button--close">{ "x" }</button>
                </div>
              }
            }
          }
        }
        </div>
      <div class="body">
        { props.children.clone() }
      </div>
    </div>
  }
}