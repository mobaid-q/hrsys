@extends('layout.emp_master')

@section('title')
    Payments
@endsection()

@section('content')
<div class="pb-3"><span class="text-decoration-underline text-black-50 fs-4">Salary Paid</span></div>
<div class="contanier-fluid">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="usertab">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Period</th>
                    <th scope="col">Net Salary</th>
                    <th scope="col">Additions</th>
                    <th scope="col">Deductions</th>
                    <th scope="col">Paid</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->p_id }}</th>
                    <td>{{ $item->p_period }}</td>
                    <td>{{ $item->es_nsal }}</td>
                    <td>{{ $item->p_add }}</td>
                    <td>{{ $item->p_ded }}</td>
                    <td>{{ $item->p_paid }}</td>
                </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>
    
</div>


@endsection()