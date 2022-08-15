<!-- Page for printing data to PDF, get data from Controller Menu Makanan, method export -->
<!DOCTYPE html>
<html lang="en">
    
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu Makanan</title>
	<style>
		table,
		tr,
		th,
		td {
			border: 0.2px solid black;
			border-spacing: 0px !important;
		}

		.table {
			width: 100%;
			margin-bottom: 1rem;
			color: #212529;
		}

		.table thead th {
			vertical-align: bottom;
			border-bottom: 2px solid #dee2e6;
		}

		.table {
			width: 100%;
			margin-bottom: 1rem;
			color: #212529;
		}

		.table th {
			padding: .5rem;
			vertical-align: top;
			border-top: 1px solid black;
		}

		.table tr {
			border-top: 1px solid black;
		}

		p{
			margin-top: 1px;
			margin-bottom: 1px;
		}
	</style>
	</head>

	<body>
		<h1 class="text-center">Menu Makanan</h1>
		<table class="table">
			<thead class="bg-info">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Kode</th>
					<th scope="col">Nama</th>
					<th scope="col">Harga</th>
					<th scope="col">Status</th>
					<th scope="col">Photo</th>
				</tr>
			</thead>
			<tbody>
				<!-- Looping data using forEach method -->
				@php $i=1 @endphp
				@foreach($menumakanan as $menumakanan)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$menumakanan->kode}}</td>
						<td>{{$menumakanan->nama}}</td>
						<td>{{$menumakanan->harga}}</td>
						<td>{{$menumakanan->status}}</td>
						<td>{{$menumakanan->photo}}</td>
					</tr>
				@endforeach
				<!-- end looping data -->
			</tbody>
		</table>

		<script>
			// Method use for printing this page
			window.print();
		</script>
	</body>

</html>
