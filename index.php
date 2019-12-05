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
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	
	<!-- Bootstrap CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Favicon -->
	<link href="img/logo.png" rel="shortcut icon"/>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
	
</head>

<body>
	<!-- barra de navegacion -->
	<?php   
	include 'nav.php';
	?>	
	<!-- Main-->
	
	<!-- Content section -->
	
	<div class="bd-example">
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" >
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" style="height: 20%;" >
				<div class="carousel-item active">
					<img src="img/c1.jpg" class="d-block w-100" alt="..." >
					<div class="carousel-caption d-none d-md-block">
					</div>
				</div>
				<div class="carousel-item">
					<img src="img/c2.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h1>Ofertas!!!</h1>
					</div>
				</div>
				<div class="carousel-item">
					<img src="img/c3.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>Unas Muy Buenas MAMADAS</h5>
						<p>chi cheñol</p>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<br>
	<hr>
	<span>
		<section class="container">
			
			<div class="page-header">
				<h2 itemprop="headline">
					<hr>
					Nuestra Historia			<hr></h2>
				</div>
				
				
				<div class="articleBody">
					<div>
						<p style="text-align:justify"><img src="img/taco.png" style="float:left; margin-right:10px; margin-bottom:10px" border="0" width="530" height="309" /><strong>HappyTaco</strong> es una empresa <strong>100% mexicana</strong> con tradición en la elaboración de la más variada comida mexicana; rica en sueños, experiencias y realidades y una trayectoria de más de 28 años de servicio. Cuenta con la labor entusiasta de más de 100 colaboradores, amantes de las costumbres mexicanas, con una alta aportación social y vocación de servicio, que buscan contribuir en gran medida al desarrollo y progreso de nuestro país, nuestros clientes y compañeros de trabajo.</p>
						<p style="text-align:justify"><strong>Grupo HappyTaco</strong>, se ha fijado como meta el conservar con orgullo "el verdadero taco mexicano", manteniéndose como líder dentro de la industria restaurantera. Para ello, utiliza solamente materia prima de la más alta calidad en la elaboración de sus productos. Actualmente está conformado por cinco restaurantes en la Ciudad de México y un área de Fiestas y Eventos que se encarga de atender las diversas necesidades de nuestros clientes en cualquier lugar de la República Mexicana. Seguimos en el camino del crecimiento y estaremos abriendo nuevas sucursales en un futuro cercano para llegar a más familias mexicanas.</p>
						<p style="text-align:justify"><strong>Grupo HappyTaco</strong> cuenta con una filosofía de calidad permanente que le ha permitido diferenciarse y ser punta de lanza en productos, promociones y servicio. Dicha filosofía tiene su fundamento en los siguientes ejes:</p>
						<ul>
							<li><strong>Misión.</strong></li>
						</ul>
						<p style="text-align:justify">Lograr la completa satisfacción de las expectativas de todos nuestros clientes, trabajadores y accionistas.</p>
						<ul>
							<li><strong>Visión.</strong></li>
						</ul>
						<p style="text-align:justify">Ser el líder de la industria restaurantera en la elaboración del taco tradicional mexicano.</p>
						<ul>
							<li><strong>Valores.</strong></li>
						</ul>
						<p>La puntualidad en el servicio<br /> La calidad de los alimentos<br /> La honestidad en nuestras acciones<br /> La confianza de todos los clientes en la marca <br /> La humildad para reconocer, que siempre hay algo más por mejorar</p>
						
					</div>
				</div>
				
				
				
				<div class="col-md-3     separator_br vt_block">	
					<div class="vt_moduletable clearfix moduletable">								
						<div class="vt_moduletable_content">
							<div class="custom"  >
								<blockquote>										
									<p>Siempre pensando en ti…</p>
									
								</blockquote>
							</div>													
						</div>   											
					</div>
				</section>
				
				<br>
				<hr>
			</span>
			
			<!-- End Main --> 
			
			
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
		