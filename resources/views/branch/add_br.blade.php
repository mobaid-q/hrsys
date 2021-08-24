@extends('layout.master')

@section('title')
    Branches
@endsection()

@section('content')
<div class="content">
    @if(Session::get('admsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('admsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Add a branch</h3>
    <form action="{{ url('/add_branch') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="ibr_name" id="ibr_name" class="form-control" placeholder="Branch Name" required >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Details</label>
                <textarea name="ibr_details" id="ibr_details" class="form-control" placeholder="Branch Details" rows="3" required ></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()