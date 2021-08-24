@extends('layout.master')

@section('title')
    Attendance
@endsection()

@section('content')
<div class="content">
    @if(Session::get('edmsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('edmsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(Session::get('delmsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('delmsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Attendance</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="mytab1">
            <thead>
                <tr>
                    <th scope="col">Att. ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Check In</th>
                    <th scope="col">Check Out</th>
                    <th scope="col">Delayed</th>
                    <th scope="col">Hours Worked</th>
                    <th scope="col">Emp. ID</th>
                    <th scope="col">Att. Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->at_id }}</th>
                    <td>{{ $item->at_date }}</td>
                    <td>{{ $item->at_checkin }}</td>
                    <td>{{ $item->at_checkout }}</td>
                    <td>{{ $item->at_delayed }}</td>
                    <td>{{ $item->at_hrs_wrkd }}</td>
                    <td>{{ $item->e_id }}</td>
                    <td>{{ $item->at_type }}</td>
                    <td>
                        <a href="ed_attend/{{$item->at_id}}" class="text-secondary"><i class="fa fa-edit"></i></a> | 
                        <a href="del_attend/{{$item->at_id}}" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection()