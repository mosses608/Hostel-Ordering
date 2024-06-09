@if (session()->has('success_pass_user_updated'))
<div class="message-out-flash">
    <p>{{session('success_pass_user_updated')}}</p>
    <button class="close-wrapp">&times;</button>
</div>
@endif
