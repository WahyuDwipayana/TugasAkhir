<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Temusapa</title>

		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('assets/icons/css/all.min.css')}}" />
		<!-- DataTales CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/datatables.min.css')}}" />
		<!-- Bootstrap V.4.3.1 CDN -->
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
		<!-- Custom style css for simple sidebar -->
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
		<!-- TinyMCE textarea editor APIKey  -->
		<script src="https://cdn.tiny.cloud/1/bmq852wo3zyrki97cj1ke2rjji5q65rayhgfv3bfk75fjgyv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<!-- jQuery Scripts -->
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
		<!-- jQuery DataTables Scripts -->
		<script src="{{asset('assets/js/datatables.min.js')}}"></script>

	</head>


<body>
	<div class="d-flex" id="wrapper">
		<!-- Sidebar -->
		<div class=" bg-sidebar border-right" id="sidebar-wrapper">
			<a href="{{url('/')}}">
				<div class="sidebar-heading text-center text-white py-5"><i class="fas  fa-home"></i>Home Perpustakaan</div>
			</a>
			<!-- Default dropright button -->
			<div class="btn-group dropright menu_link w-100">
				<button type="button" class="btn btn-block btn-dropdown rounded btn-sidebar {{ request()->is('/') ? 'active' : '' }} {{ request()->is('/') ? 'active' : '' }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Dashboard <i class="fas fa-chevron-circle-right ml-3"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-right bg-sidebar">
					<!-- Dropdown menu links -->
					<div class="list-group list-group-flush">
						<!-- Get menu from @menu params ^^^ -->
                        @foreach ($link as $links)
                        <a href="{{url($links->menu_link)}}" class="list-group-item list-group-item-action text-capitalize btn-sidebar">{{$links->menu_name}}</a>
                        @endforeach
					</div>
				</div>
			</div>
			<div class="menu_link">
				<!-- Get menu from @menu params ^^^ -->
				@foreach ($link as $links)
                    <a href="{{url($links->menu_link)}}" class="data list-group-item list-group-item-action text-capitalize btn-sidebar" id="{{substr($links->menu_link, 1)}}">{{$links->menu_name}}</a>
                @endforeach

			</div>

		</div>
		<!-- /#sidebar-wrapper -->

		<div id="page-content-wrapper">
			<!-- Begin Header Wrapper-->
			<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
				<button class="btn btn-outline-primary ml-5" id="menu-toggle"><i class="fas fa-align-left fa-lg"></i></button>
			</nav>
			<!-- End Header Wrapper -->
			<!-- Begin Cointent Wrapper -->
			<div class="container-fluid">
				@yield('content')
			</div>
			<!-- End Content Wrapper -->
		</div>
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- The Modal -->
	<div class="modal fade" id="modal-xl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding: 0;">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h5 class="modal-title">Update</h5>
					<button type="button" class="close close-modal" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
					<div class="modal-body-content" style="min-height:100px;">
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript -->
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

	<!-- Menu Toggle Script -->
	<script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
		$('.menu_link a').on('click', function(e) {
			$('.menu_link a').removeClass('active');
			$(this).addClass('active');
		})
		$(document).ready(function () {
			$path=location.pathname;
			$path=$path.substring(1,$path.length);
			$('#'+$path).addClass('active');
		});
	</script>

</body>

</html>
