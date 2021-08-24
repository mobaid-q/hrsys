@extends('layout.master')

@section('title')
    Workdays
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
    <h3>Workdays</h3>
    <a href="{{ url('/ad_workdays') }}">Calculate more workdays</a>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered" id="mytab1">
            <thead>					 	
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Period (Y-m)</th>
                    <th scope="col">Total Days</th>
                    <th scope="col">Total Hours</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->wo_id }}</th>
                    <td>{{ $item->wo_period }}</td>
                    <td>{{ $item->wo_tdays }}</td>
                    <td>{{ $item->wo_thours }}</td>
                    <td>
                        <a href="ed_workdays/{{$item->wo_id}}" class="text-secondary"><i class="fa fa-edit"></i></a> | 
                        <a href="del_workdays/{{$item->wo_id}}" class="text-danger"><i class="fa fa-trash"></i></a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()