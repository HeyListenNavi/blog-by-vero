use yew::prelude::*;
use yew_router::prelude::*;
use crate::app::Route;
use reqwest::{Client, StatusCode};
use common::{PostData, SERVER_URL};

pub enum Msg {
    FetchPostList,
    StorePostList(Option<Vec<PostData>>)
}

pub struct PostsList {
    posts: Result<Vec<PostData>, String>
}

impl Component for PostsList {
    type Message = Msg;
    type Properties = ();

    fn create(ctx: &Context<Self>) -> Self {
        ctx.link().send_message(Msg::FetchPostList);
        return Self { posts: Err("No posts found :(".to_string()) }
    }

    fn update(&mut self, ctx: &Context<Self>, msg: Self::Message) -> bool {
        match msg {
            Msg::FetchPostList => {
                let post_url = format!("{SERVER_URL}/api/posts/list");
                ctx.link().send_future(async move {
                    let response = Client::new().get(post_url)
                        .send()
                        .await
                        .expect("Expected response from the server");

                    if response.status() == StatusCode::OK {
                        let response_result = response
                            .json::<Vec<PostData>>()
                            .await
                            .expect("Response should be in JSON format");
                        return Msg::StorePostList(Some(response_result));
                    } else {
                        return Msg::StorePostList(None);
                    }
                });
                return false;
            }
            Msg::StorePostList(posts_list) => {
                match posts_list {
                    Some(posts) => {
                        self.posts = Ok(posts);
                        return true;
                    }
                    None => return false
                }
            }
        }
    }

    fn view(&self, _ctx: &Context<Self>) -> Html {
        html! {
            <div class="post--list"> {
                match &self.posts {
                    Ok(post_list) => {
                        post_list.into_iter().map(|post| {
                            let post_title = format!("{}%20-%20{}", post.title.clone(), post.date.clone());
                            html! (
                                <Link<Route> to={Route::Post { post_title: post_title }} classes="post">
                                    <img src={format!("assets/music-cd.png")}/>
                                    <span>{ format!("{}, {}", post.title.clone(), post.date.clone()) }</span> 
                                </Link<Route>>
                            )
                        }).collect::<Html>()
                    }
                    Err(error) => {
                        html! {
                            <p>{ error }</p>
                        }
                    }
                }
            } </div>
        }
    }
}