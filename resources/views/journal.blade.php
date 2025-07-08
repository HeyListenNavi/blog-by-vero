@extends('layouts.app')

@section('body')
<main class="h-svh w-screen p-2 grid grid-rows-[auto_1fr_auto] gap-4">
    <header class="px-4 flex flex-col gap-1">
        <h1 class="text-body-large">This is my journal &lt;3</h1>
        <h2>welcome! you've found the collection of veronica's thoughts, sometimes, when she feels the need to share something to the world, she comes here to depoist all of it into a centralized database</h2>
    </header>
    <section class="grid grid-cols-5 justify-items-center gap-2"> 
        @forelse ($posts as $post)
        <x-post-icon
            :title="$post->title"
            :date="$post->date"
            :icon="$post->icon->path"
            :href="route('journal.post', ['post' => $post->slug])"
        />
        @empty
        <p>No journal entries yet :&Backslash;</p>
        @endforelse
    </section>
    <section>
        {{ $posts->links('components.pagination') }}
    </section>
</main>
@endsection