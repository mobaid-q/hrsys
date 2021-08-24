@extends('layout.emp_master')

@section('title')
    Salary Package
@endsection()

@section('content')
<div class="pb-3"><span class="text-decoration-underline text-black-50 fs-4">Salary Package</span></div>
<div class="contanier-fluid">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="usertab">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Gross Salary</th>
                    <th scope="col">Net Salary</th>
                    <th scope="col">From</th>
                    <th scope="col">Account No.</th>
                    <th scope="col">IBAN No.</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->es_id }}</th>
                    <td>{{ $item->es_agreed }}</td>
                    <td>{{ $item->es_nsal }}</td>
                    <td>{{ $item->es_start }}</td>
                    <td>{{ $item->es_account }}</td>
                    <td>{{ $item->es_iban }}</td>
                </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>
    
</div>


@endsection()