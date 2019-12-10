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
	<link rel="stylesheet" href="css/contact-form.css" type="text/css">
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



</head>

<body>
	<!-- barra de navegacion -->
	<br><br>
		<?php
	include 'nav.php';

	?>
	<!-- Main-->

	<section class="container">
	<br><br>	
		<section class="contact-section">

			<div>
				
				<hr>
				<h2>FAQ</h2>
				<hr>
				<p>
					Aquí es donde intentaremos responder a algunas de las preguntas más comunes que los clientes potenciales pudieran tener. Es una buena idea abarcar cosas como tu política de devoluciones, información sobre la garantía del producto, envíos y devoluciones, etc. Consulta los ejemplos que aparecen a continuación.
				</p>
				<hr>
				<h3>
					¿Cuál es su política de devoluciones?
				</h3>
				<p>
					Debido a que nuestros productos son consumibles alimenticios, no contamos con sistema de devoluciones sin embargo si se presenta algún inconveniente durante el envió te facilitaríamos algún descuento, o promoción para tu actual o siguiente compra en HappTaco dentro de los próximos 30 días hábiles.
				</p>
				<hr>
				<h3>
					¿Hacen envíos al exterior y a casillas de correo?
				</h3>
				<p>
					Sí, siempre y cuando seas un cliente que se encuentra en alguno de estos lugares, como somos una empresa dedicada a la venta de Tacos, no podemos darnos el lujo de tener un taco por mas de 20 minutos en temperatura ambiente, este sería incomible después de ese tiempo, bueno no es para tanto pero a nadie le gusta comer tacos fríos o en otras condiciones poco higiénicas.
				</p>
				<hr>
				<h3>¿Tienen un servicio de atención al cliente?</h3>
				<p>¡Por supuesto! Nuestros representantes de servicio de atención al cliente, amables y expertos, están disponibles para responder tus preguntas las 24 horas del día, los 7 días de la semana, los 365 días del año. Quizá nos encontremos bebiendo un café o preparando tus Tacos, pero responderemos en la brevedad posible. </p>
				<hr>
				<h3>
					¿Puedo visitar las instalaciones donde cocinan los tacos?
				</h3>
				<p>Por supuesto, usted puede venir y conocer nuestras instalaciones, para ver las condiciones de higiene y saborear los tacos que le ofrecemos.</p>
				<hr>
				<h3>
					¿Cuánto tiempo duran calientes?
				</h3>
				<p>
					Nosotros le entregamos los tacos recien hechos y pueden durar hasta 1 hora calientitos.
				</p>
				<hr>
			</div>

			<div class="der">
				<h4>Localizacion</h4>
				<p>	Puedes encontrarnos en cualquiera de nuestras sucursales dentro del siguiente apartado
					<br>
					<button type="button"  class="btn btn-custom" style="background-color: #304f6f; color:white;"> <i class="fa fa-map" aria-hidden="true"></i>   <a href="contaco.php" style="text-decoration: none; color:white;">     Encuentranos!</a>	</button>
				</p>
				<br>
				<h4>
					Telefonos:
				</h4>
				<p>
					<strong>Fidele: </strong>449-502-7288 <br> <strong>Summarine: </strong> 465-119-2159 <br> <strong>Mikaros</strong> 449-390-3537
				</p>
				<br>
				<h4>Correo: </h4>
				<p><Elpatriarcado@gmail class="com"></Elpatriarcado@gmail></p>
			</div>

		</section>





		<section id="contact-form-section" class="form-content-wrap">
			<div class="container">
				<div class="row">
					<div class="tab-content">
						<div class="col-sm-12">
							<div class="item-wrap">
								<div class="row">

									<div class="col-sm-12">
										<div class="item-content colBottomMargin">
											<div class="item-info">
												<h2>Envianos Tus Preguntas!!</h2>
											</div>
											<!--End item-info -->

										</div>
										<!--End item-content -->
									</div>
									<!--End col -->
									<div class="col-md-12">


										<form id="contactForm" name="contactform" data-toggle="validator" class="popup-form">
											<div class="row">
												<div id="msgContactSubmit" class="hidden"></div>

												<div class="form-group col-sm-6">
													<div class="help-block with-errors"></div>
													<div class="input-group-icon"><i class="fa fa-user"></i></div>
													<input name="fname" id="fname" placeholder="Tu nombre*" class="form-control" type="text" required data-error="Por favor ingresa tu nombre">

												</div><!-- end form-group -->
												<div class="form-group col-sm-6">
													<div class="help-block with-errors"></div>
													<input name="email" id="email" placeholder="Tu E-mail*" pattern=".*@\w{2,}\.\w{2,}" class="form-control" type="email" required data-error="Por favor ingresa un correo electrónico válido">
													<div class="input-group-icon"><i class="fa fa-envelope"></i></div>
												</div><!-- end form-group -->
												<div class="form-group col-sm-6">
													<div class="help-block with-errors"></div>
													<input name="phone" id="phone" placeholder="Teléfono*" class="form-control" type="text" required data-error="Por favor ingresa tu número de teléfono">
													<div class="input-group-icon"><i class="fa fa-phone"></i></div>
												</div><!-- end form-group -->
												<div class="form-group col-sm-6">
													<div class="help-block with-errors"></div>
													<input name="subject" id="subject" placeholder="Asunto*" class="form-control" type="text" required data-error="Por favor ingresa el asunto">
													<div class="input-group-icon"><i class="fa fa-book"></i></div>
												</div><!-- end form-group -->
												<div class="form-group col-sm-12">
													<div class="help-block with-errors"></div>
													<textarea rows="3" name="message" id="message" placeholder="Escribe tu comentario aquí*" class="form-control" required data-error="Por favor ingresa un mensaje"></textarea>
													<div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
												</div><!-- end form-group -->

												<div class="form-group last col-sm-12">
													<button type="submit" id="submit" class="btn btn-custom" style="background-color: #304f6f; color:white;"><i class='fa fa-envelope'></i> Enviar</button>
												</div><!-- end form-group -->

												<span class="sub-text">* Campos requeridos</span>
												<div class="clearfix"></div>
											</div><!-- end row -->
										</form><!-- end form -->






									</div>
								</div>
								<!--End row -->




								<!-- Popup end -->

							</div><!-- end item-wrap -->
						</div>
						<!--End col -->
					</div>
					<!--End tab-content -->
				</div>
				<!--End row -->
			</div>
			<!--End container -->
		</section>





	</section>






	<!-- End Main -->




	<!-- Footer -->
	
	<style>
	footer p{
		color: white;
	}
		</style>


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

	<!-- Popper js -->
	<script src="js/popper.min.js"></script>

	<!-- Form Validator -->
	<script src="js/validator.min.js"></script>
	<!-- Contact Form Js -->
	<script src="js/contact-form.js"></script>
</body>

</html>