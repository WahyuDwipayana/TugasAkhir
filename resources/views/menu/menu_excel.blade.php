<!-- Page for printing data to Excell, get data from Controller Menu Makanan, method export -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu Makanan</title>
	<style>
		body{
			font-family: sans-serif;
		}
		table{
			margin: 20px auto;
			border-collapse: collapse;
		}
		table th,
		table td{
			border: 1px solid #3c3c3c;
			padding: 3px 8px;
		}
		a{
			background: blue;
			color: #fff;
			padding: 8px 10px;
			text-decoration: none;
			border-radius: 2px;
		}
	</style>
	</head>

	<body>
		<?php
			// *PHP built-in method for download the page and export into excel document
			// @first method with params application name and type
			// @second method with params filename of the exported files
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=MenuMakanan.xls");
		?>
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

	</body>

</html>
