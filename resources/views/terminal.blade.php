@extends('layouts.app')

@section('body')
<div
    x-data="terminal" 
    x-ref="terminal"
    class="w-screen h-svh overflow-auto p-2 text-shadow-terminal-glow text-shadow-highlight/60 md:text-base text-[10px] font-mono space-y-4 flex flex-col bg-background-primary"
>
    <div class="space-y-2">
        <template x-for="output in outputHistory">
            <pre class="wrap-break-word" x-text="output"></pre>
        </template>
    </div>
    <div class="grid grid-cols-[max-content_1fr]">
        <p
            x-text="userPrompt" 
            for="input"
        ></p>
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
</div>
@endsection