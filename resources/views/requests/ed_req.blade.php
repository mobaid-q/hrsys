@extends('layout.master')

@section('title')
    Request
@endsection()

@section('content')
<div class="content">
    <h3>Edit request</h3>
    <form action="{{ url('/ed_request') }}" method="post">
        @csrf
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Employee</label>
                <select name="ie_id" id="ie_id" class="form-select" required >
                    <option selected>Select employee</option>
                    @foreach ($emp as $item)
                        @if($data[0]->e_id == $item->e_id)
                        <option selected value="{{ $item->e_id }}">{{ $item->e_id }} | {{ $item->e_fname." ".$item->e_lname }}</option>
                        @else
                        <option value="{{ $item->e_id }}">{{ $item->e_id }} | {{ $item->e_fname." ".$item->e_lname }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="ireq_title" id="ireq_title" class="form-control" placeholder="Request title" required value="{{ $data[0]->req_title }}">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea name="ireq_desc" id="ireq_desc" class="form-control" placeholder="Description for request" rows="3" required >{{ $data[0]->req_desc }}</textarea>
            </div>
        </div>

        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Department Addressed</label>
                <select name="id_id" id="id_id" class="form-select" required >
                    <option selected>Select department</option>
                    @foreach ($dep as $item)
                        @if($data[0]->d_id == $item->d_id)
                        <option selected value="{{ $item->d_id }}">{{ $item->d_name }}</option>
                        @else
                        <option value="{{ $item->d_id }}">{{ $item->d_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <input type="hidden" name="ireq_id" id="ireq_id" value="{{ $data[0]->req_id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()