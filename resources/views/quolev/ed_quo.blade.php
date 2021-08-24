@extends('layout.master')

@section('title')
    Leave Quota
@endsection()

@section('content')
<div class="content">
    <h3>Edit quota</h3>
    <form action="{{ url('/ed_quota') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Quota Title</label>
                <select name="ilq_title" id="ilq_title" class="form-select" required >
                    <option value="">Select title</option>
                    <option {{ $sel = $data[0]->lq_title == 'Annual' ? 'selected':'' }} value="Annual">Annual</option>
                    <option {{ $sel = $data[0]->lq_title == 'Sick' ? 'selected':'' }} value="Sick">Sick</option>
                    <option {{ $sel = $data[0]->lq_title == 'Emergency' ? 'selected':'' }} value="Emergency">Emergency</option>
                </select>
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Allowed</label>
                <input type="number" min="1" name="ilq_allowed" id="ilq_allowed" class="form-control" required  placeholder="Allowed leaves in quota" value="{{ $data[0]->lq_allowed }}">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Pending</label>
                <input type="number" min="1" name="ilq_pending" id="ilq_pending" class="form-control" required  placeholder="Pending leaves in quota" value="{{ $data[0]->lq_pending }}">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Start Date</label>
                <input type="date" name="ilq_sdate" id="ilq_sdate" class="form-control" required value="{{ $data[0]->lq_sdate }}" >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">End Date</label>
                <input type="date" name="ilq_edate" id="ilq_edate" class="form-control" required value="{{ $data[0]->lq_edate }}" >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Employee</label>
                <select name="ie_id" id="ie_id" class="form-select" required >
                    <option selected>Select employee</option>
                    @foreach ($emp as $item)
                        @if($data[0]->e_id == $item->e_id)
                        <option selected value="{{ $item->e_id }}">{{ $item->e_id }} | {{ $item->e_fname." ".$item->e_lname }}</option>
                        @else
                        <option value="{{ $item->e_id }}">{{ $item->e_id }} | {{ $item->e_fname." ".$item->e_lname }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <input type="hidden" name="ilq_id" id="ilq_id" value="{{ $data[0]->lq_id }}">
        <button type="submit" class="btn btn-primary">Submit</button>        
    </form>    
</div>
@endsection()