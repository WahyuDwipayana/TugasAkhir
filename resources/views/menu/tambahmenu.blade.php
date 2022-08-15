<!DOCTYPE html>
<!-- Form for input data into database pass into Controller Menu Makanan methode save -->
<form method="post" id="formAdd" enctype="multipart/form-data">
	@csrf
	<!-- Field  : hidden , Field tb_menu_makanan -->
	<input type="hidden" name="kode" value="<?= '0' ?>">
	<!-- Field Nama, Type Varchar/String -->
	<div class="form-group">
		<label for="nama">Nama</label>
		<input type="text" name="nama" class="form-control" id="nama" required>
		<span id="errornama" class="text-danger small"></span>
	</div>
	<!-- Field Harga, Type Double -->
	<div class="form-group">
		<label for="harga">Harga</label>
		<div class="input-group mb-3">
			<input type="number" name="harga" class="form-control" id="harga" required>
			<span id="errorharga" class="text-danger small"></span>
		</div>
	</div>
	<!-- Field Status, Type Boolean -->
	<div class="form-group">
		<label for="status">Status</label>
		<div class="form-check">
			<label class="form-check-label mr-4">
			<input type="radio" class="form-check-input" name="status" id="statustrue" value="1" checked>
				Yes </label>
			<label class="form-check-label mr-4">
			<input type="radio" class="form-check-input" name="status" id="statusfalse" value="0">
				No</label>
			<p id="errorstatus" class="text-danger small"></p>
		</div>
	</div>
	<!-- Field Photo, Type Varchar/String -->
	<!-- Field photo type file : image -->
	<div class="form-group">
		<label for="photo">Picture Photo</label><br>
		<img id="photo" class="img-thumbnail" style="width: 100px; height: 75px;" src="{{asset('uploads/image/MenuMakanan_photo/untitled.png')}}" alt="your image" /></br></br>
		<input type="file" class="form-control-file" accept="image/jpeg, image/png" id="photo" name="photo" onchange="readURLImage(this,'#photo');" required>
		<span id="errorphoto" class="text-danger small"></span>
	</div>
	<p id="messageInfo" class="text-result"></p>
	<!-- Modal footer -->
	<div class="modal-footer">
		<button type="submit" class="btn btn-success">Save</button>
		<button type="button" class="btn btn-danger close-modal" data-dismiss="modal">Close</button>
	</div>
</form>
<!-- Submit validation check -->
<script>
	function readURLImage(input, id) { //function to showing image on modal form
		id = id || '#placeholder';
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$(id)
					.attr('src', e.target.result)
					.width(100)
					.height(75)
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	$(document).ready(function() {
		$('#formAdd').on('submit', function(e) {
			e.preventDefault();
			$.ajax({
				method: "POST",
				url: "",
				data: new FormData(this),
				dataType: "json",
				contentType: false,
				cache: false,
				processData: false,
				// setting message validation
				success: function(response) {
					if(response.result==1) {
						alert(response.message);
						window.location.href = "/menumakanan";
					}else{
						$('#messageInfo').html('There was an error, please check your input');
						if (response.message.kode) {
							$("#errorkode").html(response.message.kode);
						}
						if (response.message.nama) {
							$("#errornama").html(response.message.nama);
						}
						if (response.message.harga) {
							$("#errorharga").html(response.message.harga);
						}
						if (response.message.status) {
							$("#errorstatus").html(response.message.status);
						}
						if (response.message.photo) {
							$("#errorphoto").html(response.message.photo);
						}
					}
				}
			})
		})
	})
</script>
