@extends('layout.master')

@section('title')
    Departments
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
    <h3>Departments</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="mytab1">
            <thead>
                <tr>
                    <th scope="col">Dept. ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Branch ID</th>
                    <th scope="col">Details</th>
                    <th scope="col">Dept. Head</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->d_id }}</th>
                    <td>{{ $item->d_name }}</td>
                    <td>{{ $item->br_id }}</td>
                    <td>{{ $item->d_details }}</td>
                    <td>{{ $item->d_head }}</td>
                    <td>
                        <a href="ed_dept/{{$item->d_id}}" class="text-secondary"><i class="fa fa-edit"></i></a> | 
                        <a href="del_dept/{{$item->d_id}}" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()