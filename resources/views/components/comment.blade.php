@props([
    'user',
    'date',
    'comment'
])

<div>
    <div class="flex gap-2">
        <span class="font-medium">{{ $user }}</span>
        <p class="text-foreground/30 tracking-tighter">{{ $date }}</p>
    </div>
    <p>{{ $comment }}</p>
</div>