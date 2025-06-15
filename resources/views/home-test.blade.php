@extends('layouts.app')

@section('title', 'this is home')

@section('body')
<div class="flex flex-col flex-wrap h-full content-start">
    <x-app title="File 1" :open="true" class="h-full">
        <p>File 1</p>
    </x-app>
    <x-app title="File 2">
        <p>File 2</p>
    </x-app>
</div>
@endsection
