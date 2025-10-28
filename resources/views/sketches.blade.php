@extends('layouts.app')

@section('body')
<main class="min-h-screen w-screen p-2 grid grid-rows-[auto_1fr_auto] gap-4 bg-background-primary">
    <header class="p-4 flex flex-col gap-1">
        <h1 class="text-body-large">Sketches</h1>
        <h2>List of sketches i've worked in, hopefully they're all interactive and working haha</h2>
    </header>
    <section class="px-2 flex flex-wrap content-start gap-2">
        @forelse ($sketches as $sketch)
        <x-post-icon
            :title="$sketch->title"
            :date="$sketch->date"
            icon="{{ Vite::image('icons/file-code.png') }}"
            :href="route('sketch', ['sketch' => $sketch->id])"
            newTab="{{ true }}"
        />
        @empty
        <p>No sketches yet, tell vero to get to work >3</p>
        @endforelse
    </section>
    <section class="p-4">
        {{ $sketches->links('components.pagination') }}
    </section>
</main>
@endsection
