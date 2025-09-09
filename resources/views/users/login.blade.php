@extends('layouts.main', [
    'title' => 'Login',
])

@section('content')
    <div class="login-form-container">
        <h2>Login</h2>
        <form action="{{ route('user.login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="name" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="links">
                <a href="{{ route('user.register_form') }}">Register</a>
            </div>
            <button type="submit" class="login-button">Log In</button>
        </form>
    </div>
@endsection
