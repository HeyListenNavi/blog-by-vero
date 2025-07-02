@extends('layouts.app')

@section('body')
<div x-data x-resize="$nextTick(() => $refs.commentBox.scrollIntoView())">
    @forelse ($site->comments as $comment)
    <div class="space-y-2">
        <div class="flex gap-2">
            <span class="font-medium">{{ $comment->user->username }}</span>
            <p class="text-zinc-400">{{ $comment->created_at->diffForHumans() }}</p>
        </div>
        <p>{{ $comment->content }}</p>
    </div>
    @empty
    <p class="text-gray-600 italic">No comments yet for this site.</p>
    @endforelse
    <p>Comments</p>

    <div x-ref="commentBox" class="pb-6">
        <x-button type="button">Sign In</x-button>

        @auth
        <form action="" class="space-y-2">
            @csrf
            <fieldset>
                <label for="user">Username</label>
                <input class="w-full border-[3px] p-2 border-foreground" placeholder="Username" type="text" name="user">
            </fieldset>

            <fieldset>
                <label for="comment">Comment</label>
                <textarea class="w-full border-[3px] p-2 border-foreground" placeholder="Enter your comment here"
                    type="text" name="comment"></textarea>
            </fieldset>

            <x-button type="submit">Comment</x-button>
        </form>
        @endauth
    </div>
</div>
@endsection