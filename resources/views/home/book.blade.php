<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Booking ThomBarbershop</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap3.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/stylebook.css" />

    <link rel="icon" type="image/png" href="images/iconbarber.png"/>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<form>
							<div class="form-group">
								<input class="form-control" type="text" placeholder="Enter your Name" value="{{ Auth()->user()->nama }}">
								<span class="form-label">Name</span>
							</div>
                            <div class="form-group">
								<input class="form-control" type="email" placeholder="Enter your Email" value="{{ Auth()->user()->email }}">
								<span class="form-label">Email</span>
							</div>
							<div class="form-group">
								<input class="form-control" type="tel" placeholder="Enter your Phone number" value="{{ Auth()->user()->notelp }}">
								<span class="form-label">Phone</span>
							</div>
							
							<div class="form-group">
								<select class="form-control" required>
									<option value="" selected hidden>Choice of employee</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
								</select>
								<span class="select-arrow"></span>
								<span class="form-label">Employee</span>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" type="date" required>
										<span class="form-label">Pickup Date</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" type="time" required>
										<span class="form-label">Pickup Time</span>
									</div>
								</div>
							</div>
							<div class="form-btn">
								<button class="submit-btn">Book Now</button>
                        	</form>
                                <button class="btn-me">Hairstyle</button>
							</div>
					
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script>
		$('.form-control').each(function () {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function () {
			floatedLabel($(this));
		});

		function floatedLabel(input) {
			var $field = input.closest('.form-group');
			if (input.val()) {
				$field.addClass('input-not-empty');
			} else {
				$field.removeClass('input-not-empty');
			}
		}
	</script>

</body>

</html>