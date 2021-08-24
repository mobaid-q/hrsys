@extends('layout.master')

@section('title')
    Employees
@endsection()

@section('content')
<div class="content">
    <h3>Add an employee</h3>
    <form>
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="text" name="ie_fname" id="ie_fname" class="form-control" placeholder="First Name">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="text" name="ie_lname" id="ie_lname" class="form-control" placeholder="Last Name">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">DOB</label>
                <input type="date" name="ie_dob" id="ie_dob" class="form-control">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Address</label>
                <textarea name="ie_addr" id="ie_addr" class="form-control" placeholder="Address" rows="3"></textarea>
            </div>
        </div>

        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Country</label>
                <input type="text" name="ie_cntry" id="ie_cntry" class="form-control" placeholder="Country">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">City</label>
                <input type="text" name="ie_city" id="ie_city" class="form-control" placeholder="City">
            </div>
        </div>

        <div class="mb-3">
            <div class="col-sm-4">
                <label for="formFileMultiple" class="form-label">Image</label>
                <!-- <input class="form-control" type="file" name="ie_image" id="ie_image" multiple> -->
                <input class="form-control" type="file" name="ie_image" id="ie_image">
            </div>
        </div>

        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Contact Number</label>
                <input type="text" name="ie_city" id="ie_city" class="form-control" placeholder="Contact Number">
            </div>
        </div>

        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="ie_email" id="ie_email" class="form-control" placeholder="Email">
            </div>
        </div>

        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Hired Date</label>
                <input type="date" name="ie_hiredate" id="ie_hiredate" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Branch</label>
                <select name="ibr_id" id="ibr_id" class="form-select">
                    <option selected>Select branch</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>        
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()