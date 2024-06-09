@if (session()->has('deleted_course'))
<div class="message-out-flash">
    <p>{{session('deleted_course')}}</p>
    <button class="close-wrapp">&times;</button>
</div>
@endif
