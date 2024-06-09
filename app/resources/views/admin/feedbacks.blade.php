@extends('admin.admin-layout')

@section('content')

<br><br><br>
@include('partials.admin-side-menu')


<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">Send Feedbacks</h1><br><br><hr><hr><hr>
        <br>
        <div class="viewable-container-wrapper">
            <div class="viewable-scroll-media">
            <table>
                <tr>
                    <th>Sno</th>
                    <th>Access To Warden</th>
                    <th>Redressal To Problems</th>
                    <th>Room Condition</th>
                    <th>General Rating</th>
                    <th>Reg Date</th>
                </tr>
                @foreach ($feedback as $feed)
                <tr>
                    <td>{{$feed->id}}</td>
                    <td>{{$feed->access_warden}}</td>
                    <td>{{$feed->redressal_problem}}</td>
                    <td>{{$feed->room_condition}}</td>
                    <td>{{$feed->rating}}</td>
                    <td>{{$feed->created_at}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="paginate-builder">
            <br>
            {{$feedback->links()}}
        </div>
        </div>
    </div>
</center>

@endsection
