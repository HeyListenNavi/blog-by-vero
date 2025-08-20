@props([
    'comments' => [],
    'type',
    'commentableid',
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
        <article class="relative">
            @auth
                @if ($comment->user->id === Auth::id() || $comment->commentable->id === Auth::id())
                <x-options-button>
                    <form method="POST" action="{{ route('comment.destroy', $comment) }}">
                        @csrf
                        @method('DELETE')
                        <button
                            class="px-2 py-1 text-start w-full appearance-none hover:bg-background-primary text-foreground/30 cursor-pointer hover:text-foreground/80 transition-colors" 
                            type="submit"
                        >
                            Delete
                        </button>
                    </form>
                </x-options-button>
                @endif
            @endauth
            <div class="flex gap-2">
                <span class="font-medium">{{ $comment->user->username }}</span>
                <p class="text-foreground/30 tracking-tighter">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
            <p>{{ $comment->content }}</p>
        </article>
        @empty
        <p class="text-foreground/30 italic">No comments yet</p>
        @endforelse
    </section>
    
    <section>
        @guest
        <p class="font-bold">Go to profile and Sign In to comment!</p>
        @endguest
    
        @auth
        <x-comment-box :action="route('comment.store', ['model' => $type, 'id' => $commentableid])"/>
        @endauth
    </section>
</section>