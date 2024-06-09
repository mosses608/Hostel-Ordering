@extends('layout')

@section('content')

<center>
    <form action="/students" method="POST" class="auth-wrapper-index">
        @csrf
        <label for="">Name</label><br>
        <input type="text" name="first_name" id="" placeholder="First Name"><br><br>
        <label for="">Registration Number</label><br>
        <input type="number" name="reg_number" id="" placeholder="Registration Number"><br><br>
        <label for="">Username</label><br>
        <input type="text" name="username" id="" placeholder="Username"><br><br>
        <label for="">Password</label><br>
        <input type="password" name="password" id="" placeholder="Password"><br><br>
        <button type="submit">Register</button>
        <p><a href="/">&#8592; Back</a></p>
        <br><br>
    </form>
</center>

@endsection
