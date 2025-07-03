@extends('layouts.desktop')

@section('title', 'this is home')

@section('content')
<div class="flex flex-col flex-wrap h-full content-start">
    <x-desktop-icon
        name="Journal"
        extension="md"
        description="bunch of rambles compressed into a list"
        location="/home/naviheylisten/vero/thoughts"
    >
        <x-window-container>
            <iframe
                src="{{ route('journal') }}"
                frameborder="0"
                loading="lazy"
                class="min-w-[650px] min-h-[650px] w-full h-full"
            >
                <p>Your browser does not support iframes</p>
            </iframe>
        </x-window-container>
    </x-desktop-icon>

    <x-desktop-icon
        name="Camera Roll"
        extension="psd"
        description="all of veronicas camera roll"
        location="/home/naviheylisten/vero/camera"
    >
        <x-window-container>
            <iframe
                src="{{ route('camera') }}"
                frameborder="0"
                loading="lazy"
                class="min-w-[700px] min-h-[600px] w-full h-full"
            >
                <p>Your browser does not support iframes</p>
            </iframe>
        </x-window-container>
    </x-desktop-icon>

    <x-desktop-icon
        name="Comments"
        extension=".txt"
        description="leave any comments you'd like here"
        location="/home/naviheylisten/blog/"
        :buttons="['close']"
    >
        <x-window-container>
            <iframe
                src="{{ route('comments') }}"
                frameborder="0"
                loading="lazy"
                class="w-56 h-96 space-y-4 mx-auto"
            >
                <p>Your browser does not support iframes</p>
            </iframe>
        </x-window-container>
    </x-desktop-icon>

    <x-desktop-icon
        name="Profile"
        extension=".user"
        description="create your very own profile"
        location="/profiles"
    >
        <x-window-container>
            <iframe
                src="{{ route('camera') }}"
                frameborder="0"
                loading="lazy"
                class="min-w-[800px] min-h-[600px] w-full h-full"
            >
                <p>Your browser does not support iframes</p>
            </iframe>
        </x-window-container>
    </x-desktop-icon>

    <x-desktop-icon
        name="Terminal"
        extension=""
        description="checkout all these crazy commands"
        location="/usr/bin/kitty"
        :open="true"
    >
        <x-window-container
            x-data="terminal" 
            x-ref="terminal"
            class="text-shadow-terminal-glow text-shadow-highlight/60 font-mono space-y-4 !max-h-96"
        >
            <div class="space-y-2">
                <template x-for="output in outputHistory">
                    <pre class="wrap-break-word" x-text="output"></pre>
                </template>
            </div>
            <div class="grid grid-cols-[auto_1fr]">
                <label
                    x-text="userPrompt" 
                    for="input"
                ></label>
                <input
                    x-ref="input" 
                    x-on:keyup.enter="runCommand(input)" 
                    x-on:keydown.up.prevent="previousCommand" 
                    x-on:keydown.down.prevent="nextCommand" 
                    x-text="input" 
                    x-model="input" 
                    class="px-1 outline-0"
                    placeholder="Type here" 
                    type="text" 
                    name="input"
                >
            </div>
        </x-window-container>
    </x-desktop-icon>
</div>
@endsection