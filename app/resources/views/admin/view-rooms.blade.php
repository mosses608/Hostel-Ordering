@extends('admin.admin-layout')

@section('content')

<br><br><br>
@include('partials.admin-side-menu')

<x-room_updated />

<x-message_deleted />

<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">View Rooms</h1><br><br><hr><hr><hr>
        <br>
        <div class="viewable-container-wrapper">
            <h1>All Rooms</h1><br>
            <div class="viewable-scroll-media">
            <table>
                <tr>
                    <th>Sno</th>
                    <th>Seater</th>
                    <th>Block Name</th>
                    <th>Room Number</th>
                    <th>Reg Date</th>
                    <th>Action</th>
                </tr>
                @foreach ($rooms as $room)
                <tr>
                    <td>
                        {{$room->id}}
                    </td>
                    <td>
                        {{$room->seater}}
                    </td>
                    <td>
                        {{$room->block_name}}
                    </td>
                    <td>
                        {{$room->room_number}}
                    </td>
                    <td>
                        {{$room->created_at}}
                    </td>
                    <td>
                        <button class="edit-form-course" onclick="showEditFormRoom()"><i class="fa fa-edit"></i></button>
                        <form action="/rooms/edit_room/{{$room->id}}" method="POST" class="edit-room-wrapp-form">
                            @csrf
                            @method('PUT')
                            <label for="">Select Seater:</label>
                            <select name="seater" id="">
                                <option value="{{$room->seater}}">Select Seater</option>
                                <option value="3 Seaters">3 Seaters</option>
                                <option value="4 Seaters">4 Seaters</option>
                                <option value="5 Seaters">5 Seaters</option>
                            </select>
                            <br><br>
                            <label for="">Block Name:</label>
                            <select name="block_name" id="">
                                <option value="{{$room->block_name}}">Select Block</option>
                                <option value="6A">6A</option>
                                <option value="6B">6B</option>
                            </select>
                            <br><br>
                            <label for="">Room Number:</label>
                            <input type="text" name="room_number" id="" value="{{$room->room_number}}"><br><br>
                            <button type="submit">Edit Room</button><br><br>
                        </form>
                        <form action="/rooms/delete/{{$room->id}}" method="POST" class="delete-component">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-action-button"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="paginate-builder">
            <br>
            {{$rooms->links()}}
        </div>
        </div>
        <script>
            function showEditFormRoom(){
                document.querySelector('.edit-room-wrapp-form').classList.toggle('active');
            }
        </script>
    </div>
</center>

@endsection
