@extends('layouts.app')

@section('body')
<div class="min-h-svh w-screen p-2 grid grid-rows-[1fr_auto]">
    <div class="grid grid-cols-4 gap-4 content-center max-w-3xl mx-auto">
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
    </div>
    {{ $users->links('components.pagination') }}
</div>
@endsection