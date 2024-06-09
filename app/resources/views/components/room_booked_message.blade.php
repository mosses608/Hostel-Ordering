@if (session()->has('room_booked_message'))
<div class="message-out-flash">
    <p>{{session('room_booked_message')}}</p>
    <button class="close-wrapp">&times;</button>
</div>
@endif
