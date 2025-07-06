@extends('layouts.app')

@section('body')
<div class="w-full h-screen grid grid-rows-[auto_1fr]">
    <div class="py-1 px-6 w-full bg-background-tertiary">
        <div class="max-w-xl mx-auto grid grid-cols-[20%_1fr_20%] items-center justify-items-center">
            <button class="underline cursor-pointer hover:text-highlight-secondary transition-colors" onclick="history.back()">← Profile</button>
            <div class="py-1 px-8 bg-background-primary">naviheylisten.space</div>
            <span class="font-emoji text-4xl">B</span>
        </div>
    </div>
    <div class="mx-auto max-w-xl p-4 flex flex-col gap-2">
        <div class="grid grid-cols-[auto_1fr] items-center gap-4">
            <x-profile-picture letter="{{ $user->username[0] }}"/>
            <div>
                <p>
                    <span class="font-bold">Name:</span>
                    {{ $user->name }}
                </p>
                <p>
                    <span class="font-bold">Username:</span>
                    {{ $user->username }}
                </p>
                <p>
                    <span class="font-bold">Email:</span>
                    {{ $user->email }}
                </p>
                
                @if ($isLoggedInProfile)
                    <form method="POST" action="{{ route('logout') }}" class="flex justify-end">
                        @csrf
                        <button class="appearance-none text-foreground/30 underline cursor-pointer hover:text-highlight-secondary transition-colors" type="submit">Log out →</button>
                    </form>
                @endif
            </div>
        </div>
        <p>{{ $user->description }}</p>
        <span class="w-full border-b-2 border-dashed"></span>
        <x-comments :comments="$user->comments"/>
    </div>
</div>
@endsection