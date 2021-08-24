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
    <h3>Upload attendance sheet</h3>
    <form action="{{ url('/upl_attend') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <div class="col-sm-6">
                <label for="formFileMultiple" class="form-label">Attendance Sheet</label>
                <input class="form-control" type="file" name="iatt_sheet" id="iatt_sheet" required >
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()