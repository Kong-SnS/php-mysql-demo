@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="card" style="max-width: 400px; margin: 50px auto;">
    <h2 style="margin-bottom: 20px; text-align: center;">Register</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%;">Register</button>
    </form>

    <p class="text-center" style="margin-top: 15px;">
        Already have an account? <a href="{{ route('login') }}" class="link">Login</a>
    </p>
</div>
@endsection
