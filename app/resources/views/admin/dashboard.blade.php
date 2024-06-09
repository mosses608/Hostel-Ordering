@extends('admin.admin-layout')

@section('content')

<br><br><br>
@include('partials.admin-side-menu')

<x-admin_flash_message />

<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">Dashboard</h1><br><br><hr><hr><hr>
        <br>
        <div class="admin-stud-wrapper-lgx">
            <h1 class="profile-my-wrap"><span>{{count($students)}}</span> Students</h1><br>
            <a href="#">Full Detail <span>&#8594;</span></a><br><br>
        </div>
        <div class="admin-room-wrapper-lgx">
            <h1 class="profile-my-wrap"><span>{{count($rooms)}}</span> Rooms</h1><br>
            <a href="#">Full Detail <span>&#8594;</span></a><br><br>
        </div>
        <div class="courses-wrpper-all">
            <h1 class="profile-my-wrap"><span>{{count($courses)}}</span> Courses</h1><br>
            <a href="#">Full Detail <span>&#8594;</span></a><br><br>
        </div>
    </div>
</center>

@endsection
