@extends('layout.master')

@section('title')
    Payments
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
    <h3>Payments</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="mytab1">
            <thead>
                <tr>
                    <th scope="col">Pay. ID</th>
                    <th scope="col">Period</th>
                    <th scope="col">Emp. ID</th>
                    <th scope="col">Net Salary</th>
                    <th scope="col">Deductions</th>
                    <th scope="col">Additions</th>
                    <th scope="col">Paid</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->p_id }}</th>
                    <td>{{ $item->p_period }}</td>
                    <td>{{ $item->e_id }}</td>
                    <td>{{ $item->es_nsal }}</td>
                    <td>{{ $item->p_ded }}</td>
                    <td>{{ $item->p_add }}</td>
                    <td>{{ $item->p_paid }}</td>
                    <!--td>
                        <a href="ed_payments/{{$item->p_id}}" class="text-secondary"><i class="fa fa-edit"></i></a> | 
                        <a href="del_payments/{{$item->p_id}}" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td-->
                </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection()