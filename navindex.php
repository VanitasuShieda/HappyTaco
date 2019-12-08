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

	<script type="text/javascript">
		var prevScrollpos = window.pageYOffset;
		window.onscroll = function(){

			var currentScrollpos = window.pageYOffset;

			if(prevScrollpos > currentScrollpos){
				document.getElementById("navbar").style.top = "0";
			}else{
				document.getElementById("navbar").style.top = "-160px"
			}

			prevScrollpos = currentScrollpos;
		}
	</script>


</head>
<body>
	<?php
		include 'menus.php'
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
				
				

</body>
				
				</html>