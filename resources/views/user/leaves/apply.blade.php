@extends('layout.emp_master')

@section('title')
    Apply Leave
@endsection()

@section('content')
<div id="alert_lev_days"></div>
<div class="pb-3"><span class="text-decoration-underline text-black-50 fs-4">Apply for leave</span></div>
<div class="contanier-fluid">
    <form action="{{ url('/user/apply_lev') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Leave Quota</label>
                        <select name="ilq_id" id="ilq_id" class="form-select"  onchange="qty_chk()" required >
                            <option selected value="">Select leave quota</option>
                            @foreach($data as $item)
                            <option value="{{ $item->lq_id }}">{{ $item->lq_title }}</option>
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
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Details</label>
                        <textarea name="il_details" id="il_details" class="form-control" required  placeholder="Leave Details" rows="3"></textarea>
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
                        <label for="exampleInputEmail1" class="form-label">Alternate Emploee</label>
                        <select name="il_alter_eid" id="il_alter_eid" class="form-select"  required >
                            <option selected value="">Select employee</option>
                            @foreach($emp as $item)
                            <option value="{{ $item->e_id }}">{{ $item->e_id.' | '.$item->e_fname.' '.$item->e_lname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    
</div>
@endsection()

@section('j_scripts')
<script>
// var qty = '{{ session()->get("Sick") }}';
// jQuery('#test').text(qty);
</script>
@endsection()