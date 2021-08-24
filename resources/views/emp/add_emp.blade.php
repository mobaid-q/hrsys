@extends('layout.master')

@section('title')
    Employees
@endsection()

@section('content')
<div class="content">
    @if(Session::get('admsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('admsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Add an employee</h3>
    <form action="{{ url('/add_employee') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">First Name</label>
                        <input type="text" name="ie_fname" id="ie_fname" class="form-control" required  required  placeholder="First Name">
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Last Name</label>
                        <input type="text" name="ie_lname" id="ie_lname" class="form-control" required  placeholder="Last Name">
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">DOB</label>
                        <input type="date" name="ie_dob" id="ie_dob" class="form-control" required >
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Address</label>
                        <textarea name="ie_addr" id="ie_addr" class="form-control" required placeholder="Address" rows="3"></textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Country</label>
                        <input type="text" name="ie_cntry" id="ie_cntry" class="form-control" required  placeholder="Country">
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">City</label>
                        <input type="text" name="ie_city" id="ie_city" class="form-control" required  placeholder="City">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="formFileMultiple" class="form-label">Image</label>
                        <!-- <input class="form-control" type="file" name="ie_image" id="ie_image" multiple required > -->
                        <input class="form-control" type="file" name="ie_image" id="ie_image" required >
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Contact Number</label>
                        <input type="text" name="ie_phone" id="ie_phone" class="form-control" required  placeholder="Contact Number">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="ie_email" id="ie_email" class="form-control" required  placeholder="Email">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Hired Date</label>
                        <input type="date" name="ie_hiredate" id="ie_hiredate" class="form-control" required >
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Employee Type</label>
                        <select name="iet_id" id="iet_id" class="form-select" required >
                            <option selected value="">Select employee type</option>
                            @foreach ($type as $item)
                                <option value="{{ $item->et_id }}">{{ $item->et_title }}</option>
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
                                <option value="{{ $item->dg_id }}">{{ $item->dg_title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Branch</label>
                        <select name="ibr_id" id="ibr_id" class="form-select" onchange="br_dep()" required >
                            <option selected value="">Select branch</option>
                            @foreach ($br as $item)
                                <option value="{{ $item->br_id }}">{{ $item->br_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Department</label>
                        <select name="id_id" id="id_id" class="form-select" required >
                            <option selected value="">Select assigned department</option>
                            <!-- @foreach ($dep as $item)
                                <option value="{{ $item->d_id }}">{{ $item->d_name }}</option>
                            @endforeach -->
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection()
