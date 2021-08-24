@extends('layout.master')

@section('title')
    Leave Quota
@endsection()

@section('content')
<div class="content">
    @if(Session::get('admsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('admsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Add a quota</h3>
    <form action="{{ url('/add_quota') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Quota Title</label>
                <select name="ilq_title" id="ilq_title" class="form-select" required >
                    <option selected>Select title</option>
                    <option value="Annual">Annual</option>
                    <option value="Sick">Sick</option>
                    <option value="Emergency">Emergency</option>
                </select>
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Allowed</label>
                <input type="number" min="1" name="ilq_allowed" id="ilq_allowed" class="form-control" required  placeholder="Allowed leaves in quota">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Pending</label>
                <input type="number" min="1" name="ilq_pending" id="ilq_pending" class="form-control" required  placeholder="Pending leaves in quota">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Start Date</label>
                <input type="date" name="ilq_sdate" id="ilq_sdate" class="form-control" required >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">End Date</label>
                <input type="date" name="ilq_edate" id="ilq_edate" class="form-control" required >
            </div>
        </div>
        
        <div class="mb-3">
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

        <button type="submit" class="btn btn-primary">Submit</button>        
    </form>    
</div>
@endsection()