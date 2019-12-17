<?php

session_start();

    // Este script solo lo puede acceder el administrador
    if (isset($_SESSION['user']) && isset($_SESSION['pass']) && $_SESSION['user'] == 'ADMIN' && $_SESSION['pass'] == "CONTRASEÑA"){
        // No hace nada
    } else {
        header("Location:../login_admin.php");
    }

    include 'nav_admin.php';

 $servidor = 'localhost';
    $cuenta = 'root';
    $password = '';
    $bd = 'tienda';
    $conexion = new mysqli($servidor, $cuenta, $password, $bd);
    if ($conexion->connect_errno) {
        die('Error en la conexion');
    }

$id=$_POST["id"];
$nombre=$_POST["nombre"];
$categoria=$_POST["categoria"];
$descripcion=$_POST["descrip"];
$existencia=$_POST["existencia"];
$precio=$_POST["precio"];
$foto=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];
$imagen="../image/".$foto;
copy($ruta,$imagen);
$insertar="INSERT INTO productos(idProducto,nombre,categoria,descripcion,existencia,precio,imagen) VALUES ('$id','$nombre','$categoria','$descripcion','$existencia','$precio','$imagen')";

$resultado= mysqli_query($conexion,$insertar);
if(!$resultado)
{
    echo "Error al registrar el producto";
}else
{
    echo "Producto Registrado";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">UAA</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sistema<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Altas.html">Altas</a></li>
          <li><a href="php/bajas.php">Bajas</a></li>
          <li><a href="php/Modificar.php">Cambios</a></li>
        </ul>
      </li>
      <li><a href="php/Consulta.php">Consulta</a></li>
    </ul>
  </div>
</nav> -->
<center>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>" method="post" enctype="multipart/form-data">
    Ingrese ID:
    <input required type="text" name="id" placeholder="id..."><br><br>
    Ingrese Nombre:
    <input required type="text" name="nombre" placeholder="Nombre..."><br><br>
       Ingrese Categoria:
    <input required type="text" name="categoria" placeholder="Categoria..."><br><br>
       Ingrese Descripcion:
    <input required type="text" name="descrip" placeholder="Descripcion..."><br><br>
       Ingrese Existencia:
    <input required type="text" name="existencia" placeholder="Existencia..."><br><br>
       Ingrese Precio:
    <input required type="text" name="precio" placeholder="Precio..."><br><br>
       Ingrese Imagen:
    <input type="file" name="imagen"><br><br>
        
    <input type="submit" value="Registrar">
    </form>
</center>
</body>
</html>