@extends('layout.emp_master')

@section('title')
    New Request
@endsection()

@section('content')
<div id="alert_lev_days"></div>
<div class="pb-3"><span class="text-decoration-underline text-black-50 fs-4">Enter new request</span></div>
<div class="contanier-fluid">
    <form action="{{ url('/user/new_req') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Title</label>
                        <input type="text" name="ireq_title" id="ireq_title" class="form-control" required  placeholder="Title for the request">
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Description</label>
                        <textarea name="ireq_desc" id="ireq_desc" class="form-control" required  placeholder="Description about request" rows="3"></textarea>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1" class="form-label">Department</label>
                        <select name="id_id" id="id_id" class="form-select"  required >
                            <option selected value="">Select department to handle your request</option>
                            @foreach($data as $item)
                            <option value="{{ $item->d_id }}">{{ $item->d_name }}</option>
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