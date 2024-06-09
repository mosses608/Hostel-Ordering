@extends('dash-layout')

@section('content')
<br><br><br>
@include('partials.side-menu')

<x-success_message />

<x-success_login />

<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">Dashboard</h1><br><br><hr><hr><hr>
        <br>
        <div class="proile-wrapper-lgx">
            <h1 class="profile-my-wrap">My Profile</h1><br>
            <a href="#">Full Detail <span>&#8594;</span></a><br><br>
        </div>
        <div class="room-wrapper-lgx">
            <h1 class="room-my-wrap">My Room</h1><br>
            <a href="#">Full Detail <span>&#8594;</span></a><br><br>
        </div>
    </div>
</center>
@endsection
