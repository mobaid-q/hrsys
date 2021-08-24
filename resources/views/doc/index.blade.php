@extends('layout.master')

@section('title')
    Documents
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
    <h3>Documents</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="mytab1">
            <thead>
                <tr>
                    <th scope="col">Doc. ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Files</th>
                    <th scope="col">Emp. ID</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->doc_id }}</th>
                    <td>{{ $item->doc_title }}</td>
                    <td>{{ $item->doc_files }}</td>
                    <td>{{ $item->e_id }}</td>
                    <td>
                        <a href="ed_doc/{{$item->doc_id}}" class="text-secondary"><i class="fa fa-edit"></i></a> | 
                        <a href="del_doc/{{$item->doc_id}}" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()