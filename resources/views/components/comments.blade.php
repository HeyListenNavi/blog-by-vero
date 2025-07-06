@props([
    'comments' => []
])

<div class="space-y-4">
    <div class="space-y-2">
        @forelse ($comments as $comment)
        <div>
            <div class="flex gap-2">
                <span class="font-medium">{{ $comment->user->username }}</span>
                <p class="text-foreground/30 tracking-tighter">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
            <p>{{ $comment->content }}</p>
        </div>
        @empty
        <p class="text-foreground/30 italic">No comments yet for this site.</p>
        @endforelse
    </div>
    
    <div>
        @guest
        <p>Go to profile and Sign In to comment!</p>
        @endguest
    
        @auth
        <form action="" class="flex flex-col gap-2">
            @csrf
            <fieldset>
                <label for="comment">Comment</label>
                <textarea
                    class="w-full border-[3px] p-2 border-foreground resize-none" 
                    placeholder="Enter your comment here" 
                    type="text" 
                    name="comment"
                ></textarea>
            </fieldset>
    
            <x-button class="self-end" type="submit">Comment</x-button>
        </form>
        @endauth
    </div>
</div>