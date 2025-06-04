@extends('layouts.app')

@section('body')
<div class="post post--single">
    <div class="titlebar">
        <a href="{{ route('journal') }}">← {{ $post->date }}</a>
    </div>
    <div class="content">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
    </div>
</div>
@endsection