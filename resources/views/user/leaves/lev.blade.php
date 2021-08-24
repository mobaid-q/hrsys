@extends('layout.emp_master')

@section('title')
    My Home
@endsection()

@section('content')
<div class="pb-3"><span class="text-decoration-underline text-black-50 fs-4">Leaves</span></div>
<div class="contanier-fluid">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="usertab">
            <thead>
                <tr>
                    <th scope="col">Leave ID</th>
                    <th scope="col">Qty</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Details</th>
                    <th scope="col">Leave Contact#</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quo_emp as $item)
                <tr>
                    <th scope="row">{{ $item->l_id }}</th>
                    <td>{{ $item->l_qty }}</td>
                    <td>{{ $item->l_sdate }}</td>
                    <td>{{ $item->l_edate }}</td>
                    <td>{{ $item->l_details }}</td>
                    <td>{{ $item->l_ephone }}</td>
                    <td>{{ $item->lq_title }}</td>
                </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>
    
</div>


@endsection()