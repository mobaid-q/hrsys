@extends('layout.master')

@section('title')
    Leaves
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
    <h3>Leaves</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="mytab1">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Emp. ID</th>
                    <th scope="col">Quota ID</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Details</th>
                    <th scope="col">Alternate</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->l_id }}</th>
                    <td>{{ $item->e_id }}</td>
                    <td>{{ $item->lq_id }}</td>
                    <td>{{ $item->l_qty }}</td>
                    <td>{{ $item->l_sdate }}</td>
                    <td>{{ $item->l_edate }}</td>
                    <td>{{ $item->l_details }}</td>
                    <td>{{ $item->l_alter_eid }}</td>
                    <td>
                        <a href="ed_leaves/{{$item->l_id}}" class="text-secondary"><i class="fa fa-edit"></i></a> | 
                        <a href="del_leaves/{{$item->l_id}}" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()