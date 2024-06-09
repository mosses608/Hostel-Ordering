@extends('admin.admin-layout')

@section('content')

<br><br><br>
@include('partials.admin-side-menu')

<x-user_updated />

<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">My Profile</h1><br><br><hr><hr><hr>
        <br>
        <div class="left-side-profile-data">
            <img src="{{Auth::guard('web')->user()->profile ? asset('storage/' . Auth::guard('web')->user()->profile): asset('assets/images/profile.png')}}" alt="My Profile">
            <p>Name: <span>{{Auth::guard('web')->user()->name}}</span></p><br>
            <p>Username: <span>{{Auth::guard('web')->user()->username}}</span></p><br>
        </div>
        <form action="/users/edit_profile/{{Auth::guard('web')->user()->id}}" method="POST" class="edit-profile-detailed" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="">Profile Picture</label>
            <input type="file" name="profile" id="" style="border: none;"><br><br>
            <label for="">Username</label>
            <input type="text" name="username" id="" value="{{Auth::guard('web')->user()->username}}"><br><br>
            <label for="">Password</label>
            <input type="text" name="password" id="" value="{{Auth::guard('web')->user()->password}}"><br><br>
            <button type="submit">Edit Profile</button><br><br>
        </div>
    </div>
</center>

@endsection
