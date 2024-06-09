@extends('layout')

@section('content')

<x-error_message />

<x-logout_flash_message />

<center>
    <form action="/authenticate" method="POST" class="auth-wrapper-index">
        @csrf
        <label for="">Username</label><br>
        <input type="text" name="username" id="" placeholder="Enter username"><br><br>
        <label for="">Password</label><br>
        <input type="password" name="password" id="" placeholder="Enter password"><br><br>
        <button type="submit">Login</button>
        <p>Don't have account? <a href="/register">Register</a></p>
        <br><br>
    </form>
</center>

@endsection
