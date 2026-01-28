@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="card" style="max-width: 400px; margin: 50px auto;">
    <h2 style="margin-bottom: 20px; text-align: center;">Login</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
    </form>

    <p class="text-center" style="margin-top: 15px;">
        Don't have an account? <a href="{{ route('register') }}" class="link">Register</a>
    </p>
</div>
@endsection
