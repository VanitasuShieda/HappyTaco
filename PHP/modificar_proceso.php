<?php

session_start();

    // Este script solo lo puede acceder el administrador
    if (isset($_SESSION['user']) && isset($_SESSION['pass']) && $_SESSION['user'] == 'ADMIN' && $_SESSION['pass'] == "CONTRASEÑA"){
        // No hace nada
    } else {
        header("Location:../login_admin.php");
    }

    
    $servidor = 'localhost';
    $cuenta = 'root';
    $password = '';
    $bd = 'tienda';
    $conexion = new mysqli($servidor, $cuenta, $password, $bd) or die(mysqli_error());
    if ($conexion->connect_errno) {
        die('Error en la conexion');
    }


 $id= $_GET['id'];

 $ids=$_POST['ids'];
  $nombre= $_POST['nombre'];
  $categoria= $_POST['categoria'];
  $descripcion= $_POST['descripcion'];
$existencia= $_POST['existencia'];
$precio= $_POST['precio'];
$foto=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];
$imagen="../image/".$foto;
copy($ruta,$imagen);
//Acá nos dice básicamente: reemplaza los datos de la tabla "usuarios" donde el dato "nombre" sea "$nombre"(la variable que creeamos arriba, osea, que se reemplazara por esta, lo mismo con los demás.)
  $query="UPDATE productos SET idProducto='$ids',nombre='$nombre',categoria='$categoria',descripcion='$descripcion', existencia='$existencia', precio='$precio', imagen='$imagen' WHERE idProducto='$id'";
  //$resultado= $conexion->query($query);
if(mysqli_query($conexion,$query) or die(mysqli_error($conexion))){
    ?>
    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php">UAA</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../index.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sistema<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../Altas.html">Altas</a></li>
          <li><a href="bajas.php">Bajas</a></li>
          <li><a href="Modificar.php">Cambios</a></li>
        </ul>
      </li>
      <li><a href="Consulta.php">Consulta</a></li>
    </ul>
  </div>
</nav> -->
<?php
  include 'nav_admin.php';
?>
<br>
<?php echo " <center>Modificado</center>"; ?>
</body>
<?php   
    
}


  
?>
