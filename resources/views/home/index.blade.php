@extends('layout.master')

@section('title')
    Home
@endsection()

@section('content')
<div class="content">
    <h3>Home</h3>
    <h5>Welcome to HRSYS</h5>
</div>
<div class="d-flex flex-sm-row flex-column justify-content-around">
    <div class="card m-2 text-white bg-danger" style="width: 18rem;">
        <img src="/show-image/sal_deduct.jpg/img" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Deductions</h5>
            <p class="card-text">Deductions based on delays in the employee's attendance.</p>
            <a href="#" class="btn btn-outline-light">View</a>
        </div>
    </div>

    <div class="card m-2 text-white bg-dark" style="width: 18rem;">
        <img src="/show-image/overtime.jpg/img" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Overtime</h5>
            <p class="card-text">Overtime is calculated after 48 hours completed in a week.</p>
            <a href="#" class="btn btn-outline-light">View</a>
        </div>
    </div>

    <div class="card m-2 text-white bg-primary" style="width: 18rem;">
        <img src="/show-image/users.jpg/img" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Users</h5>
            <p class="card-text">Change settings for the users available on the HRSYS.</p>
            <a href="{{ url('/sys_usrs') }}" class="btn btn-outline-light">View</a>
        </div>
    </div>
</div>

<div class="container-fluid mt-3">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="mytab2">
            <h5>Latest 5 unread requests</h5>
            <a href="{{ url('/requests') }}">>>more requests</a>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Department</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->req_id }}</th>
                    <td>{{ $item->req_title }}</td>
                    <td>{{ $item->req_desc }}</td>
                    <td>{{ $item->d_id }}</td>
                    <td>
                        <a href="ed_request/{{$item->req_id}}" class="text-secondary"><i class="fa fa-edit"></i></a> | 
                        <a href="del_request/{{$item->req_id}}" class="text-danger"><i class="fa fa-trash"></i></a> |
                        @if($item->req_status == 'read')
                        <a href="status_req/{{$item->req_id}}" class="text-info"><i class="fa fa-envelope-open"></i></a>
                        @else
                        <a href="status_req/{{$item->req_id}}" class="text-info"><i class="fa fa-envelope"></i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<hr>
<div class="container-fluid mt-3">
    <div class="table-responsive">
        <table class="table table-striped table-bordered mytab3">
            <h5>Employees retruning from leave</h5>
            <a href="{{ url('/leaves') }}">>>more leaves</a>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lev as $item)
                <tr class="text-danger">
                    <th scope="row">{{ $item->e_id }}</th>
                    <td>{{ $item->l_edate }}</td>
                    <td>{{ $item->e_fname.' '.$item->e_lname }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<hr>
<div class="container-fluid mt-3">
    <div class="table-responsive">
        <table class="table table-striped table-bordered mytab3">
            <h5>Delayed today</h5>
            <a href="{{ url('/attendance') }}">>>more attendance</a>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Checked In</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($delayed as $item)
                <tr class="text-danger">
                    <th scope="row">{{ $item->e_id }}</th>
                    <td>{{ $item->e_fname.' '.$item->e_lname }}</td>
                    <td>{{ $item->at_date }}</td>
                    <td>{{ $item->at_checkin }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection()

@section('j_scripts')
<script>
    $(document).ready( function () {
        $('#mytab2').DataTable({
            "ordering": false,
            "paginate": false
        });
        $('.mytab3').DataTable({
            "ordering": false,
            "paginate": true
        });
    });
</script>
@endsection()