@extends('dash-layout')

@section('content')
<br><br><br>
@include('partials.side-menu')

<x-complaint_sent />

<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">Register Complaint</h1><br><br><hr><hr><hr>
        <br>
        <form action="/complaints" method="POST" class="complaint-wrapper-ajax-lgx" enctype="multipart/form-data">
            @csrf
            <label for="">Complaint Type</label>
            <select name="complaint_type" id="">
                <option value="//">Select Complaint Type</option>
                <option value="Food Related">Food Related</option>
                <option value="Room Related">Room Related</option>
                <option value="Fee Related">Fee Related</option>
                <option value="Electrical">Electrical</option>
                <option value="Plumbing">Plumbing</option>
                <option value="Discipline">Discipline</option>
                <option value="Other">Other</option>
            </select><br><br>
            <label for="">Explain the Complaint</label>
            <textarea name="description" id=""></textarea><br><br>
            <label for="">File <strong>(if any)</strong></label>
            <input type="file" name="file_complaint" id="" style="border:none;"><br><br><br>
            <button type="submit">Submit</button>
            <button type="button" style="background-color: rgb(67, 155, 232);"><a href="/view-complaints" style="color: #000;"><i class="fa fa-eye"></i> View</a></button>
            <br><br>
        </form>
    </div>
</center>
@endsection
