@extends('layout.emp_master')

@section('title')
    My Home
@endsection()

@section('content')
<div class="pb-3"><span class="text-decoration-underline text-black-50 fs-4">Employee Data</span></div>
<div class="row text-sm-center mb-5 border-bottom border-3 border-warning">
    <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="fs-5 fw-bolder"><p class="m-0">Emp. ID:</p><span class="badge bg-primary">{{ $data[0]->id }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="fs-5 fw-bolder"><p class="m-0">Name:</p><span class="badge bg-primary">{{ $data[0]->name }}</span></div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="fs-5 fw-bolder"><p class="m-0">Email:</p><span class="badge bg-primary">{{ $data[0]->email }}</span></div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="fs-5 fw-bolder"><p class="m-0">Phone:</p><span class="badge bg-primary">{{ $info[0]->e_phone }}</span></div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="fs-5 fw-bolder"><p class="m-0">Hired:</p><span class="badge bg-primary">{{ $info[0]->e_hiredate }}</span></div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="fs-5 fw-bolder"><p class="m-0">DOB:</p><span class="badge bg-primary">{{ $info[0]->e_dob }}</span></div>
    </div>
</div>

<div class="row text-sm-center mb-5 border-bottom border-3 border-warning">
    <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="fs-5 fw-bolder"><p class="m-0">Address:</p><span class="badge bg-primary">{{ $info[0]->e_addr }}</span>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="fs-5 fw-bolder"><p class="m-0">Emp. Type:</p><span class="badge bg-primary">{{ $info[0]->et_title }}</span></div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="fs-5 fw-bolder"><p class="m-0">Designation:</p><span class="badge bg-primary">{{ $info[0]->dg_title }}</span></div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="fs-5 fw-bolder"><p class="m-0">Department:</p><span class="badge bg-primary">{{ $info[0]->d_name }}</span></div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="fs-5 fw-bolder"><p class="m-0">Branch:</p><span class="badge bg-primary">{{ $info[0]->br_name }}</span></div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="fs-5 fw-bolder"><p class="m-0">City:</p><span class="badge bg-primary">{{ $info[0]->e_city }}</span></div>
    </div>
</div>

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from “de Finibus Bonorum et Malorum” by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from “de Finibus Bonorum et Malorum” by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.


It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here, content here’, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ‘lorem ipsum’ will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here, content here’, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ‘lorem ipsum’ will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).


Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from “de Finibus Bonorum et Malorum” by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.


It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here, content here’, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ‘lorem ipsum’ will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).


Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from “de Finibus Bonorum et Malorum” by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.


It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here, content here’, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ‘lorem ipsum’ will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).


Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.





Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae aliquet massa. Nullam condimentum ante vel ante accumsan euismod. Curabitur felis sem, venenatis vitae urna vitae, ornare molestie nisl. Vivamus cursus quam sed diam venenatis sodales. Etiam consequat nisi placerat sem malesuada, eget accumsan dui euismod. Pellentesque et lectus erat. Vestibulum quis eleifend metus, non condimentum ante. Nulla mattis commodo eros ac laoreet. Vestibulum et erat tincidunt, vulputate neque id, commodo massa. Praesent velit dui, rutrum accumsan erat in, interdum semper ex. Etiam congue neque non consequat consectetur. Etiam in maximus leo. Ut finibus tellus eget laoreet commodo. Praesent neque odio, mollis sit amet leo eu, maximus laoreet leo. Pellentesque lacinia ut arcu in semper. Pellentesque lectus justo, dapibus a arcu id, mattis volutpat nunc.

Ut euismod nisi id nibh gravida sollicitudin. Sed tincidunt pharetra lacus, at suscipit diam lacinia at. Vivamus in metus bibendum, congue metus nec, posuere arcu. Curabitur pharetra, felis vel consectetur pulvinar, sapien odio mollis ex, vitae fermentum ligula leo ut ante. Aenean et ullamcorper turpis, non dictum nisi. Mauris sodales urna vel augue aliquet euismod. Quisque convallis non urna sit amet tempor.

Curabitur ac dignissim nisl. Fusce id ultricies purus. Fusce eu dolor pretium, pretium tortor malesuada, molestie turpis. Nunc viverra nibh ut eros lobortis iaculis. Sed bibendum est et metus congue, at tempor augue aliquet. Mauris placerat arcu ut odio volutpat, at egestas risus auctor. Vivamus a diam placerat, commodo arcu in, porta lacus. Quisque varius velit nisl, sed vestibulum diam porttitor eu. Suspendisse quis mi tempus, lacinia eros non, scelerisque enim. Aenean venenatis, justo sodales venenatis congue, quam ante ultricies nulla, sit amet fringilla leo nisl nec magna. Mauris dictum pulvinar laoreet.

Vivamus tincidunt eu erat non vestibulum. Praesent eu lorem velit. Donec fermentum dolor sed tellus viverra ullamcorper. Pellentesque mattis ac orci sed placerat. Nam tincidunt leo vel ante euismod viverra. Suspendisse at fringilla velit. Cras risus sem, ultricies eu sagittis non, lobortis in elit.

Nam tempor, lacus a ullamcorper laoreet, ligula ex lobortis mauris, nec sollicitudin nunc elit ut eros. Maecenas tristique dolor condimentum, varius odio ac, sagittis neque. Aliquam in rhoncus sem. Morbi nec arcu non tortor varius interdum sed eget ligula. Nulla gravida nunc ut aliquet placerat. Proin convallis justo vel tellus ultrices, eu interdum sem consequat. Nulla sollicitudin quam vitae arcu rhoncus, a finibus tellus elementum. Nunc dignissim mattis leo, sit amet vestibulum ex. Nulla et tortor condimentum, lacinia urna eget, luctus urna. Nunc turpis mauris, venenatis vel auctor nec, dapibus in elit. Etiam urna turpis, interdum vel euismod id, congue vitae orci. Maecenas congue tortor in sapien dignissim lobortis. Nunc ac dolor vel eros hendrerit faucibus in tempor neque. Sed et ultricies massa. 

@endsection()
