@extends('layout.master')

@section('title')
    Attendance
@endsection()

@section('content')
<div class="content">
    <h3>Edit attendance</h3>
    <form action="{{ url('/ed_attend') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Date</label>
                <input type="date" name="iat_date" id="iat_date" class="form-control" required value="{{ $data[0]->at_date }}">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Check-in</label>
                <input type="time" name="iat_checkin" id="iat_checkin" class="form-control" required value="{{ $data[0]->at_checkin }}">
            </div>
        </div>

        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Check-out</label>
                <input type="time" name="iat_checkout" id="iat_checkout" class="form-control" required value="{{ $data[0]->at_checkout }}">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Employee</label>
                <select name="ie_id" id="ie_id" class="form-select" required >
                    <option value="">Select employee</option>
                    @foreach($emp as $item)
                        @if($data[0]->e_id == $item->e_id)
                            <option selected value="{{ $item->e_id }}">{{ $item->e_id }} | {{ $item->e_fname." ".$item->e_lname }}</option>
                        @else
                            <option value="{{ $item->e_id }}">{{ $item->e_id }} | {{ $item->e_fname." ".$item->e_lname }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>        
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Type</label>
                <select name="iat_type" id="iat_type" class="form-select" required >
                    <option value="">Select type</option>
                    <option selected value="{{ $data[0]->at_type }}">{{ $data[0]->at_type }}</option>
                    @if($data[0]->at_type == "Manual")
                    <option value="Machine">Machine</option>
                    @else
                    <option value="Manual">Manual</option>
                    @endif
                </select>
            </div>
        </div>        

        <input type="hidden" name="iat_id" id="iat_id" value="{{ $data[0]->at_id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()