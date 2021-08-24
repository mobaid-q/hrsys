@extends('layout.master')

@section('title')
    Branches
@endsection()

@section('content')
<div class="content">
    <h3>Edit branch</h3>
    <form action="{{ url('/ed_branch') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="ibr_name" id="ibr_name" class="form-control" placeholder="Branch Name" required value="{{ $data[0]->br_name }}">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Details</label>
                <textarea name="ibr_details" id="ibr_details" class="form-control" placeholder="Branch Details" rows="3" required >{{ $data[0]->br_details }}</textarea>
            </div>
        </div>
        
        <input type="hidden" name="ibr_id" id="ibr_id" value="{{ $data[0]->br_id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()