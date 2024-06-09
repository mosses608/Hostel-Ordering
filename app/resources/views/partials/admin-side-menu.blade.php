<div class="side-menu-wrapper-lgx">
    <div class="home-toggle-wrap">
        <span><i class="fa fa-home"></i></span> <a href="/admin/dashboard">Dashboard</a>
    </div>
    <div class="book-toggle-wrap">
        <span><i class="fa fa-book"></i></span> <a href="/admin/courses">Courses</a>
    </div>
    <div class="room-toggle-wrap">
        <span><i class="fas fa-bed"></i></span> <a href="/admin/rooms">Rooms</a>
    </div>
    <div class="complaint-toggle-wrap">
        <span><i class="fas fa-users"></i></span> <a href="/admin/view-students">Students</a>
    </div>
    <div class="feedback-toggle-wrap">
        <span><i class="fa fa-comments"></i></span> <a href="/admin/feedbacks">Feedbacks</a>
    </div>
    <div class="profile-toggle-wrap">
        <span><i class="fa fa-file-alt"></i></span> <a href="/admin/complaints">Complaints</a>
    </div>
    <form action="/logout" method="POST" class="inavlidate-auth-wrapp">
        @csrf
        <button type="submit"><span><i class="fa fa-sign-out"></i></span> <a href="#">Logout</a></button>
    </form>
</div>


<!--MOBILE VIEW SIDE MENU -->
    <div class="side-menu-wrapper-lgx-mobile">
        <div class="side-menu-mobile">
            <img src="{{Auth::guard('web')->user()->profile ? asset('storage/' . Auth::guard('web')->user()->profile): asset('assets/images/profile.png')}}" alt="My Profile">
            <h1>{{Auth::guard('web')->user()->name}}</h1>
        </div><br><br><br><div class="home-toggle-wrap">
            <span><i class="fa fa-home"></i></span> <a href="/admin/dashboard">Dashboard</a>
        </div>
        <div class="book-toggle-wrap">
            <span><i class="fa fa-book"></i></span> <a href="/admin/courses">Courses</a>
        </div>
        <div class="room-toggle-wrap">
            <span><i class="fas fa-bed"></i></span> <a href="/admin/rooms">Rooms</a>
        </div>
        <div class="complaint-toggle-wrap">
            <span><i class="fas fa-users"></i></span> <a href="/send-complaint">Students</a>
        </div>
        <div class="feedback-toggle-wrap">
            <span><i class="fa fa-comments"></i></span> <a href="/feedbacks">Feedbacks</a>
        </div>
        <div class="profile-toggle-wrap">
            <span><i class="fa fa-file-alt"></i></span> <a href="/my-profile">Complaints</a>
        </div>
        <form action="/logout" method="POST" class="inavlidate-auth-wrapp">
            @csrf
            <button type="submit"><span><i class="fa fa-sign-out"></i></span> <a href="#">Logout</a></button>
        </form>
</div>

<script>
    document.querySelector('.toggle-view-wrapper').addEventListener('click', function(){
    document.querySelector('.side-menu-wrapper-lgx-mobile').classList.toggle('active');
});


document.querySelector('.touch-profile-wrapper').addEventListener('click', function(){
    document.querySelector('.sub-right-side-menu-wrapper').classList.toggle('active');
});

</script>
