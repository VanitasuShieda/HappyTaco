<?php
session_start();

require 'database.php';

$message = '';
$log = false;

if(isset($_COOKIE['usuario_happy_taco']))
{
	$get_all = "SELECT id,correo,cuenta FROM usuarios WHERE correo='" . htmlspecialchars($_COOKIE['usuario_happy_taco']) . "'";
	$stmt = $conn->query($get_all);
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$_SESSION['user_id'] = htmlspecialchars($data['id']);
	$_SESSION['user_name'] = htmlspecialchars($data['cuenta']);
	$_SESSION['user_email'] = htmlspecialchars($data['correo']);

}

if (!empty($_POST['email']) && !empty($_POST['password'])) {
	
	if ($_POST['password']===$_POST['confirm_password']) {
		
		
		$sql = "INSERT INTO usuarios (correo, contraseña, nombre, cuenta) VALUES (:email, :password, :nombre, :cuenta)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':email', $_POST['email']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':nombre', $_POST['nombre']);
		$stmt->bindParam(':cuenta', $_POST['cuenta']);
		
		if ($stmt->execute()) {
			$message = 'Usuario creado';
		} else {
			$message = 'No se creo el usuario';
		}
	}else{
		$message="Escribe bien la contraseña, puñetas";
	}
	
}

if (!empty($_POST['correo']) && !empty($_POST['contraseña'])) {
	$records = $conn->prepare('SELECT id, correo, contraseña, nombre FROM usuarios WHERE correo = :correo');
	$records->bindParam(':correo', $_POST['correo']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$nombre= $results['correo'];
	$message = '';
	
	if (count($results) > 0 && password_verify($_POST['contraseña'], $results['contraseña'])) {
		$sql=$conn->prepare("UPDATE usuarios SET bloqueo=0");
		$sql->execute();
		$_SESSION['user_id'] = $results['id'];
		header("Location: index.php");
	} else {
		$message = 'Las credenciales no coinciden';
		
	}
	
}


if(isset($_SESSION["user_id"])){
	$log=true;
}else{
	$log=false;
}

?>


<!DOCTYPE html>
<html>
<head>
	
	<?php
	include 'chat.php';
	?>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	
	<div class="container nav-section">
		<a class="navbar-brand" href="index.php">HappyTaco<img src="img/logo.png" height="45px" width="45px"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Tienda</a>
					<ul>
						<li><a class="nav-link" href="">Tacos</a>
							<ul>
								<li><a class="nav-link" href="">Pastor</a></li>
								<li><a class="nav-link" href="">Adobada</a></li>
								<li><a class="nav-link" href="">Birria</a></li>
							</ul>
						</li>
						<li><a class="nav-link" href="">Tortas</a>
							<ul>
								<li><a class="nav-link" href="">subsub1</a></li>
								<li><a class="nav-link" href="">subsub2</a></li>
							</ul>
						</li>
						<li><a class="nav-link" href="">Quesadillas</a> 
							<ul>
								<li><a class="nav-link" href="" >Adobada</a>                        </li>
								<li><a class="nav-link" href="">Pastor</a>                        </li>
								<li><a class="nav-link" href="">Birria</a>                        </li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="">Acerca</a>
					<ul>
						<li><a class="nav-link" href="" >Visión</a>                        </li>
						<li><a class="nav-link" href="">Misión</a>                        </li>
						<li><a class="nav-link" href="">Objetivo de la compañía</a>                        </li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contáctanos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Ayuda</a>
				</li>	
				
				
				<div>		
					<?php
					if($log){
						echo '<li><p class="nav-user"> Bienvenido(a) ';  
							echo $_SESSION["user_name"];
							echo '</p></li>';
							echo '<li class="dropdown order-1">';
								echo '<form class="form" role="form" action="PHP/logout.php" method="post">';
									echo '<button type="submit" class="btn btn-primary btn-block" > Logout <i class="fas fa-sign-out-alt"></i></button>';
									echo '</form>';
									echo '</li>';
								}else{
									echo '<li class="dropdown order-1">
										<button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Login <span class="caret"></span></button>
										<ul class="dropdown-menu dropdown-menu-right mt-2">
											<li class="px-3 py-2">';
												
												if(!empty($message)): 
												echo '   <script>swal("El usuario ha sido registrado exitosamente");</script>';
												endif; 
												echo' 
												
												<h1>Ingresa</h1>
												<span>o <small><a href="#" data-toggle="modal" data-target="#modalPassword">Registrar cuenta</a></small></span>
												
												<form action="PHP/login.php" method="POST"  id="login">
													<input name="correo" type="text" id="kkdvk_correo" placeholder="Enter your correo" required>
													<input name="contraseña" type="password" id="kkdvk_contra" placeholder="Enter your contraseña" required>
													<img src="PHP/captcha.php?id=0" id="kkdvk_img" border="0" style="padding-bottom: 1em; padding-left: 5em;">
													<p class="btn btn-primary" id="update_captcha"><i class="fa fa-refresh" aria-hidden="true"></i></p>
													<input name="captcha" type="text" id="kkdvk_captcha" placeholder="Ingresa la captcha" required>
													<input type="button" class="btn btn-primary" value="Ingresar" name="ingresar" onclick="checar()">
												</form>
												
												
											</li>
										</ul>
									</li>';
									
								}
								?> 
								
							</div>
							
							
							<li class="nav-item">
								<div class="up-item">
									<div class="shopping-card">
										<a class="nav-link" href="shopping-cart.php"> <i class="flaticon-bag"></i>
											<span>#</span> Carrito </a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					
					
					
					
				</nav>
				
				
				
				
				<?php
								echo "<script>
									console.log('" . $_SERVER['   '] . "');
								</script>";
								if($_SERVER['PHP_SELF'] === 'index.php')
								{
									//notign;
									
								}
								else
								{
									echo '<!-- Header  con logo -->
									<header class="py-6 bg-img-all" style="background-image: url(img/bg-logo.jpg);">
										<img class="img-fluid d-block mx-auto logo-size" src="img/logo.png" alt="">
					
									</header>';
								}

				?>
				
				<div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3>Registro</h3>
								<button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							
							
							
							<?php if(!empty($message)): 
							echo   '<p> <?= $message ?></p>';
							endif; ?>
							
							<h1>Registrate</h1>
							<span>o <a href="<?php $_SERVER['PHP_SELF']?>">Ingresa</a></span>
							
							<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
								
								<input name="nombre" type="text" placeholder="Ingresa tu nombre">
								<input name="cuenta" type="text" placeholder="Ingresa tu cuenta">
								<input name="email" type="text" placeholder="Ingresa tu mail">
								<input name="password" type="password" placeholder="Ingresa la contraseña">
								<input name="confirm_password" type="password" placeholder="Confirma la contraseña">
								
								
								<input type="submit" value="Picale">
							</form>
							
							
						</div>
					</div>
				</div>
				
				<script>

					var band = false;

					$("#update_captcha").on("click", function()
					{
						var id = Math.random() * (999999);
						$("#kkdvk_img").replaceWith("<img id='kkdvk_img' src='PHP/captcha.php?id=" + id + "' border='0' style='padding-bottom: 1em; padding-left: 5em;'>");
					});

					function setBoxShadowRed(str)
					{
						var element = document.getElementById(str);
						element.style.boxShadow = "0px 0px 0px 4px rgba(255, 0, 0, 0.51)";
					}

					function checar()
					{
						var correo = document.getElementById("kkdvk_correo").value;
						var contra = document.getElementById("kkdvk_contra").value;
						var captcha = document.getElementById("kkdvk_captcha").value;

						if(correo === "" || contra === "")
						{
							setBoxShadowRed("kkdvk_correo");
							setBoxShadowRed("kkdvk_contra");
							alert("Los campos no pueden estar vacios");
							band = false;
							return;
						}
						
						var xhttp = new XMLHttpRequest();
						xhttp.open("POST", "PHP/check.php", true);
						xhttp.onload = function ()
						{
							var data = JSON.parse(this.responseText);
							if(data.status === "entered")
							{
								band = true;
								document.getElementById("login").submit();
							}
							else if (data.status === "incorrect")
							{
								setBoxShadowRed("kkdvk_contra");
								swal({
									text: "Lo siento, la contraseña es incorrecta",
									title: "Error en sus credenciales",
									icon: "error"
								});
							}
							else if(data.status === "no_user")
							{
								setBoxShadowRed("kkdvk_correo");
								swal({
									text: "Lo siento, el correo es incorrecto",
									title: "Error en sus credenciales",
									icon: "error"
								});
							}
							else if(data.status === "blocked")
							{
								setBoxShadowRed("kkdvk_correo");
								setBoxShadowRed("kkdvk_contra");
								swal({
									text: "Lo siento, tu cuenta sera desbloqueada el: " + data.result,
									title: "Cuenta bloqueada",
									icon: "error"
								});
							}
							else if(data.status === "captcha")
							{
								setBoxShadowRed("kkdvk_captcha");
								swal({
									text: "Lo siento, ingresaste mal el captcha",
									title: "Error en la captcha del formulario",
									icon: "error"
								});
							}
							console.log(band);
							
						}
						xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						xhttp.send("correo=" + correo + "&password=" + contra + "&captcha=" + captcha);
					}
				</script>
				
				
				</html>