@extends('layouts.app')

@section('body')
<main class="min-h-screen w-screen p-2 flex flex-col justify-center items-center gap-4 bg-background-primary">
    <p>Whoops</p>
    <p>You've been banned for 5 minutes</p>
    <p>You can log in again in <strong>{{ now()->diffForHumans($banUntil, ['parts' => 2]) }}</strong>.</p>
</main>
@endsection