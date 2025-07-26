@props([
    'comments' => [],
    'action',
    'reverse' => false
])

<section 
    @if ($reverse)
    class="flex gap-4 flex-col-reverse"
    @else
    class="flex gap-4 flex-col"
    @endif
>
    <section 
        @if ($reverse)
        class="flex gap-2 flex-col-reverse"
        @else
        class="flex gap-2 flex-col"
        @endif
    >

        @forelse ($comments as $comment)
        <x-comment user="{{ $comment->user->username }}" date="{{ $comment->created_at->diffForHumans() }}" comment="{{ $comment->content }}"/>
        @empty
        <p class="text-foreground/30 italic">No comments yet for this site</p>
        @endforelse
    </section>
    
    <section>
        @guest
        <p class="font-bold">Go to profile and Sign In to comment!</p>
        @endguest
    
        @auth
        <x-comment-box action="{{ $action }}"/>
        @endauth
    </section>
</section>