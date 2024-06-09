<div class="side-menu-wrapper-lgx">
    <div class="home-toggle-wrap">
        <span><i class="fa fa-home"></i></span> <a href="/dashboard">Dashboard</a>
    </div>
    <div class="book-toggle-wrap">
        <span><i class="fa fa-book"></i></span> <a href="/book-hostel">Book Hostel</a>
    </div>
    <div class="room-toggle-wrap">
        <span><i class="fas fa-file-alt"></i></span> <a href="/room-details">Room Details</a>
    </div>
    <div class="complaint-toggle-wrap">
        <span><i class="fas fa-file-alt"></i></span> <a href="/send-complaint">Send Complaints</a>
    </div>
    <div class="feedback-toggle-wrap">
        <span><i class="fa fa-comments"></i></span> <a href="/feedbacks">Feedbacks</a>
    </div>
    <div class="profile-toggle-wrap">
        <span><i class="fa fa-user"></i></span> <a href="/my-profile">My Profile</a>
    </div>
    <form action="/logout" method="POST" class="inavlidate-auth-wrapp">
        @csrf
        <button type="submit"><span><i class="fa fa-sign-out"></i></span> <a href="#">Logout</a></button>
    </form>
</div>


<!--MOBILE VIEW SIDE MENU -->
    <div class="side-menu-wrapper-lgx-mobile">
        <div class="side-menu-mobile">
            <img src="{{Auth::guard('student')->user()->profile ? asset('storage/' . Auth::guard('student')->user()->profile): asset('assets/images/profile.png')}}" alt="My Profile">
            <h1>{{Auth::guard('student')->user()->first_name}}</h1>
        </div><br><br><br>
    <div class="home-toggle-wrap">
        <span><i class="fa fa-home"></i></span> <a href="#">Dashboard</a>
    </div>
    <div class="book-toggle-wrap">
        <span><i class="fa fa-book"></i></span> <a href="#">Book Hostel</a>
    </div>
    <div class="room-toggle-wrap">
        <span><i class="fas fa-file-alt"></i></span> <a href="#">Room Details</a>
    </div>
    <div class="complaint-toggle-wrap">
        <span><i class="fas fa-file-alt"></i></span> <a href="#">Send Complaints</a>
    </div>
    <div class="feedback-toggle-wrap">
        <span><i class="fa fa-comments"></i></span> <a href="#">Feedbacks</a>
    </div>
    <div class="profile-toggle-wrap">
        <span><i class="fa fa-user"></i></span> <a href="#">My Profile</a>
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
