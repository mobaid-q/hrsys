@extends('layout.master')

@section('title')
    Leave Quota
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
    <h3>Leave Quota</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="mytab1">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Allowed</th>
                    <th scope="col">Pending</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Emp. ID</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->lq_id }}</th>
                    <td>{{ $item->lq_title }}</td>
                    <td>{{ $item->lq_allowed }}</td>
                    <td>{{ $item->lq_pending }}</td>
                    <td>{{ $item->lq_sdate }}</td>
                    <td>{{ $item->lq_edate }}</td>
                    <td>{{ $item->e_id }}</td>
                    <td>
                        <a href="ed_quota/{{$item->lq_id}}" class="text-secondary"><i class="fa fa-edit"></i></a> | 
                        <a href="del_quota/{{$item->lq_id}}" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()