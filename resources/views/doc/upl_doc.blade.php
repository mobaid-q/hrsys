@extends('layout.master')

@section('title')
    Documents
@endsection()

@section('content')
<div class="content">
    @if(Session::get('admsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('admsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Upload documents</h3>
    <form action="{{ url('/upload_docs') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Employee</label>
                <select name="ie_id" id="ie_id" class="form-select" required >
                    <option selected>Select employee</option>
                    @foreach ($data as $item)
                        <option value="{{ $item->e_id }}">{{ $item->e_id }} | {{ $item->e_fname." ".$item->e_lname }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex-container" id="upl_blk">
            <div class="row mb-3" id="upl_blk_1">
                <div class="col-4 f_title">
                    <input type="text" class="form-control" placeholder="Title" name="ifile_title[]" id="ifile_title[]" required>
                </div>
                <div class="col-4 f_doc">
                    <input type="file" class="form-control" name="idoc_files[]" id="idoc_files[]" required>
                </div>
            </div>
        </div>
        <input type="hidden" id="incr" value="1">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-outline-success" id="file_add_btn">Add Files</button>
    </form>
</div>
@endsection()