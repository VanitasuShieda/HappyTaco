<?php
$servidor = 'localhost';
    $cuenta = 'root';
    $password = '';
    $bd = 'tienda';
    $conexion = new mysqli($servidor, $cuenta, $password, $bd) or die(mysqli_error());
    if ($conexion->connect_errno) {
        die('Error en la conexion');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div>
    <center>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Ingrese ID:
    <input type="text" name="id"><br><br>
       <input type="submit" value="Eliminar" name="enviar">
        
    </center>
        </form>
</div>
<?php 
    if(isset($_POST['enviar']))
    {
    $id=$_POST['id'];
     $query="DELETE FROM productos  WHERE idProducto='$id'";
  //$resultado= $conexion->query($query);
if(mysqli_query($conexion,$query) or die(mysqli_error($conexion))){
    echo "Eliminado";
}
    }
    
    ?>
</body>
</html>