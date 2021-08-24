@extends('layout.emp_master')

@section('title')
    My Requests
@endsection()

@section('content')
<div class="pb-3"><span class="text-decoration-underline text-black-50 fs-4">Requests</span></div>
<div class="contanier-fluid">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="usertab">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Department</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->req_id }}</th>
                    <td>{{ $item->req_title }}</td>
                    <td>{{ $item->req_desc }}</td>
                    <td>{{ $item->d_id }}</td>
                    <td>{{ $item->req_status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>


@endsection()