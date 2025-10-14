@extends('layouts.app')

@section('body')
<div class="min-h-screen w-screen grid grid-rows-[auto_1fr] bg-background-primary">
    <nav class="py-1 px-2 w-full bg-background-tertiary">
        <div class="max-w-xl mx-auto grid grid-cols-[30%_1fr_30%] items-center justify-items-center">
            <a class="w-full text-center underline cursor-pointer hover:text-highlight-secondary transition-colors" href="{{ route('community') }}">← Profile</a>
            <div class="w-full text-center py-1 md:px-12 px-2 bg-background-primary">naviheylisten.space</div>
            <span class="w-full text-center font-emoji text-4xl">B</span>
        </div>
    </nav>

    <form method="POST" action="{{ route('profile.update', $user) }}" class="mx-auto w-full max-w-xl p-4 flex flex-col gap-4">
        @csrf
        <section class="relative grid grid-cols-[auto_1fr] items-center gap-4">
            <x-profile-picture letter="{{ $user->username[0] }}"/>
            <div>
                <div class="space-y-1">
                    <x-text-input
                        label="Name:"
                        id="name"
                        :required="true"
                        placeholder="your name :p"
                        :autofocus="true"
                        value="{{ $user->name }}"
                    />
                    <x-text-input
                        label="Username:"
                        id="username"
                        :required="true"
                        placeholder="your username :3"
                        value="{{ $user->username }}"
                    />
                    <x-text-input
                        label="Email:"
                        id="email"
                        type="email"
                        :required="true"
                        placeholder="email !!"
                        :autofocus="true"
                        value="{{ $user->email }}"
                    />
                </div>
            </div>
        </section>
            
        <section class="space-y-2">
            <h2 class="font-bold text-lg">About Me</h2>
            <label for="description">About Me</label>
            <textarea
                class="w-full border-[3px] p-2 border-foreground resize-none"
                placeholder="No description :p"
                type="text"
                name="description"
            >{{ $user->description }}</textarea>
        </section>
        
        <hr class="w-full border-2 border-dashed"/>

        <section class="space-y-2">
            <div class="flex justify-end">
                <x-button type="send">Save</x-button>
            </div>
        </section>
    </form>
</div>
@endsection