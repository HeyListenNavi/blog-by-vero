@extends('layouts.page')

@section('title', 'journal')
@section('window_title', 'Journal !!!')

@section('content')
<div class="journal">
    <h1>This is my journal &lt;3 </h1>
    <h2>pwap</h2>
    <div class="post--list">
        @foreach ($posts as $post)
            <div>
                <a class="post"
                    x-data="{ open: false }"
                    class="tags"
                    href="{{ route('journal.post', ['post' => $post->id]) }}"
                    x-on:contextmenu="
                        $event.preventDefault();
                        open = true;
                    "
                    x-on:click.outside="open = false"
                    x-on:contextmenu.outside="open = false"
                >
                    <img loading="lazy" src="{{ $post->icon->icon }}"/>
                    <div class="description">
                        <span class="title">{{ $post->title }}</span>
                        <span class="date">{{ $post->date }}</span>
                    </div>
                    <div
                        class="context-menu"
                        x-show="open"
                        x-cloak
                        x-collapse
                    >
                        <span>About</span>
                        @if ($post->tags->isNotEmpty())
                            <div class="tags">
                                @foreach ($post->tags as $tag)
                                    <span
                                        class="tag" 
                                        style="background-color: {{ $tag->color }}"
                                    >
                                        {{ $tag->title }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="pagination">
        {{ $posts->links() }}
    </div>
</div>
@endsection
