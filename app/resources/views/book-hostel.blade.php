@extends('dash-layout')

@section('content')
<br><br><br>
@include('partials.side-menu')

<x-room_booked_message />

<x-booking_error />

<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">Hostel Booking</h1><br><br><hr><hr><hr>
        <br>
        <form class="appl-container-wrapper-data" action="/bookings" method="POST">
            @csrf
            <h1>Fill All Information</h1>
            <div class="room-related-wrapper">
                <h2>Room Related Information</h2><br><br><br><br>
                <label for="">Block Name</label>
                <select name="block_name" id="">
                    <option value="//">Select Block</option>
                    <option value="6A">6A</option>
                    <option value="6B">6B</option>
                </select><br><br>
                <label for="">Room Number</label>
                <select name="room_number" id="">
                    <option value="//">Select Room</option>

                    {{-- @if ($book->status != 'Full') --}}
                    @foreach ($rooms as $room)
                    {{-- @if ($room->room_number == $book->room_number || $room->room_number != $book->room_number) --}}
                    @foreach ($bookings as $book)
                    <option value="{{$book->room_number}}">{{$book->room_number}}, {{$book->status}}</option>
                    @endforeach
                    <option value="{{$room->room_number}}">{{$room->room_number}}</option>
                    {{-- @endif --}}
                    @endforeach
                    {{-- @endif --}}

                </select><br><br>
                <label for="">Stay From</label>
                <input type="date" name="stay_from" id=""><br>
                @error('stay_from')
                    <span>Date field can not be empty!</span>
                @enderror
                <br>
            </div>
            <div class="personal-data-wrapper-lgx">
                <h2>Personal Information</h2><br><br>
                <label for="">Course:</label>
                <input type="text" name="course" id="" value="{{Auth::guard('student')->user()->course}}">
                <br>
                @error('course')
                <span>Course is required!</span>
                @enderror
                <br>
                <label for="">Level:</label>
                <input type="text" name="level" id="" value="{{Auth::guard('student')->user()->level}}"><br>
                @error('level')
                <span>Level is required!</span>
                @enderror
                <br>
                <label for="">Registration No:</label>
                <input type="text" name="reg_number" id="" value="{{Auth::guard('student')->user()->reg_number}}"><br>
                <br>
                <label for="">First Name:</label>
                <input type="text" name="first_name" id="" value="{{Auth::guard('student')->user()->first_name}}"><br><br>
                <label for="">Middle Name:</label>
                <input type="text" name="middle_name" id="" value="{{Auth::guard('student')->user()->middle_name}}"><br><br>
                <label for="">Last Name:</label>
                <input type="text" name="last_name" id="" value="{{Auth::guard('student')->user()->last_name}}"><br>
                @error('last_name')
                <span>Last name is required!</span>
                @enderror
                <br>
                <label for="">Gender:</label>
                <input type="text" name="gender" id="" value="{{Auth::guard('student')->user()->gender}}"><br>
                @error('gender')
                <span>Gender is required!</span>
                @enderror
                <br>
                <label for="">Contact No:</label>
                <input type="number" name="contact_number" id="" value="{{Auth::guard('student')->user()->contact_number}}"><br>
                @error('contact_number')
                    <span>Contact info is required!</span>
                @enderror
                <br>
                <label for="">Email Address:</label>
                <input type="email" name="email_address" id="" value="{{Auth::guard('student')->user()->email_address}}"><br><br>
                <label for="">Emergency Contact:</label>
                <input type="number" name="emergency_contact" id="" value="{{Auth::guard('student')->user()->emergency_contact}}"><br>
                @error('emergency_contact')
                    <span>Emergency number is required!</span>
                @enderror
                <br>
                <label for="">Guardian Name:</label>
                <input type="text" name="guardian_name" id="" value="{{Auth::guard('student')->user()->guardian_name}}"><br><br>
                <label for="">Guardian Contact:</label>
                <input type="number" name="guardian_contact" id="" value="{{Auth::guard('student')->user()->guardian_contact}}"><br><br>
                <label for="">Guardian Relation</label>
                <input type="text" name="guardian_relation" id="" value="{{Auth::guard('student')->user()->guardian_relation}}"><br><br>
            </div>
            <div class="address-wrapper-lgx">
                <h2>Permanent Address</h2><br><br>
                <label for="">City:</label>
                <input type="text" name="city" id="" value="{{Auth::guard('student')->user()->city}}"><br><br>
                <label for="">State:</label>
                <input type="text" name="state" id="" value="{{Auth::guard('student')->user()->state}}"><br><br>
                <label for="">Pin Code:</label>
                <input type="text" name="pincode" id="" value="{{Auth::guard('student')->user()->pincode}}"><br><br>
            </div><br>
            <button type="submit">Submit Application</button><br><br>
        </form>
    </div>
</center>
@endsection
