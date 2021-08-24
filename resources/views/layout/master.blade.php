<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>HRSYS | @yield('title')</title>

        <!-- Bootstrap CSS -->
        <link href="{{asset('assets/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" >
		<!-- My CSS-->
		<link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" >
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" >
		<!-- fontawesome CSS-->
        <link href="{{asset('assets/css/fontawesome/css/fontawesome.min.css')}}" rel="stylesheet" >
		<link href="{{asset('assets/css/fontawesome/css/all.css')}}" rel="stylesheet">
		<!-- dataTables CSS-->
		<link href="{{asset('assets/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">

	</head>
    <body>
    <div class="container-fluid">
		
        @if (Request::path() != "login")
        <div class="d-flex row header">
            @include('layout.topnavbar')
		</div>
        @endif
		<div class="d-flex row">
			@if (Request::path() != "login")
                @include('layout.sidebar')
            @endif
			
            @if (Request::path() == "login")
            <div class="col-md-12">
            @else
            <div class="col-md-10">
            @endif
                @yield('content')
            </div>
		</div>
    </div>
        <!-- JS SCRIPTS -->
        <!-- jQuery -->
        <script src="{{asset('assets/js/jquery-3.5.1.js')}}" ></script>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="{{asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}" ></script>
		<!-- dataTables -->
        <script src="{{asset('assets/js/jquery.dataTables.min.js')}}" ></script>
        <script src="{{asset('assets/js/dataTables.bootstrap5.min.js')}}" ></script>
		<!-- Custom JS -->
        <script src="{{asset('assets/js/br_dep.js')}}" ></script>
        <script src="{{asset('assets/js/upl_files.js')}}" ></script>
        <script src="{{asset('assets/js/emp_levquo.js')}}" ></script>
        
        <!-- Inline javascripts -->
        <script>
            $(document).ready( function () {
			    $('#mytab1').DataTable();
		    });
		</script>
        
        @yield('j_scripts')
    </body>
</html>

