@extends('layout.master')

@section('title')
    User Accounts
@endsection()

@section('content')
<div class="content">
    @if(Session::get('admsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('admsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Add User</h3>
    <form action="{{ url('/ad_sys_usrs') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Employee</label>
                <select name="ie_id" id="ie_id" class="form-select" onchange="fill_name(this)" required >
                    <option selected value="">Select employee</option>
                    @foreach ($emp as $item)
                        <option value="{{ $item->e_id }}" >{{ $item->e_id }} | {{ $item->e_fname." ".$item->e_lname }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="iname" id="iname" class="form-control" placeholder="User Name" required >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="iemail" id="iemail" class="form-control" placeholder="User email" required >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" name="ipassword" id="ipassword" class="form-control" placeholder="User password" required >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">User Type</label>
                <select name="i_is_admin" id="i_is_admin" class="form-select" required >
                    <option selected>Select type</option>
                    <option value="1">Admin</option>
                    <option value="0">General</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()

@section('j_scripts')
<script>
    function fill_name(x) {
        var txt = $(x).children("option:selected").text();
        txt = txt.substr(4);
        $("#iname").val(txt);
    }
</script>
@endsection()