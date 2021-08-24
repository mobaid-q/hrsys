@extends('layout.master')

@section('title')
    Designations
@endsection()

@section('content')
<div class="content">
    <h3>Edit designation</h3>
    <form action="{{ url('/ed_dsgns') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="idg_title" id="idg_title" class="form-control" placeholder="Designation title" value="{{ $data[0]->dg_title }}" required >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea name="idg_desc" id="idg_desc" class="form-control" placeholder="Description for designation" rows="3" required >{{ $data[0]->dg_desc }}</textarea>
            </div>
        </div>        

        <input type="hidden" name="idg_id" id="idg_id" value="{{ $data[0]->dg_id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()