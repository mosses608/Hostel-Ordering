@extends('dash-layout')

@section('content')
<br><br><br>
@include('partials.side-menu')

<x-complaint_sent />

<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">View Complaint</h1><br><br><hr><hr><hr>
        <br>
        <div class="complaints-wrapper-viewer">
            @foreach ($complaints as $compl)
            <div class="item-loaded-wrap">
                <h2>Complaint Type: {{$compl->complaint_type}}</h2><br>
                <p><strong>Complaint Description:</strong> {{$compl->description}}</p>
                @if ($compl->file_complaint != "")
                <a href="{{'storage/' . $compl->file_complaint}}"><img src="{{$compl->file_complaint ? asset('storage/' . $compl->file_complaint): asset('assets/images/profile.png')}}" alt="Picture"></a>
                @endif
                <span>Sent on: {{$compl->created_at}}</span><br><br>
            </div><hr><hr>
            @endforeach
        </div>
        <br>
        <div class="paginate-builder">
            {{$complaints->links()}}
        </div>
    </div>
</center>
@endsection
