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
		<link href="{{asset('assets/css/emp_style.css')}}" rel="stylesheet" >
		<!-- fontawesome CSS-->
        <link href="{{asset('assets/css/fontawesome/css/fontawesome.min.css')}}" rel="stylesheet" >
		<link href="{{asset('assets/css/fontawesome/css/all.css')}}" rel="stylesheet">
		<!-- dataTables CSS-->
		<link href="{{asset('assets/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">

	</head>
    <body>
        <div id="wrapper">

            <!-- Sidebar -->
            @include('layout.emp_sb')

            <!-- Page Content -->
            <div id="page-content-wrapper">
				<div class="container-fluid">
                    <div class="sticked"><a href="#" class="btn btn-success" id="toggle-menu" >Toggle Menu</a></div>
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
        <script src="{{asset('assets/js/lev_chk.js')}}" ></script>
        
        <!-- Inline javascripts -->
        <script>
			$('#toggle-menu').click(function(e) {
				e.preventDefault();
				$('#wrapper').toggleClass('displayMenu');
			});
		</script>
        <script>
            $(document).ready( function () {
			    $('#usertab').DataTable();
                var img = '/show-image/{{session()->get("prof_pic")}}/emp_img';
                $('#emp_img').attr('src', img);
		    });
		</script>
        <script>
        function show_pic(chk) {
            if ($(chk).is(":checked")) {
                    // $('#emp_img').css('display', 'block');
                    $('#emp_img').css('opacity', '1');
                }
            else {
                // $('#emp_img').css('display', 'none');
                $('#emp_img').css('opacity', '0');
            }
        }
        </script>

        @yield('j_scripts')
    </body>
</html>

