@extends('layout.master')

@section('title')
    Departments
@endsection()

@section('content')
<div class="content">
    <h3>Edit department</h3>
    <form action="{{ url('/ed_dept') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="id_name" id="id_name" class="form-control" placeholder="Department Name" required value="{{ $data[0]->d_name }}">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Branch</label>
                <select name="ibr_id" id="ibr_id" class="form-select" required >
                    <option value="">Select branch</option>
                    @foreach ($branch as $item)
                        @if($data[0]->br_id == $item->br_id)
                            <option selected value="{{ $item->br_id }}">{{ $item->br_id }} | {{ $item->br_name }}</option>
                        @else
                        <option value="{{ $item->br_id }}">{{ $item->br_id }} | {{ $item->br_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>        
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Details</label>
                <textarea name="id_details" id="id_details" class="form-control" placeholder="Department Details" rows="3" required >{{ $data[0]->d_details }}</textarea>
            </div>
        </div>

        <input type="hidden" name="id_id" id="id_id" value="{{ $data[0]->d_id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()