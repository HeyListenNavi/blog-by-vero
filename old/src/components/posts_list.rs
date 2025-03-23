use yew::prelude::*;
use yew_router::prelude::*;
use crate::app::Route;
use reqwest::{Client, StatusCode};
use common::{PostData, SERVER_ADDRESS};

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
        return Self { posts: Err("Loading posts...".to_string()) }
    }

    fn update(&mut self, ctx: &Context<Self>, msg: Self::Message) -> bool {
        match msg {
            Msg::FetchPostList => {
                let post_url = format!("{SERVER_ADDRESS}/api/posts/list");
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
                    }
                    None => {
                        self.posts = Err("No posts found :(".to_string());
                    }
                }
                return true;
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
                                    <img loading="lazy" src={format!("assets/music-cd.png")}/>
                                    <div class="description">
                                        <span class="title">{ post.title.clone() }</span> 
                                        <span class="date">{ post.date.clone() }</span>
                                    </div>
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