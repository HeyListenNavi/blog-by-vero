@extends('layouts.app')

@section('title', 'backdoor')

@section('body')
<div class="login">
    <x-window title="backdoor :o">
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="title">
                <h1>Login</h1>
            
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <p style="color: red">{{ $error }}</p>
                    @endforeach
                @endif
            </div>
    
            <div class="text-fields">
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}" autofocus>
                </div>
        
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
        
                <div>
                    <label>
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>
                </div>
        
                <button t ype="submit">Login</button>
            </div>
        </form>
    </x-window>
</div>
@endsection