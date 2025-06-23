@extends('layouts.desktop')

@section('title', 'this is home')

@section('content')
<div class="flex flex-col flex-wrap h-full content-start">
    <x-desktop-icon name="File 1" :open="true" class="h-full">
        <p>File 1</p>
    </x-desktop-icon>
    <x-desktop-icon name="File 2">
        <p>File 2</p>
    </x-desktop-icon>
</div>
@endsection
