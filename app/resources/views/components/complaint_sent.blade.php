@if (session()->has('complaint_sent'))
<div class="message-out-flash">
    <p>{{session('complaint_sent')}}</p>
    <button class="close-wrapp">&times;</button>
</div>
@endif
