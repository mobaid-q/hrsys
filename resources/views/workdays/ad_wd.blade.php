@extends('layout.master')

@section('title')
    Workdays
@endsection()

@section('content')
<div class="content">
    @if(Session::get('admsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('admsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Calculate workdays for a month</h3>
    <form action="{{ url('/ad_workdays') }}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-4">
                <label for="exampleInputEmail1" class="form-label">Period</label>
                <input type="date" name="iwo_period" id="iwo_period" class="form-control" required >
            </div>
        </div>

        <div class="flex-container" id="hday_blk">
            <div class="row mb-3" id="hday_blk_1">
                <div class="form-text fst-italic mb-1">To define the public holdiays, enter the date for the holiday in the format: "yyyy-mm-dd" OR leave it blank. </div>
                <div class="col-4 hday_date">
                    <input type="date" class="form-control" placeholder="Date of the holiday" name="ihd_date[]" id="ihd_date[]">
                </div>
            </div>
        </div>
        <input type="hidden" id="incr" value="1">

        <button type="submit" class="btn btn-primary">Generate</button>
        <button type="button" class="btn btn-outline-success" id="hday_add_btn">Add holidays</button>
    </form>
</div>
@endsection()

@section('j_scripts')
<script src="{{asset('assets/js/hdays_add.js')}}" ></script>
@endsection()