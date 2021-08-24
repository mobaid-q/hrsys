@extends('layout.master')

@section('title')
    Employee Types
@endsection()

@section('content')
<div class="content">
    <h3>Edit employee type</h3>
    <form action="{{ url('/ed_emptype') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="iet_title" id="iet_title" class="form-control" placeholder="Title for the type" required value="{{ $data[0]->et_title }}">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea name="iet_desc" id="iet_desc" class="form-control" placeholder="Describe the type" rows="3" required >{{ $data[0]->et_desc }}</textarea>
            </div>
        </div>

        <input type="hidden" name="iet_id" id="iet_id" value="{{ $data[0]->et_id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()