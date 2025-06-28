@extends('layouts.app')

@section('body')
<div class="h-screen grid grid-rows-[auto_1fr_auto] gap-4">
    <div>
        <h1>This is my journal &lt;3 </h1>
        <h2>pwap</h2>
    </div>
    <div class="grid grid-cols-5 justify-items-center gap-2 max-h-96"> 
        @foreach ($posts as $post)
        <div class="w-28">
            <a 
                href="{{ route('journal.post', ['post' => $post->slug]) }}"
                target="_parent"
            >
                <img class="size-28" src="{{ $post->icon->path }}"/>
                <div class="wrap-break-word">
                    <span>{{ $post->title }}</span>
                    <span>{{ $post->date }}</span>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div>
        {{ $posts->links('components.pagination') }}
    </div>
</div>
@endsection