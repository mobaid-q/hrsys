@extends('layout.master')

@section('title')
    Leaves
@endsection()

@section('content')
<div class="content">
    @if(Session::get('admsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('admsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Add a leave</h3>
    <form action="{{ url('/add_leaves') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Employee</label>
                        <select name="ie_id" id="ie_id" class="form-select" onchange="emp_lq()" required >
                            <option selected value="">Select employee</option>
                            @foreach ($data as $item)
                                <option value="{{ $item->e_id }}" >{{ $item->e_id }} | {{ $item->e_fname." ".$item->e_lname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Quantity</label>
                        <input type="number" min="1" name="il_qty" id="il_qty" class="form-control" required  placeholder="Quantity">
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Start Date</label>
                        <input type="date" name="il_sdate" id="il_sdate" class="form-control" required >
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">End Date</label>
                        <input type="date" name="il_edate" id="il_edate" class="form-control" required >
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Details</label>
                        <textarea name="il_details" id="il_details" class="form-control" required  placeholder="Leave Details" rows="3"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Alternate Employee</label>
                        <select name="il_alter_eid" id="il_alter_eid" class="form-select" required >
                            <option selected>Select alternate employee</option>
                            @foreach ($data as $item)
                                <option value="{{ $item->e_id }}">{{ $item->e_id }} | {{ $item->e_fname." ".$item->e_lname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Contact</label>
                        <input type="text" name="il_ephone" id="il_ephone" class="form-control" required  placeholder="Contact number when on leave">
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Leave Quota</label>
                        <select name="ilq_id" id="ilq_id" class="form-select"  required >
                            <option selected value="">Select leave quota</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection()