@extends('admin.admin-layout')

@section('content')

<br><br><br>
@include('partials.admin-side-menu')


<center>
    <div class="main-dashboard-container-wraper">
        <h1 class="heading-wrapp">View Complaints</h1><br><br><hr><hr><hr>
        <br>
        <div class="flex-ajax-overflow-sub-cont">
            <h3>Complaint Details</h3>
            <div class="scrollable-contant">
                <table>
                    <tr>
                        <th>Sno</th>
                        <th>Complaint Type</th>
                        <th>Complaint Status</th>
                        <th>Complaint Reg. Date</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>
                            {{$complain->id}}
                        </td>
                        <td>
                            {{$complain->complaint_type}}
                        </td>
                        <td>
                            @if ($complain->status =="")
                            In processing...
                            @else
                            {{$complain->status}}
                            @endif

                        </td>
                        <td>
                            {{$complain->created_at}}
                        </td>
                        <td>
                            <button class="showFile" onclick="showFile()">File</button>
                            <div class="hidden-file-wrapper">
                                @if ($complain->file_complaint != "")
                                <img src="{{$complain->file_complaint ? asset('storage/' . $complain->file_complaint): asset('assets/images/profile.png')}}" alt="File Complaint"><br>
                                <p>{{$complain->description}}</p>
                                @else
                                <p>No file found!</p>
                                @endif
                            </div>
                            <button class="showEditForm" onclick="showEditStatusForm()"><i class="fa fa-edit"></i></button>
                            <form action="/complaints/edit_status/{{$complain->id}}" method="POST" class="edit-action-status">
                                @csrf
                                @method('PUT')
                                <label for="">Status</label>
                                <select name="status" id="">
                                    <option value="//">Select Status</option>
                                    <option value="Closed">Closed</option>
                                </select><br><br>
                                <label for="">Responses</label>
                                <input type="text" name="responses" id=""><br><br>
                                <button type="submit">Update</button><br><br>
                            </form>
                        </td>
                    </tr>

                </table>

            </div>
        </div>
        <script>
            function showFile(){
                document.querySelector('.hidden-file-wrapper').classList.toggle('active');
            }
            function showEditStatusForm(){
                document.querySelector('.edit-action-status').classList.toggle('active');
            }
        </script>
    </div>
</center>

@endsection
