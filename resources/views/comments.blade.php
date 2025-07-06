@extends('layouts.app')

@section('body')
<div
    x-data
    x-init="setTimeout(() => $refs.bottomComments.scrollIntoView())"
    class="p-2 space-y-4"
>
    <x-comments :comments="$site->comments"/>
    <span x-ref="bottomComments"></span>
</div>
@endsection