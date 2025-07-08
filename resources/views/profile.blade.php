@extends('layouts.app')

@section('body')
<div class="w-full h-screen grid grid-rows-[auto_1fr]">
    <nav class="py-1 px-6 w-full bg-background-tertiary">
        <div class="max-w-xl mx-auto grid grid-cols-[20%_1fr_20%] items-center justify-items-center">
            <a class="underline cursor-pointer hover:text-highlight-secondary transition-colors" onclick="history.back()">← Profile</a>
            <div class="py-1 px-8 bg-background-primary">naviheylisten.space</div>
            <span class="font-emoji text-4xl">B</span>
        </div>
    </nav>
    <main class="mx-auto max-w-xl p-4 flex flex-col gap-4">
        <section class="relative grid grid-cols-[auto_1fr] items-center gap-4">
            <x-profile-picture letter="{{ $user->username[0] }}"/>
            <div>
                @if ($isLoggedInProfile)
                <x-profile-options>
                    <button
                        class="px-2 py-1 text-start w-full appearance-none hover:bg-background-primary text-foreground/30 cursor-pointer hover:text-foreground/80 transition-colors" 
                        href=""
                    >
                        Edit Profile
                    </button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="px-2 py-1 text-start w-full appearance-none hover:bg-background-primary text-foreground/30 cursor-pointer hover:text-foreground/80 transition-colors" 
                            type="submit"
                        >
                            Log out →
                        </button>
                    </form>
                </x-profile-options>
                @endif
               
                <div class="space-y-1">
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
                </div>
            </div>
        </section>
            
        <section class="space-y-2">
            <h2 class="font-bold text-lg">About Me</h2>
            <p>{{ $user->description ?? 'No description :p' }}</p>
        </section>
        
        <hr class="w-full border-2 border-dashed"/>

        <section class="space-y-2">
            <h2 class="font-bold">Comments</h2>
            <x-comments :comments="$user->comments"/>
        </section>
    </main>
</div>
@endsection