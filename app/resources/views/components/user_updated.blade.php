@if (session()->has('user_updated'))
<div class="message-out-flash">
    <p>{{session('user_updated')}}</p>
    <button class="close-wrapp">&times;</button>
</div>
@endif
