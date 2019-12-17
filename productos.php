<!DOCTYPE html>
<html lang="es">

<head>
	<title>HappyTaco</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="Mikaros" content="">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

	<!--  Stylesheets  -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style2.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/flaticon.css" />
	<link rel="stylesheet" href="css/slicknav.min.css" />
	<link rel="stylesheet" href="css/jquery-ui.min.css" />
	<link rel="stylesheet" href="css/owl.carousel.min.css" />
	<link rel="stylesheet" href="css/animate.css" />

	<!-- Bootstrap CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Favicon -->
	<link href="img/logo.png" rel="shortcut icon" />


	<script>
		function enviar_datos(url, env) {
			$.ajax({
				type: "POST",
				url: url,
				data: {
					array: env
				},
				success: function(data) {
					console.log(data);
				}
			});
		}
	</script>
</head>

<body>
	<!-- barra de navegacion -->
	<?php
	include 'nav.php';
	?>
	<!-- Main-->
	<section class="container">
		<div id="producto"></div>
	</section>


	<script src="js/productosDinamicos.js"></script>

	<br>

	<br>
	<!-- End Main -->


	<button onclick="myFunction()"> picale wee</button>

	<div id="eg"></div>






	<div class="col-lg-3">
		<div class="order-table" id="table">
			<div class="cart-item">
				<span>Product</span>
				<p class="product-name">Blue Dotted Shirt</p>
				<br>
				<span>Price</span>
				<p>$29</p>
				<br>
				<span>Quantity</span>
				<p>1</p>
			</div>

			<div class="cart-total">
				<span>Total</span>
				<p>$39</p>
			</div>
		</div>
	</div>
	</div>



	<!-- Footer -->
	<?php
	include 'footer.php';
	?>
	<!-- Bootstrap JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>


</body>

</html>