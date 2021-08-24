@extends('layout.master')

@section('title')
    Payments
@endsection()

@section('content')
<div class="content">
    @if(Session::get('admsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('admsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Generate Payments</h3>
    <form action="{{ url('/gen_payments') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Salary Period</label>
                <input type="date" name="ip_period" id="ip_period" class="form-control" required >
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Generate</button>
    </form>
</div>
@endsection()