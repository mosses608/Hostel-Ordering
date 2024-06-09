@if (session()->has('room_updated'))
<div class="message-out-flash">
    <p>{{session('room_updated')}}</p>
    <button class="close-wrapp">&times;</button>
</div>
@endif
