@extends('layout.master')

@section('title')
    Attendance
@endsection()

@section('content')
<div class="content">
    @if(Session::get('admsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('admsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Add attendance manually</h3>
    <form action="{{ url('/add_attend') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Date</label>
                <input type="date" name="iat_date" id="iat_date" class="form-control" required >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Check-in</label>
                <input type="time" name="iat_checkin" id="iat_checkin" class="form-control" required >
            </div>
        </div>

        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Check-out</label>
                <input type="time" name="iat_checkout" id="iat_checkout" class="form-control" required >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Employee</label>
                <select name="ie_id" id="ie_id" class="form-select" required >
                    <option selected value="">Select employee</option>
                    @foreach ($data as $item)
                        <option value="{{ $item->e_id }}">{{ $item->e_id }} | {{ $item->e_fname." ".$item->e_lname }}</option>
                    @endforeach
                </select>
            </div>
        </div>        
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Type</label>
                <select name="iat_type" id="iat_type" class="form-select" required >
                    <option selected>Select type</option>
                    <option value="Manual">Manual</option>
                    <option value="Machine">Machine</option>
                </select>
            </div>
        </div>        

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()