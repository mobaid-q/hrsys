@extends('layout.emp_master')

@section('title')
    Change Password
@endsection()

@section('content')
<div id="alert_lev_days"></div>
<div class="pb-3"><span class="text-decoration-underline text-black-50 fs-4">Change your password below</span></div>
<div class="d-flex flex-sm-row flex-column justify-content-center align-items-center">
        <div class="text-black text-center p-2 fs-5">
            <form action="{{ url('/user/password') }}" method="post" oninput='ic_pwd.setCustomValidity(ic_pwd.value != i_pwd.value ? "Passwords do not match." : "")'>
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Old Password</label>
                    <input type="password" class="form-control" name="io_pwd" id="io_pwd" placeholder="Enter old password" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="i_pwd" id="i_pwd" placeholder="Enter new password" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="ic_pwd" id="ic_pwd" placeholder="Confirm new password" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection()

@section('j_scripts')
<script>
// var qty = '{{ session()->get("Sick") }}';
// jQuery('#test').text(qty);
</script>
@endsection()