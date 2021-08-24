@extends('layout.master')

@section('title')
    Workdays
@endsection()

@section('content')
<div class="content">
    <h3>Edit workdays</h3>
    <form action="{{ url('/ed_workdays') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Period</label>
                <input type="date" name="iwo_period" id="iwo_period" class="form-control" required value="{{ date('Y-m-01', strtotime($data[0]->wo_period)) }}">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Total Days</label>
                <input type="text" name="iwo_tdays" id="iwo_tdays" class="form-control" required value="{{ $data[0]->wo_tdays }}" placeholder="Total number of working days in month">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Total Hours</label>
                <input type="text" name="iwo_thours" id="iwo_thours" class="form-control" required value="{{ $data[0]->wo_thours }}" placeholder="Total number of hours in month">
            </div>
        </div>
        
        <input type="hidden" name="iwo_id" id="iwo_id" value="{{ $data[0]->wo_id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()