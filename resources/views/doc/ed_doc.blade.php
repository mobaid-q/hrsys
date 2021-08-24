@extends('layout.master')

@section('title')
    Documents
@endsection()

@section('content')
<div class="content">
    <h3>Edit documents</h3>
    <form action="{{ url('/ed_doc') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Employee</label>
                <select name="ie_id" id="ie_id" class="form-select" required >
                    <option selected>Select employee</option>
                    @foreach ($emp as $item)
                        @if($data[0]->e_id == $item->e_id)
                        <option selected value="{{ $item->e_id }}">{{ $item->e_id }} | {{ $item->e_fname." ".$item->e_lname }}</option>
                        @else
                        <option value="{{ $item->e_id }}" disabled>{{ $item->e_id }} | {{ $item->e_fname." ".$item->e_lname }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex-container" id="upl_blk">
            <div class="row mb-3" id="upl_blk_1">
                <div class="col-4 f_title">
                    <input type="text" class="form-control" placeholder="Title" name="ifile_title" id="ifile_title" required value="{{ $data[0]->doc_title }}">
                </div>
                <div class="col-4 f_doc">
                    <input type="file" class="form-control" name="idoc_files" id="idoc_files" >
                    <div class="form-text fst-italic"><b>Old file:</b> {{ $data[0]->doc_files }}</div>
                    
                </div>
            </div>
        </div>

        <input type="hidden" name="iold_file" id="iold_file" value="{{ $data[0]->doc_files }}">
        <input type="hidden" name="idoc_id" id="idoc_id" value="{{ $data[0]->doc_id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()