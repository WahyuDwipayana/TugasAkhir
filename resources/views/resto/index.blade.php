@extends('layout1')

@section('header')
	Dashboard
@endsection

@section('content')

<div class="text-center mt-5">
	<h3 class="text-center">Welcome to Undagi Code Dashboard</h3>
</div>
<div class="row m-5 pt-5">
	@foreach ($link as $links)
		<div class="col-sm-3 mb-3">
			<div class="card bg-white rounded shadow">
				<div class="card-body">
					<h5 class="card-title"><i class="fas fa-folder-open fa-4x text-warning "></i></h5>
					<p class="card-text">Manage your data on {{$links->menu_name}}</p>
					<a href="{{url($links->menu_link)}}" class="btn btn-outline-success">{{$links->menu_name}}</a>
				</div>
			</div>
		</div>
	@endforeach

	@endsection

