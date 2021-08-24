@extends('layout.master')

@section('title')
    Employees
@endsection()

@section('content')
<div class="content">
    <h3>Employees</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="mytab1"  style="font-size: 12px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Country<br>/City</th>
                    <th>Image</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Hired</th>
                    <th>Type</th>
                    <th>Dsg.ID</th>
                    <th>Dep.ID</th>
                    <th>Brch.ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->e_id }}</th>
                    <td style="word-break: break-word;">{{ $item->e_fname }} {{ $item->e_lname }}</td>
                    <td >{{ $item->e_dob }}</td>
                    <td style="word-break: break-word;">{{ $item->e_addr }}</td>
                    <td style="word-break: break-word;">{{ $item->e_cntry }}/{{ $item->e_city }}</td>
                    <td style="word-break: break-word;">{{ $item->e_image }}</td>
                    <td >{{ $item->e_phone }}</td>
                    <td style="word-break: break-word;">{{ $item->e_email }}</td>
                    <td >{{ $item->e_status }}</td>
                    <td >{{ $item->e_hiredate }}</td>
                    <td >{{ $item->et_id }}</td>
                    <td >{{ $item->dg_id }}</td>
                    <td >{{ $item->d_id }}</td>
                    <td >{{ $item->br_id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()