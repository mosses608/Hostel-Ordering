@if (session()->has('booking_error'))
<div class="message-out-flash">
    <p>{{session('booking_error')}}</p>
    <button class="close-wrapp">&times;</button>
</div>
@endif
