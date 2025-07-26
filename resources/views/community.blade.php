@extends('layouts.app')

@section('body')
<main class="min-h-svh w-screen p-2 grid grid-rows-[auto_1fr_auto] gap-2">
    <header class="px-4 flex flex-col gap-1">
        <h1 class="text-body-large">Community Section!</h1>
        <h2>register and checkout your profile here:O</h2>
    </header>

    <section class="grid sm:grid-cols-4 grid-cols-2 gap-4 content-center max-w-3xl mx-auto">
    @forelse ($users as $user)
    <a
        href="{{ route('profile', $user->id) }}"
        class="w-36 p-2 h-fit flex flex-col gap-1 items-center hover:outline-2 hover:outline-dashed hover:outline-foreground/10 cursor-pointer"
    >
        <x-profile-picture letter="{{ $user->username[0] }}"/>
        <p class="wrap-break-word text-center">{{ $user->name }}</p>
    </a>
    @empty
    <p>No users registered yet ;_;</p>
    @endforelse
    </section>

    <section>
        {{ $users->links('components.pagination') }}
    </section>
</main>
@endsection