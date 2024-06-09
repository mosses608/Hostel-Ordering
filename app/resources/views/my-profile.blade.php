@extends('dash-layout')

@section('content')
<br><br><br>
@include('partials.side-menu')

<x-message_updated />

<x-success_pass_user_updated />

<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">My Profile</h1><br><br><hr><hr><hr>
        <br>
        <div class="left-panel-wrapper-lgx">
            <img src="{{Auth::guard('student')->user()->profile ? asset('storage/' . Auth::guard('student')->user()->profile): asset('assets/images/profile.png')}}" alt="My Profile"><br>
            <div class="writtable-cont-wrap">
                <p>First Name: {{Auth::guard('student')->user()->first_name}}</p><br><hr><br>
                <p>Middle Name: {{Auth::guard('student')->user()->middle_name}}</p><br><hr><br>
                <p>Last Name: {{Auth::guard('student')->user()->last_name}}</p><br><hr><br>
                <p>Registration No: {{Auth::guard('student')->user()->reg_number}}</p><br><hr><br>
                <p>Course: {{Auth::guard('student')->user()->course}}</p><br><hr><br>
                <p>Level: {{Auth::guard('student')->user()->level}}</p><br><hr><br>
                <p>Gender: {{Auth::guard('student')->user()->gender}}</p><br><hr><br>
                <p>Contact Info: {{Auth::guard('student')->user()->contact_number}}</p><br><hr><br>
                <p>Email Address: {{Auth::guard('student')->user()->email_address}}</p><br><hr><br>
                <p>Emergency Contact: {{Auth::guard('student')->user()->emergency_contact}}</p><br><hr><br>
                <p>Guardian Name: {{Auth::guard('student')->user()->guardian_name}}</p><br><hr><br>
                <p>Guardian Contact: {{Auth::guard('student')->user()->guardian_contact}}</p><br><hr><br>
                <p>Guardian Relation: {{Auth::guard('student')->user()->guardian_relation}}</p><br><hr><br>
                <p>City: {{Auth::guard('student')->user()->city}}</p><br><hr><br>
                <p>State: {{Auth::guard('student')->user()->state}}</p><br><hr><br>
                <p>Pincode: {{Auth::guard('student')->user()->pincode}}</p><br><hr><br>
            </div>
        </div>
        <button class="change-mode-wrapp"><span class="profile-mode-init" onclick="loadEditProfileForm()">Edit Profile</span><span class="profile-sec-mode" onclick="changePasswordMode()">Change Password</span></button><br><br><br>
        <form action="/students/edit_account/{{Auth::guard('student')->user()->id}}" method="POST" class="profile-edit-wrapp-lgx" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="">Middle Name:</label>
            <input type="text" name="middle_name" id="" value="{{Auth::guard('student')->user()->middle_name}}"><br><br>
            <label for="">Last Name:</label>
            <input type="text" name="last_name" id="" value="{{Auth::guard('student')->user()->last_name}}"><br><br>
            <label for="">Gender:</label>
            <select name="gender" id="">
                <option value="{{Auth::guard('student')->user()->gender}}">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br><br>
            <label for="">Course:</label>
            <select name="course" id="">
                <option value="{{Auth::guard('student')->user()->course}}">Select Course</option>
                <option value="ICT">ICT</option>
            </select><br><br>
            <label for="">Level:</label>
            <select name="level" id="">
                <option value="{{Auth::guard('student')->user()->level}}">Select Level</option>
                <option value="UQF8, 3rd Year">UQF8, 3rd Year</option>
            </select><br><br>
            <label for="">Profile Picture:</label>
            <input type="file" name="profile" id="" style="border: none;"><br><br>
            <label for="">Contact Info:</label>
            <input type="number" name="contact_number" id="" value="{{Auth::guard('student')->user()->contact_number}}"><br><br>
            <label for="">Email Address:</label>
            <input type="email" name="email_address" id="" value="{{Auth::guard('student')->user()->email_address}}"><br><br>
            <label for="">Emergency:</label>
            <input type="number" name="emergency_contact" id="" value="{{Auth::guard('student')->user()->emergency_contact}}"><br><br>
            <label for="">Guardian:</label>
            <input type="text" name="guardian_name" id="" value="{{Auth::guard('student')->user()->guardian_name}}"><br><br>
            <label for="">Guardian Cont:</label>
            <input type="number" name="guardian_contact" id="" value="{{Auth::guard('student')->user()->guardian_contact}}"><br><br>
            <label for="">Guardian Rel:</label>
            <input type="text" name="guardian_relation" id="" value="{{Auth::guard('student')->user()->guardian_relation}}"><br><br>
            <label for="">City:</label>
            <input type="text" name="city" id="" value="{{Auth::guard('student')->user()->city}}"><br><br>
            <label for="">State:</label>
            <input type="text" name="state" id="" value="{{Auth::guard('student')->user()->state}}"><br><br>
            <label for="">Pincode:</label>
            <input type="text" name="pincode" id="" value="{{Auth::guard('student')->user()->pincode}}"><br><br><br>
            <button type="submit">Edit Profile</button><br><br>
        </form>

        <form action="/students/edit_password/{{Auth::guard('student')->user()->id}}" method="POST" class="edit-passc-wrapper">
            @csrf
            @method('PUT')
            <label for="">Username:</label>
            <input type="text" name="username" id="" value="{{Auth::guard('student')->user()->username}}"><br><br>
            <label for="">Password:</label>
            <input type="text" name="password" id="" value="{{Auth::guard('student')->user()->password}}"><br><br>
            <button type="submit">Change Password</button><br><br>
        </form><br><br><br>
    </div>
</center>
@endsection
