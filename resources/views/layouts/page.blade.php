@extends('layouts.app')

@section('body')
    <div class="blog-page">
        <x-navbar></x-navbar>
        <x-decobar></x-decobar>

        <x-window :title="View::getSection('window_title')" class="main">
            @yield('content')
        </x-window>
    </div>
@endsection
