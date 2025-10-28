@extends('layouts.app')

@section('body')
<main class="w-screen bg-background-primary min-h-svh p-8 flex flex-col gap-4">
    <a class="underline cursor-pointer hover:text-highlight-secondary transition-colors" href="{{ route('home') }}">← go back</a>
    
    <section class="w-full max-w-2xl self-center flex flex-col gap-2">
        <h1 class="text-display-medium text-4xl">{{ $sketch->title }}</h1>
        <p>{{ $sketch->description }}</p>
        <iframe class="aspect-3/2" src="{{ asset('storage/' . $sketch->path) }}" frameborder="0"></iframe>
    </section>
</main>
@endsection