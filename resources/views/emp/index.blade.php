@extends('layout.master')

@section('title')
    Employees
@endsection()

@section('content')
<div class="content">
    @if(Session::get('edmsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('edmsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(Session::get('delmsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('delmsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h3>Employees</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="mytab1" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Hired</th>
                    <th>View</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->e_id }}</th>
                    <td >{{ $item->e_fname }} {{ $item->e_lname }}</td>
                    <td >{{ $item->dg_title }}</td>
                    <td >{{ $item->e_addr }}</td>
                    <td >{{ $item->e_phone }}</td>
                    <td >{{ $item->e_email }}</td>
                    <td >{{ $x = $item->e_status == 1 ? 'Active':'Deactive' }}</td>
                    <td >{{ $item->e_hiredate }}</td>
                    <!-- Button trigger modal -->
                    <td class="text-center"><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#empModal_{{ $item->e_id }}">+</button></td>
                    <td>
                        <a href="ed_employee/{{$item->e_id}}" class="text-secondary"><i class="fa fa-edit"></i></a> | 
                        <a href="del_employee/{{$item->e_id}}" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="empModal_{{ $item->e_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Employee: More Info</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="flex-container">
                                    <div class="row">
                                        <div class="col-6 d-flex flex-column justify-content-center">
                                            <img class="mb-3" src="/show-image/{{$item->e_image}}/emp_img" width="100%" >
                                        </div>
                                        <div class="col-6 d-flex flex-column justify-content-start">
                                            <p><b>Country/City:</b> {{ $item->e_cntry }}/{{ $item->e_city }}</p>
                                            <p><b>Type:</b> {{ $item->et_title }}</p>
                                            <p><b>Department:</b> {{ $item->d_name }}</p>
                                            <p><b>Branch:</b> {{ $item->br_name }}</p>
                                            <p><b>Age: </b>
                                                <?php 
                                                    $dob = date("Y", strtotime($item['e_dob'])); 
                                                    $age = date("Y") - $dob;
                                                    echo $item['e_dob'].", ".$age." Yrs";
                                                ?>
                                            </p>
                                            <!-- <p><b>Image:</b> {{ $item->e_image }}</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()