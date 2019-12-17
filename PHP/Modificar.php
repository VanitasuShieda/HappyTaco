<?php
session_start();

// Este script solo lo puede acceder el administrador
if (isset($_SESSION['user']) && isset($_SESSION['pass']) && $_SESSION['user'] == 'ADMIN' && $_SESSION['pass'] == "CONTRASEÑA"){
    // No hace nada
} else {
    header("Location:../login_admin.php");
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
   <!--  <nav class="navbar navbar-inverse">
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
<div>
    <center>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Ingrese ID:
    <input type="text" name="id"><br><br>
       <input type="submit" value="Buscar" name="enviar">
        </form>
    </center>
</div>
<?php
     function conexion() {
    $servidor = 'localhost';
    $cuenta = 'root';
    $password = '';
    $bd = 'tienda';
    $conexion = new mysqli($servidor, $cuenta, $password, $bd);
    if ($conexion->connect_errno) {
        die('Error en la conexion');
    } else {
        return $conexion;
    }
}
    
    if(isset($_POST['enviar'])){
        
   function selectBD($sql) {
    $resultado = conexion() -> query($sql);
    if ($resultado -> num_rows){
        return $resultado;
    }

    return null;
}

$resultado = selectBD('select * from productos where idProducto='. $_POST['id'] .'');//Seleccionar el campo usNombre de la tabla usuarios
if ($resultado){//Si $resultado != null, significa que si hay resultados del query.
    $fila = $resultado -> fetch_assoc();//Obtenemos los resultados de LA PRIMERA FILA y lo ponemos en $fila.
    //echo "Producto Encontrado";
    echo "<br>";
    echo " <center>";
    echo "<b>Id:</b>" . $fila['idProducto'];
    echo "<br>";
    echo "<b>Nombre: </b>" . $fila['nombre'];
    echo "<br>";
    echo "<b>Categoria:</b>" . $fila['categoria'];
    echo "<br>";
    echo "<b>Descripcion:</b>" . $fila['descripcion'];
    echo "<br>";
    echo "<b>Existencia:</b>" . $fila['existencia'];
    echo "<br>";
    echo "<b>Precio:</b>" . $fila['precio'];
    echo "<br>";
    echo "<b>Imagen:</b>" . $fila['imagen'];
    echo "<br>";
    echo '<img src="'.$fila["imagen"].'" width="200" heigth="200">';
    echo " </center>";
    }else{
    echo "<br>";
    echo "<center>";
    echo "Error, datos no encontrados";
    echo " </center>";
}

}
    
    ?>
    
    <center>
    <form action="modificar_proceso.php?id=<?php echo $fila['idProducto']; ?>" method="POST" enctype="multipart/form-data">
      <!--Inputs anteriormente escritos a modificar-->
      <br><br><br>
      ID:
      <input type="text" required name="ids" placeholder="id producto" value="<?php echo $fila['idProducto']; ?>" /><br><br>
      Nombre:
      <input type="text" required name="nombre" placeholder="Nombre" value="<?php echo $fila['nombre']; ?>" /><br><br>
      Categoria:
      <input type="text" required name="categoria" placeholder="Categoria" value="<?php echo $fila['categoria']; ?>" /><br><br>
      Descripcion:
      <input type="text" required name="descripcion" placeholder="descripcion" value="<?php echo $fila['descripcion']; ?>" /><br><br>
      Existencia:
      <input type="text" required name="existencia" placeholder="existencia" value="<?php echo $fila['existencia']; ?>" /><br><br>
      Precio:
      <input type="text" required name="precio" placeholder="precio" value="<?php echo $fila['precio']; ?>" /><br><br>
      Imagen:
      <input required type="file"  name="imagen" placeholder="imagen" value="<?php echo $fila['imagen']; ?>" /><br><br>
      <input type="submit" value="aceptar" />
      
      <br>
    </form>
  </center>
    <br>
   
</body>
</html>