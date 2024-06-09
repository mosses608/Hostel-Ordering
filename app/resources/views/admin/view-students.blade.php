@extends('admin.admin-layout')

@section('content')

<br><br><br>
@include('partials.admin-side-menu')


<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">View Students</h1>
        <form action="/admin/view-students" method="GET" class="search-wrapp-container">
            @csrf
            <input type="text" name="search" id="" placeholder="Search..."><button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <br><br><hr><hr><hr>
        <br>
        <div class="flex-ajax-overflow-sub-cont">
            <h3>All Bookings</h3>
            <div class="scrollable-contant">
            <table>
                <tr>
                    <th>Reg No:</th>
                    <th>Last Name:</th>
                    <th>Course:</th>
                    <th>Level:</th>
                    <th>Block:</th>
                    <th>Room No:</th>
                    <th>Gender:</th>
                    <th>Contact:</th>
                    <th>Emergency:</th>
                    <th>Status</th>
                </tr>
                @foreach ($bookings as $book)
                <tr>
                    <td>{{$book->reg_number}}</td>
                    <td>{{$book->last_name}}</td>
                    <td>{{$book->course}}</td>
                    <td>{{$book->level}}</td>
                    <td>{{$book->block_name}}</td>
                    <td>{{$book->room_number}}</td>
                    <td>{{$book->gender}}</td>
                    <td>{{$book->contact_number}}</td>
                    <td>{{$book->emergency_contact}}</td>
                    <td>{{$book->status}}</td>
                </tr>
                @endforeach
            </table>
        </div>
            <br>
            <div class="paginate-builder">
                <br>
                {{$bookings->links()}}
            </div>
        </div>
    </div>
</center>

@endsection
