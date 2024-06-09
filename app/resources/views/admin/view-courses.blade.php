@extends('admin.admin-layout')

@section('content')

<br><br><br>
@include('partials.admin-side-menu')

<x-admin_flash_message />

<x-course_stored />

<x-deleted_course />

<x-course_edited />

<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">Manage Courses</h1><br><br><hr><hr><hr>
        <br>
        <div class="centered-ajax-wrapper-courses">
            <h2>All Courses Details</h2><br>
            @if (count($courses) == 0)
            <p>No courses registered yet!</p>
            @else
            <div class="scrollable-table">
            <table>
                <tr>
                    <th>Sno</th>
                    <th>Course Code</th>
                    <th>Course Name (Short)</th>
                    <th>Course Name (Full)</th>
                    <th>Reg Date</th>
                    <th>Action</th>
                </tr>
                @foreach ($courses as $course)
                <tr>
                    <td>
                        {{$course->id}}
                    </td>
                    <td>
                        {{$course->course_code}}
                    </td>
                    <td>
                        {{$course->short_form_name}}
                    </td>
                    <td>
                        {{$course->long_form_name}}
                    </td>
                    <td>
                        {{$course->created_at}}
                    </td>
                    <td>
                        <button class="edit-form-course" onclick="showEditForm()"><i class="fa fa-edit"></i></button>
                        <form action="/courses/edit/{{$course->id}}" method="POST" class="edit-course-wrapp-info">
                            @csrf
                            @method('PUT')
                            <h3>Edit Course Details</h3><br>
                            <label for="">Course Code</label>
                            <input type="text" name="course_code" id="" value="{{$course->course_code}}"><br><br>
                            <label for="">Course Name <strong>(short)</strong></label>
                            <input type="text" name="short_form_name" id="" value="{{$course->short_form_name}}"><br><br>
                            <label for="">Course Name <strong>(Long)</strong></label>
                            <input type="text" name="long_form_name" id="" value="{{$course->long_form_name}}"><br><br>
                            <button type="submit" class="update-data-act">Edit Course</button><br><br>
                        </form>
                        <form action="/courses/delete/{{$course->id}}" method="POST" class="delete-course-action">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-action-button"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
            @endif
        </div>
        <br>
        <div class="paginate-builder">
            {{$courses->links()}}
        </div>
    </div>

    <script>
        function showEditForm(){
            document.querySelector('.edit-course-wrapp-info').classList.toggle('active');
        }
    </script>
</center>

@endsection
