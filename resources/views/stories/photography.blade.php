@extends('layouts.story', ['title' => 'new camera roll !!!'])

@section('content')
    <div class="flex size-full flex-col gap-3 p-4">
        <div class="mt-12 flex flex-col gap-4">
            <img
                class="story-icon mx-auto size-16 shrink-0"
                src="{{ Vite::image('icons/directory-film.png') }}"
            />
            <div class="flex flex-col gap-1 text-center">
                <p class="text-body-medium text-foreground font-bold">{{ $photographyPost->title }}</p>
                <p class="text-label-small text-foreground/50">
                    {{ $photographyPost->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <div class="mt-auto">
            <div class="text-label-small text-highlight-secondary/70 flex items-center gap-2">
                <span>$</span>
                <span>photos/ --count</span>
                <span class="text-foreground/60">&rarr;
                    {{ $photographyPost->relationLoaded('photographies') ? $photographyPost->photographies->count() : '—' }}</span>
            </div>

            <div class="text-label-small text-foreground/40 flex items-center gap-2">
                <span>user@blog:~$</span>
                <span class="text-highlight-secondary/50">_</span>
            </div>
        </div>
    </div>
@endsection
