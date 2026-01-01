@extends('layouts.basic')

@section('title', 'Регистрация')

@section('content')
    <form method="post" action="{{ route('register.store') }}">
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
        <div class="mb-3">
            <label for="password_conf">Repeate your password</label>
            <input type="text" name="password_confirmation" id="password_conf">
        </div>
        <button>Register</button>

    </form>
@endsection
