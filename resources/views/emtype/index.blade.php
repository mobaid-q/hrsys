@extends('layout.master')

@section('title')
    Employee Types
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
    <h3>Employee Types</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="mytab1">
            <thead>
                <tr>
                    <th scope="col">Type ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">ِAction</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->et_id }}</th>
                    <td>{{ $item->et_title }}</td>
                    <td>{{ $item->et_desc }}</td>
                    <td>
                        <a href="ed_emptype/{{$item->et_id}}" class="text-secondary"><i class="fa fa-edit"></i></a> | 
                        <a href="del_emptype/{{$item->et_id}}" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()