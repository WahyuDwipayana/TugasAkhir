@extends('layouts')

@section('header')
	MenuMakanan
@endsection

@section('content')

<div class="text-center mt-5">
	<h3 class="text-center">Menu Makanan</h3>
</div>
 
<div class="row m-lg-2">
	<div class="container-fluid p-md-3 shadow p-3 mb-5 bg-white rounded">
		<!-- Master menu area -->
		@if(session()->has('messages'))
			<div class="alert alert-success">
				{{ session()->get('messages') }}
			</div>
		@endif
		<nav class="main-header navbar navbar-expand navbar-white navbar-light nav-tabel" style="border-bottom: 0px solid #dee2e6; margin: 0; margin-left: 0 !important; ">
			<!-- Button action area-->
			<ul class="navbar-nav">
				<li class="nav-item master-data">
					<a href="" onclick="insert_data()" class="btn btn-primary" data-toggle="modal"> <i class="fas fa-plus nav-icon"></i> add</a>
				</li>
				<li class="nav-item ml-sm-2">
					<a target="_blank" href="{{URL::to('/menumakanan/pdf')}}" id="btn-export-file" class="btn btn-outline-success"><i class="fas fa-print"></i> print</a>
			    </li>
				<li class="nav-item ml-sm-2 excel">
					<a target="_blank" href="{{URL::to('/menumakanan/excel')}}" id="btn-export-file" class="btn btn-outline-info"><i class="fas fa-download"></i> Excel</a>
				</li>
			</ul>
			<!-- End button menu area -->
		</nav>
		<!-- End Master menu area -->
		<!-- Start Content Table -->
		<div class="container-fluid">
			<table class="table table-hover" id="dataList">
				<thead class="bg-dark text-light">
					<tr>
						<th scope="col">Kode</th>
						<th scope="col">Nama</th>
						<th scope="col">Harga</th>
						<th scope="col">Status</th>
						<th scope="col">Photo</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody class="master-data" id="master-data">
					<!-- Get data from controller using forEach method -->
					@foreach ($menumakanan as $item)
						<tr class="hidden">
							<td> {{$item->kode}}</td>
							<td> {{$item->nama}}</td>
							<td> {{$item->harga}}</td>
							<td> {{$item->status==1?"Yes":"No"}}</td>
							<td> <img class="photo" src="{{url('uploads/image/MenuMakanan_photo/'.$item->photo)}}" alt="image Photo" width="80"></td>
							<td>
								<div class="btn-group">
									<button class="btn btn-warning" data-toggle="modal" onclick="update_data('{{$item->kode}}')"> <i class="fas fa-edit"></i></button>
									<form action="{{ route('menumakanan.destroy', $item->kode) }}" method="POST">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger" onclick="return confirm('Confirm to delete this data?')" title="Delete"><i class="fas fa-trash"></i></button>
									</form>
								</div>
							</td>
						</tr>
					@endforeach
					<!-- End looping data -->
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Modal item default style  hidden -->
<div id="modal-item">
</div>

	<script type="text/javascript">
		var oTable = $('#dataList').dataTable({
			scrollY:        "450px",
			scrollX:        true,
			scrollCollapse: true,
			paging:         true,
			columnDefs: [
				{ width: 40, targets: 4 }, //image column width
				{ width: 80, targets: 5 }
			],
		});
		// unbind default method and use new method for searching data
		$('#dataList_filter input').unbind();
		$('#dataList_filter input').bind('keyup', function(e) {
			if (e.keyCode == 13) {
				oTable.fnFilter(this.value);
			}
		});
		$('#dataList_filter input').attr("placeholder", "Type : criteria and enter...  ");
		// *End JavaScript DataTables
		$(document).ready(function() {
		});

		function insert_data(){
			$.ajax({
				type: "GET",
				url: '{{url("menumakanan")}}/show',
				async:true,
				data: {
					_token		: "{{csrf_token()}}",
				},
				beforeSend: function(data){
					// on_load();
					$('#modal-xl').find('.modal-xl').find(".modal-content").find(".modal-header").attr("class","modal-header bg-light-blue");
					$("#modal-xl .modal-title").html("Insert Data - Menu Makanan");
					$('#modal-xl').modal("show");
					$('#modal-xl').find('.modal-body-content').html('');
					$("#modal-xl").find(".overlay").fadeIn("200");
				},
				success:  function(data){
					$('#modal-xl').find('.modal-body-content').html(data);
				},
				complete: function(data){
					$("#modal-xl").find(".overlay").fadeOut("200");
				},
				error: function(data) {
					alert("error ajax occured!");
				}
			});
		}

		function update_data(id){
			$.ajax({
				type: "GET",
				url: '{{url("menumakanan")}}/'+id+'/edit',
				async:true,
				data: {
					_token		: "{{csrf_token()}}",
				},
				beforeSend: function(data){
					// on_load();
					$('#modal-xl').find('.modal-xl').find(".modal-content").find(".modal-header").attr("class","modal-header bg-light-blue");
					$("#modal-xl .modal-title").html("Update Data - Menu Makanan");
					$('#modal-xl').modal("show");
					$('#modal-xl').find('.modal-body-content').html('');
					$("#modal-xl").find(".overlay").fadeIn("200");
				},
				success:  function(data){
					$('#modal-xl').find('.modal-body-content').html(data);
				},
				complete: function(data){
					$("#modal-xl").find(".overlay").fadeOut("200");
				},
				error: function(data) {
					alert("error ajax occured!");
				}
			});
		}

	</script>

<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script th:src="{{asset('assets/js/datatables.min.js')}}"></script>

@endsection

