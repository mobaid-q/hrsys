@extends('layout.master')

@section('title')
    Requests
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
    <h3>Requests from employees</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="mytab1">
            <thead>					 	
                <tr>
                    <th scope="col">Req. ID</th>
                    <th scope="col">Emp. ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Department</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->req_id }}</th>
                    <td>{{ $item->e_id }}</td>
                    <td>{{ $item->req_title }}</td>
                    <td>{{ $item->req_desc }}</td>
                    <td>{{ $item->req_status }}</td>
                    <td>{{ $item->d_id }}</td>
                    <td>
                        <a href="ed_request/{{$item->req_id}}" class="text-secondary"><i class="fa fa-edit"></i></a> | 
                        <a href="del_request/{{$item->req_id}}" class="text-danger"><i class="fa fa-trash"></i></a> |
                        @if($item->req_status == 'read')
                        <a href="status_req/{{$item->req_id}}" class="text-infp"><i class="fa fa-envelope-open"></i></a>
                        @else
                        <a href="status_req/{{$item->req_id}}" class="text-infp"><i class="fa fa-envelope"></i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()