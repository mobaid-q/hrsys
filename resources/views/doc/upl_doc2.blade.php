@extends('layout.master')

@section('title')
    Documents
@endsection()

@section('content')
<div class="content">
    <h3>Upload documents</h3>
    <form>
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="idoc_title" id="idoc_title" class="form-control" placeholder="Document title" required >
            </div>
        </div>
        
        <div class="mb-3">
            <div class="col-sm-4">
                <label for="exampleInputEmail1" class="form-label">Employee</label>
                <select name="ie_id" id="ie_id" class="form-select" required >
                    <option selected>Select employee</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <div class="col-sm-4">
                <label for="formFileMultiple" class="form-label">Files</label>
                <input class="form-control" type="file" name="idoc_files" id="idoc_files" multiple required >
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection()