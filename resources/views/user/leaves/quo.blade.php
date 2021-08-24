@extends('layout.emp_master')

@section('title')
    My Home
@endsection()

@section('content')
<div class="pb-3"><span class="text-decoration-underline text-black-50 fs-4">Leaves Quota</span></div>
<div class="contanier-fluid">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="usertab">
            <thead>
                <tr>
                    <th scope="col">Quota ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Allowed</th>
                    <th scope="col">Pending</th>
                    <th scope="col">Start</th>
                    <th scope="col">End</th>
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
                </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>
    
</div>


@endsection()