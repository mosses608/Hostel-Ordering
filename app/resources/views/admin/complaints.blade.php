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
                    @foreach ($complaints as $complain)
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
                            <a href="/admin/view-action/{{$complain->id}}"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="paginate-builder">
                    <br>
                    {{$complaints->links()}}
                </div>
            </div>
        </div>
    </div>
</center>

@endsection
