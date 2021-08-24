@extends('layout.master')

@section('title')
    Employees
@endsection()

@section('content')
<div class="content">
    <h3>Edit employee</h3>
    <form action="{{ url('/ed_employee') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">First Name</label>
                        <input type="text" name="ie_fname" id="ie_fname" class="form-control" required  required  placeholder="First Name" value="{{ $data[0]->e_fname }}">
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Last Name</label>
                        <input type="text" name="ie_lname" id="ie_lname" class="form-control" required  placeholder="Last Name" value="{{ $data[0]->e_lname }}">
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">DOB</label>
                        <input type="date" name="ie_dob" id="ie_dob" class="form-control" required value="{{ $data[0]->e_dob }}">
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Address</label>
                        <textarea name="ie_addr" id="ie_addr" class="form-control" required placeholder="Address" rows="3">{{ $data[0]->e_addr }}</textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Country</label>
                        <input type="text" name="ie_cntry" id="ie_cntry" class="form-control" required  placeholder="Country" value="{{ $data[0]->e_cntry }}">
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">City</label>
                        <input type="text" name="ie_city" id="ie_city" class="form-control" required  placeholder="City" value="{{ $data[0]->e_city }}">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="formFileMultiple" class="form-label">Image</label>
                        <input class="form-control" type="file" name="ie_image" id="ie_image">
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="formFileMultiple" class="form-label">Status</label>
                        <select name="ie_status" id="ie_status" class="form-select" required >
                            @if($data[0]->e_status == 1)
                            <option selected value="1">Active</option>
                            <option value="0">Deactive</option>
                            @else
                            <option value="1">Active</option>
                            <option selected value="0">Deactive</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Contact Number</label>
                        <input type="text" name="ie_phone" id="ie_phone" class="form-control" required  placeholder="Contact Number" value="{{ $data[0]->e_phone }}">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="ie_email" id="ie_email" class="form-control" required  placeholder="Email" value="{{ $data[0]->e_email }}">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Hired Date</label>
                        <input type="date" name="ie_hiredate" id="ie_hiredate" class="form-control" required value="{{ $data[0]->e_hiredate }}">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Employee Type</label>
                        <select name="iet_id" id="iet_id" class="form-select" required >
                            <option selected value="">Select employee type</option>
                            @foreach ($type as $item)
                                @if($data[0]->et_id == $item->et_id)
                                <option selected value="{{ $item->et_id }}">{{ $item->et_title }}</option>
                                @else
                                <option value="{{ $item->et_id }}">{{ $item->et_title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
               
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Designation</label>
                        <select name="idg_id" id="idg_id" class="form-select" required >
                            <option selected value="">Select employee's designation</option>
                            @foreach ($dsg as $item)
                                @if($data[0]->dg_id == $item->dg_id)
                                <option selected value="{{ $item->dg_id }}">{{ $item->dg_title }}</option>
                                @else
                                <option value="{{ $item->dg_id }}">{{ $item->dg_title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Branch</label>
                        <select name="ibr_id" id="ibr_id" class="form-select" required >
                        @foreach ($br as $item)
                            @if($data[0]->br_id == $item->br_id)
                            <option selected value="{{ $sel_br[0]->br_id }}">{{ $sel_br[0]->br_name }}</option>
                            @else
                            <option value="{{ $item->br_id }}">{{ $item->br_name }}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Department</label>
                        <select name="id_id" id="id_id" class="form-select" onfocus="br_dep()" required >
                        @foreach ($dep as $item)
                            @if($data[0]->d_id == $item->d_id)
                            <option selected value="{{ $sel_dep[0]->d_id }}">{{ $sel_dep[0]->d_name }}</option>
                            @else
                            <option value="{{ $item->d_id }}">{{ $item->d_name }}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <input type="hidden" name="ie_id" id="ie_id" value="{{ $data[0]->e_id }}">
                        <input type="hidden" name="iold_img" id="iold_img" value="{{ $data[0]->e_image }}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection()
