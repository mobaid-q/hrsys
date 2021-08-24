@extends('layout.master')

@section('title')
    Designations
@endsection()

@section('content')
<div class="content">
    @if(Session::get('admsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('admsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Add a designation</h3>
    <form action="{{ url('/add_dsgns') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="idg_title" id="idg_title" class="form-control" placeholder="Designation title" required >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea name="idg_desc" id="idg_desc" class="form-control" placeholder="Description for designation" rows="3" required ></textarea>
            </div>
        </div>        

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()