@extends('admin.admin-layout')

@section('content')

<br><br><br>
@include('partials.admin-side-menu')

<x-room_created />

<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">Rooms Management</h1><br><br><hr><hr><hr>
        <br>
        <div class="add-course-main-course-wrapp">
            <h1>Add Room</h1><br>
            <form action="/rooms" method="POST" class="add-course-wrapp-form">
                @csrf
                <label for="">Select Seater:</label>
                <select name="seater" id="">
                    <option value="//">Select Seater</option>
                    <option value="3 Seaters">3 Seaters</option>
                    <option value="4 Seaters">4 Seaters</option>
                    <option value="5 Seaters">5 Seaters</option>
                </select>
                <br><br>
                <label for="">Block Name:</label>
                <select name="block_name" id="">
                    <option value="//">Select Block</option>
                    <option value="6A">6A</option>
                    <option value="6B">6B</option>
                </select>
                <br><br>
                <label for="">Room Number:</label>
                <input type="text" name="room_number" id=""><br><br>
                <button type="submit">Add Room</button><br><br>
            </form>
        </div>
        <button class="viewable-component-head"><a href="/admin/view-rooms"><i class="fa fa-eye"></i> View Rooms</a></button>
    </div>
</center>

@endsection
