@extends('layouts.story', ['title' => 'just watched something:3'])

@section('content')
    <div class="flex size-full flex-col gap-3 p-4">
        <div class="flex justify-between px-4 py-3">
            @for ($i = 0; $i < 16; $i++)
                <div class="size-1 rounded-full shadow-[0_0_5px_rgb(234,187,185)]">
                    <div class="bg-highlight size-1 rounded-full shadow-[0_0_10px_rgb(234,187,185)]"></div>
                </div>
            @endfor
        </div>

        <div class="flex flex-col gap-4">
            <img
                class="mx-auto h-64 shrink-0"
                src="{{ $media->url }}"
            />
            <div class="flex flex-col gap-1 text-center">
                <p>new {{ $media->type }} review</p>
                <p class="text-body-medium text-foreground font-bold">{{ $media->title }}</p>
                <p class="text-label-small text-foreground/50">
                    {{ $media->review_date->format('d M Y') ?? $media->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <div class="flex justify-between px-4 py-3">
            @for ($i = 0; $i < 16; $i++)
                <div class="size-1 rounded-full shadow-[0_0_5px_rgb(234,187,185)]">
                    <div class="bg-highlight size-1 rounded-full shadow-[0_0_10px_rgb(234,187,185)]"></div>
                </div>
            @endfor
        </div>

        <div class="mt-auto">
            <div>
                <div class="text-label-small text-highlight-secondary flex items-center gap-2">
                    <span>$</span>
                    <span class="text-foreground/50">cat rating.log</span>
                </div>
                <div class="font-emoji mt-1 flex gap-1 text-2xl leading-none">
                    @for ($i = 0; $i < $media->stars; $i++)
                        <span style="color: #eabbb9;">G</span>
                    @endfor
                    @for ($i = $media->stars; $i < 5; $i++)
                        <span style="color: #444;">F</span>
                    @endfor
                </div>
            </div>

            <div class="text-label-small text-foreground/40 flex items-center gap-2">
                <span>user@blog:~$</span>
                <span class="text-highlight-secondary/50">_</span>
            </div>
        </div>
    </div>
@endsection
