@extends('layouts.desktop')

@section('title', 'this is home')

@section('content')
<div class="flex flex-col flex-wrap h-full content-start">
    <x-desktop-icon
        name="Journal"
        extension="md"
        description="bunch of rambles compressed into a list"
        location="/home/naviheylisten/vero/thoughts"
        :open="true"
    >
        <iframe
            src="{{ route('journal') }}"
            frameborder="0"
            loading="lazy"
            class="min-w-[700px] min-h-[550px] w-full h-full"
        >
            <p>Your browser does not support iframes.</p>
        </iframe>
        
    </x-desktop-icon>
    <x-desktop-icon name="File 2">
        <p>File 2</p>
    </x-desktop-icon>
</div>
@endsection