@if (session()->has('course_stored'))
<div class="message-out-flash">
    <p>{{session('course_stored')}}</p>
    <button class="close-wrapp">&times;</button>
</div>
@endif
