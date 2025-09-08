@extends('layouts.main',[
    'title' => 'Register'
])

@section('content')
<h1>Register New Account</h1>
    <form action="{{route('user.register')}}" method="POST">
        @csrf
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
       
        <button type="submit">Register</button>
    </form>
    
@endsection