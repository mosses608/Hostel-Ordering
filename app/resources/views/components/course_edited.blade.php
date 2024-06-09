@if (session()->has('course_edited'))
<div class="message-out-flash">
    <p>{{session('course_edited')}}</p>
    <button class="close-wrapp">&times;</button>
</div>
@endif
