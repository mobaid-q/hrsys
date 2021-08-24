@extends('layout.master')

@section('title')
    Employee Types
@endsection()

@section('content')
<div class="content">
    @if(Session::get('admsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('admsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Add an employee type</h3>
    <form action="{{ url('/add_emptype') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="iet_title" id="iet_title" class="form-control" placeholder="Title for the type" required >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea name="iet_desc" id="iet_desc" class="form-control" placeholder="Describe the type" rows="3" required ></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()