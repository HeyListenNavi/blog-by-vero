@extends('layouts.app')

@section('body')
    <main class="bg-background-primary grid min-h-screen w-screen grid-rows-[auto_1fr_auto] gap-4 p-2">
        <section class="divide-foreground/10 divide-y-2 divide-dashed px-2">
            @forelse ($thoughts as $thought)
            <div class="mx-auto flex w-full max-w-lg gap-2 py-4">
                    <p class="font-emoji text-lg">{{ $thought->mood[0] }}</p>
                    <div>
                        <p>"{{ $thought->content }}"</p>
                        <p class="text-[10px]">estado: <span class="font-bold">{{ $thought->mood }}</span></p>
                    </div>
                </div>
            @empty
                <p>No thoughts, head empty :p</p>
            @endforelse
        </section>
        <section class="mx-auto w-full max-w-lg">
            {{ $thoughts->links('components.pagination') }}
        </section>
    </main>
@endsection
