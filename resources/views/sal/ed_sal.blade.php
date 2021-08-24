@extends('layout.master')

@section('title')
    Salary
@endsection()

@section('content')
<div class="content">
    <h3>Edit salary for employee</h3>
    <form action="{{ url('/ed_salary') }}" method="post">
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
                <label for="exampleInputEmail1" class="form-label">Agreed Salary</label>
                <input type="text" name="ies_agreed" id="ies_agreed" class="form-control" required placeholder="Agreed salary for employee" value="{{ $data[0]->es_agreed }}">
            </div>
        </div>

        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Account Number</label>
                <input type="text" name="ies_account" id="ies_account" class="form-control" required placeholder="Bank account number for employee" value="{{ $data[0]->es_account }}">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">IBAN</label>
                <input type="text" name="ies_iban" id="ies_iban" class="form-control" required placeholder="IBAN number" value="{{ $data[0]->es_iban }}">
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Start Date</label>
                <input type="date" name="ies_start" id="ies_start" class="form-control" required value="{{ $data[0]->es_start }}" >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">End Date</label>
                <input type="date" name="ies_end" id="ies_end" class="form-control" value="{{ $data[0]->es_end }}" >
                <div class="form-text fst-italic">It's optional. If employee is still with the company then it should not be filled.</div>
            </div>
        </div>

        <input type="hidden" name="ies_id" id="ies_id" value="{{ $data[0]->es_id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()