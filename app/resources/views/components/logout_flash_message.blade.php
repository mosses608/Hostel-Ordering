@if (session()->has('logout_flash_message'))
<div class="message-out-flash">
    <p>{{session('logout_flash_message')}}</p>
    <button class="close-wrapp">&times;</button>
</div>
@endif
