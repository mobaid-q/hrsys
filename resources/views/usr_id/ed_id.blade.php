@extends('layout.master')

@section('title')
    User Accounts
@endsection()

@section('content')
<div class="content">
    <h3>Edit user ID</h3>
    <form action="{{ url('/ed_sys_usrs') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="iemail" id="iemail" class="form-control" placeholder="User email" required value="{{ $data[0]->email }}">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" name="ipassword" id="ipassword" class="form-control" placeholder="User password" required value="{{ $data[0]->password }}">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">User Type</label>
                <select name="i_is_admin" id="i_is_admin" class="form-select" required >
                    <option selected>Select type</option>
                    <option {{ $sel = $data[0]->is_admin == 1 ? 'selected':'' }} value="1">Admin</option>
                    <option {{ $sel = $data[0]->is_admin == 0 ? 'selected':'' }} value="0">General</option>
                </select>
            </div>
        </div>

        <input type="hidden" name="i_id" id="i_id" value="{{ $data[0]->id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()