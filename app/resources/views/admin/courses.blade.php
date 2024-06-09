@extends('admin.admin-layout')

@section('content')

<br><br><br>
@include('partials.admin-side-menu')

<x-admin_flash_message />

<x-course_stored />

<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">Courses Management</h1><br><br><hr><hr><hr>
        <br>
        <div class="add-course-main-course-wrapp">
            <h1>Add Course</h1><br>
            <form action="/courses" method="POST" class="add-course-wrapp-form">
                @csrf
                <label for="">Course Code</label>
                <input type="text" name="course_code" id=""><br><br>
                <label for="">Course Name <strong>(Short)</strong></label>
                <input type="text" name="short_form_name" id=""><br><br>
                <label for="">Course Name <strong>(Full)</strong></label>
                <input type="text" name="long_form_name" id=""><br><br>
                <button type="submit">Add Course</button><br><br>
            </form>
        </div>
        <button class="viewable-component-head"><a href="/admin/view-courses"><i class="fa fa-eye"></i> View Courses</a></button>
    </div>
</center>

@endsection
