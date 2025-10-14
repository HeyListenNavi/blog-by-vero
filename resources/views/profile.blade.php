@extends('layouts.app')

@section('body')
<div class="min-h-screen w-screen grid grid-rows-[auto_1fr] bg-background-primary">
    <nav class="py-3 w-full bg-background-tertiary flex justify-around items-center gap-2 text-center">
        <a class="underline cursor-pointer hover:text-highlight-secondary transition-colors" href="{{ route('community') }}">← Profile</a>
        <div class="py-2 w-fit md:w-full md:max-w-64 px-4 bg-background-primary wrap-break-word">naviheylisten.space</div>
        <span class="font-emoji text-3xl">B</span>
    </nav>

    <main class="p-4 flex flex-col gap-4">
        <section class="relative grid grid-cols-[auto_1fr] items-center gap-4">
            <x-profile-picture letter="{{ $user->username[0] }}"/>
            <div>
                @if (Auth::id() === $user->id)
                <x-options-button>
                    <a
                        class="px-2 py-1 text-start w-full appearance-none hover:bg-background-primary text-foreground/30 cursor-pointer hover:text-foreground/80 transition-colors" 
                        href="{{ route('profile.edit') }}"
                    >
                        Edit Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="px-2 py-1 text-start w-full appearance-none hover:bg-background-primary text-foreground/30 cursor-pointer hover:text-foreground/80 transition-colors" 
                            type="submit"
                        >
                            Log out →
                        </button>
                    </form>
                </x-options-button>
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
            <x-comment-list :comments="$user->comments" type="user" :commentableid="$user->id" :reverse="true"/>
        </section>
    </main>
</div>
@endsection