@extends('layouts.app')

@section('body')
    @if ($post->layout === 'redacted')
        @include('posts.layouts.redacted')
    @else
        @include('posts.layouts.window')
    @endif
@endsection
