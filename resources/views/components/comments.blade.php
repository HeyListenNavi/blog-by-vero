@props([
    'comments' => []
])

<div class="space-y-4">
    <div class="space-y-2">
        @forelse ($comments as $comment)
        <x-comment user="{{ $comment->user->username }}" date="{{ $comment->created_at->diffForHumans() }}" comment="{{ $comment->content }}"/>
        @empty
        <p class="text-foreground/30 italic">No comments yet for this site.</p>
        @endforelse
    </div>
    
    <div>
        @guest
        <p class="font-bold">Go to profile and Sign In to comment!</p>
        @endguest
    
        @auth
        <x-comment-box/>
        @endauth
    </div>
</div>