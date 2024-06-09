@extends('dash-layout')

@section('content')
<br><br><br>
@include('partials.side-menu')

<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">Room Details</h1><br><br><hr><hr><hr>
        <br>
        <div class="room-related-wrapper">
            <h1>Room Related Information</h1>
            <div class="room-related-first">
            <table>
                <tr>
                    <th>Reg Number:</th>
                    <th>Block Name</th>
                    <th>Room Number:</th>
                    <th>Hostel Fee:</th>
                    <th>Stay From:</th>
                    <th>Appl Date:</th>
                    <th>Total Fee:</th>
                </tr>
                @foreach ($bookings as $booking)
                @if ($booking->reg_number == Auth::guard('student')->user()->reg_number)
                <tr>
                    <td>
                        {{$booking->reg_number}}
                    </td>
                    <td>
                        {{$booking->block_name}}
                    </td>
                    <td>
                        {{$booking->room_number}}
                    </td>
                    <td>
                        120000
                    </td>
                    <td>
                        {{$booking->stay_from}}
                    </td>
                    <td>
                        {{$booking->created_at}}
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
        </div>
            <br>
            <h1>Personal Information</h1>
            <div class="personal-info-second">
            <table>
                <tr>
                    <th>Reg No:</th>
                    <th>Full Name:</th>
                    <th>Gender:</th>
                    <th>Contact:</th>
                    <th>Emergency:</th>
                </tr>
                @foreach ($bookings as $booking)
                @if ($booking->reg_number == Auth::guard('student')->user()->reg_number)
                <tr>
                    <td>
                        {{$booking->reg_number}}
                    </td>
                    <td>
                        {{$booking->last_name}}
                    </td>
                    <td>
                        {{$booking->gender}}
                    </td>
                    <td>
                        {{$booking->contact_number}}
                    </td>
                    <td>
                        {{$booking->emergency_contact}}
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
        </div>
        </div>
    </div>
</center>
@endsection
