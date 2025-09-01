@extends('layouts.app')

@section('body')
<main class="w-screen bg-background-primary min-h-svh p-8 flex flex-col gap-4">
    <a class="underline cursor-pointer hover:text-highlight-secondary transition-colors" href="{{ route('home') }}">← {{ $post->date }}</a>
    
    <section class="w-full max-w-2xl self-center flex flex-col gap-2">
        <h1 class="text-display-medium text-4xl">{{ $post->title }}</h1>
        @markdown($post->content)
    </section>
</main>
@endsection