@extends('layouts.app')

@section('body')
<main
    x-data
    x-init="setTimeout(() => $refs.bottomComments.scrollIntoView())"
    class="p-2 space-y-4 bg-background-primary w-full h-full min-h-screen"
>
    <section>
        <x-comment-list :comments="$site->comments" type="site" :commentableid="$site->id"/>
        <span x-ref="bottomComments" class="block h-px invisible"></span>
    </section>
</main>
@endsection