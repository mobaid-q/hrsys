@extends('layout.master')

@section('title')
    Salaries
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
    <h3>Salaries</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="mytab1">
            <thead>
                <tr>
                    <th scope="col">Pkg. ID</th>
                    <th scope="col">Emp. ID</th>
                    <th scope="col">Agreed Salary</th>
                    <th scope="col">Taxed Salary</th>
                    <th scope="col">Account#</th>
                    <th scope="col">IBAN</th>
                    <th scope="col">Salary Start</th>
                    <th scope="col">Salary End</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->es_id }}</th>
                    <td>{{ $item->e_id }}</td>
                    <td>{{ $item->es_agreed }}</td>
                    <td>{{ $item->es_nsal }}</td>
                    <td>{{ $item->es_account }}</td>
                    <td>{{ $item->es_iban }}</td>
                    <td>{{ $item->es_start }}</td>
                    <td>{{ $item->es_end }}</td>
                    <td>
                        <a href="ed_salary/{{$item->es_id}}" class="text-secondary"><i class="fa fa-edit"></i></a> | 
                        <a href="del_salary/{{$item->es_id}}" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection()