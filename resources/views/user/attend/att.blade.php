@extends('layout.emp_master')

@section('title')
    My Home
@endsection()

@section('content')
<div class="pb-3"><span class="text-decoration-underline text-black-50 fs-4">Attendance</span></div>
<div class="contanier-fluid">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="usertab">
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
                </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>
    
</div>


@endsection()