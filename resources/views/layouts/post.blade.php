@extends('layouts.app')

@section('body')
<div class="min-w-lg bg-background-primary min-h-svh p-8 flex flex-col gap-4">
    <a class="underline" href="{{ route('home') }}">← {{ $post->date }}</a>
    <div class="max-w-4xl self-center flex flex-col gap-2">
        <h1 class="text-display-medium text-4xl">{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
    </div>
</div>
@endsection