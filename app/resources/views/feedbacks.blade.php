@extends('dash-layout')

@section('content')
<br><br><br>
@include('partials.side-menu')

<x-feedback_sent />

<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">Feedback</h1><br><br><hr><hr><hr>
        <br>
        <div class="centered-ajax-wrapper">
            @foreach ($bookings as $booking)
            @if ($booking->reg_number != Auth::guard('student')->user()->reg_number)
            <div class="non-eligibvle-show-wrapp">
                <p>You are not eligible to view feedbacks untill you apply for hostel.</p>
            </div>
            @else
            <form action="/feedbacks" method="POST" class="send-feedbacks-wrapp">
                @csrf
                <label for="">Accessibility to Warden</label>
                <select name="access_warden" id="">
                    <option value="//">Select Option</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Very Good">Very Good</option>
                    <option value="Good">Good</option>
                    <option value="Average">Average</option>
                </select><br><br>
                <label for="">Redressal of Problems</label>
                <select name="redressal_problem" id="">
                    <option value="//">Select Option</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Very Good">Very Good</option>
                    <option value="Good">Good</option>
                    <option value="Average">Average</option>
                </select><br><br>
                <label for="">Room Condtion</label>
                <select name="room_condition" id="">
                    <option value="//">Select Option</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Very Good">Very Good</option>
                    <option value="Good">Good</option>
                    <option value="Average">Average</option>
                </select><br><br>
                <label for="">Overall Rating</label>
                <select name="rating" id="">
                    <option value="//">Select Option</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Very Good">Very Good</option>
                    <option value="Good">Good</option>
                    <option value="Average">Average</option>
                </select><br><br>
                <label for="">Feedback Message <strong>(If Any)</strong></label>
                <textarea name="message" id=""></textarea><br><br><br><br>
                <button type="submit">Submit</button><br><br>
            </form>
            @endif
            @endforeach
        </div>
    </div>
</center>
@endsection
