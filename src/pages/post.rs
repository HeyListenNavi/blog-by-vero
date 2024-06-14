use yew::prelude::*;
use yew_router::prelude::*;
use crate::app::Route;
use reqwest::{Client, StatusCode};
use implicit_clone::unsync::IString;
use common::PostData;

pub enum Msg {
    FetchPost,
    StorePost(Option<PostData>)
}

#[derive(Properties, PartialEq)]
pub struct Properties {
    pub title: String
}

pub struct Post {
    post: Result<PostData, String>
}

impl Component for Post {
    type Message = Msg;
    type Properties = Properties;

    fn create(ctx: &Context<Self>) -> Self {
        ctx.link().send_message(Msg::FetchPost);
        return Self {
            post: Err("Post not found :(".to_string())
        };
    }

    fn update(&mut self, ctx: &Context<Self>, msg: Self::Message) -> bool {
        match msg {
            Msg::FetchPost => {
                let post_url = format!("http://127.0.0.1:8000/api/posts/{}", ctx.props().title.clone().replace(" ", "%20"));
                ctx.link().send_future(async move {
                    let response = Client::new().get(post_url)
                        .send()
                        .await
                        .expect("Expected response from the server");

                    if response.status() == StatusCode::OK {
                        let response_result = response
                            .json::<PostData>()
                            .await
                            .expect("Response should be in JSON format");
                        return Msg::StorePost(Some(response_result));
                    } else {
                        return Msg::StorePost(None);
                    }
                });
            }
            Msg::StorePost(response_result) => {
                match response_result {
                    Some(post) => {
                        self.post = Ok(post);
                        return true;
                    }
                    None => return false
                }
            }
        }
        false
    }

    fn view(&self, _ctx: &Context<Self>) -> Html {
        html! {
            <div class="post post--single">
            {
                match &self.post {
                    Ok(post) => {
                        let post_content = IString::from(post.content.clone().unwrap());
                        let content_html = Html::from_html_unchecked(AttrValue::from(post_content));
                        html! (
                            <>
                                <div class="titlebar">
                                    <Link<Route> to={Route::Diary}>{ format!("← {}", post.date.clone())  }</Link<Route>>
                                </div>
                                <div class="content">
                                    { content_html }
                                </div>
                            </>
                        )
                    }
                    Err(error) => {
                        html! {
                            <p>{ error }</p>
                        }
                    }
                }
            }    
            </div>
        }
    }
}