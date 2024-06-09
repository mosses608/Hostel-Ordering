@if (session()->has('room_created'))
<div class="message-out-flash">
    <p>{{session('room_created')}}</p>
    <button class="close-wrapp">&times;</button>
</div>
@endif
