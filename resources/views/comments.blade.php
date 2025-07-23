@extends('layouts.app')

@section('body')
<main
    x-data
    x-init="setTimeout(() => $refs.bottomComments.scrollIntoView())"
    class="p-2 space-y-4"
>
    <section>
        <x-comment-list :comments="$site->comments" :action="route('comment.store', ['model' => 'site', 'id' => $site->id])"/>
    </section>
    <span x-ref="bottomComments" class="block h-px invisible"></span>
</main>
@endsection