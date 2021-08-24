@extends('layout.master')

@section('title')
    Departments
@endsection()

@section('content')
<div class="content">
    @if(Session::get('admsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('admsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Add a department</h3>
    <form action="{{ url('/add_dept') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="id_name" id="id_name" class="form-control" placeholder="Department Name" required >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Branch</label>
                <select name="ibr_id" id="ibr_id" class="form-select" required >
                    <option selected value="">Select branch</option>
                    @foreach ($data as $item)
                        <option value="{{ $item->br_id }}">{{ $item->br_id }} | {{ $item->br_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>        
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Details</label>
                <textarea name="id_details" id="id_details" class="form-control" placeholder="Department Details" rows="3" required ></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()