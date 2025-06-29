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
        <iframe
            src="{{ route('journal') }}"
            frameborder="0"
            loading="lazy"
            class="min-w-[650px] min-h-[650px] w-full h-full"
        >
            <p>Your browser does not support iframes.</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Camera Roll"
        extension="psd"
        description="all of veronicas camera roll"
        location="/home/naviheylisten/vero/camera"
    >
        <iframe
            src="{{ route('camera') }}"
            frameborder="0"
            loading="lazy"
            class="min-w-[700px] min-h-[600px] w-full h-full"
        >
            <p>Your browser does not support iframes.</p>
        </iframe>
    </x-desktop-icon>

    <x-desktop-icon
        name="Comments"
        extension=".txt"
        description="leave any comments you'd like here"
        location="/home/naviheylisten/blog/"
        :open="true"
    >
        <div class="w-56 h-96 space-y-4">
            @forelse ($site->comments as $comment)
                <div>
                    <p>{{ $comment->content }}</p>
                    <span class="font-medium">{{ $comment->user->username }}</span>
                    <p>{{ $comment->created_at->format('M d, Y H:i') }}</p>
                </div>
            @empty
                <p class="text-gray-600 italic">No comments yet for this site.</p>
            @endforelse
        </div>
    </x-desktop-icon>
</div>
@endsection