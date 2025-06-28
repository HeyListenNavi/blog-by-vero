@extends('layouts.app')

@section('body')
<div class="h-screen grid grid-rows-[auto_1fr_auto] gap-4">
    <div>
        <h1>This is my journal &lt;3 </h1>
        <h2>pwap</h2>
    </div>
    <div class="grid grid-cols-5 justify-items-center gap-2 max-h-96"> 
        @foreach ($posts as $post)
        <x-post
            :title="$post->title"
            :date="$post->date"
            :icon="$post->icon->path"
            :href="route('journal.post', ['post' => $post->slug])"
        />
        @endforeach
    </div>
    <div>
        {{ $posts->links('components.pagination') }}
    </div>
</div>
@endsection