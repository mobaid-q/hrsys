@extends('layout.emp_master')

@section('title')
    My Home
@endsection()

@section('content')
<div class="pb-3"><span class="text-decoration-underline text-black-50 fs-4">Documents</span></div>
<div class="contanier-fluid">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="usertab">
            <thead>
                <tr>
                    <th scope="col">Doc. ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Download</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->doc_id }}</th>
                    <td>{{ $item->doc_title }}</td>
                    <td>
                        <a href="{{ url('/user/docs_dl/'.$item->doc_files) }}" class="text-info"><i class="fas fa-download"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection()