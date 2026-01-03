@extends('layouts.basic')

@section('title', 'Авторизация')

@section('content')
    <form method="post" action="{{ route('login.store') }}">
        @csrf
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" />
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button>Login</button>
    </form>


@endsection
