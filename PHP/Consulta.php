<!DOCTYPE html>
<html>
<head>
  <title>Tabla de Productos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
      td,th,tr{
          padding: 1em;
          margin: 1em;
          align-items: center;
      }
      body{
          background-color: aquamarine;
      }
    </style>
</head>
<body>
   <nav class="navbar navbar-inverse">
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
</nav>
    <center>
        <table bgcolor="orange" border="3">
            <thead>
                <tr>
                  <!--Acá usamos un href para crear un nuevo registro-->
                    <th colspan="7"><center>Lista de Productos</center></th>
                </tr>
            </thead>
            <!--Se siguen añadiendo valores a la tabla de HTML (los correspondientes a nuestra base de daots)-->
            <tbody>
                <tr>
                  <td><b>ID</b></td>
                  <td><b>Nombre</b></td>
                  <td><b>Categoria</b></td>
                  <td><b>Descripcion</b></td>
                  <td><b>Existencia</b></td>
                  <td><b>Precio</b></td>
                  <td><b>Imagen</b></td>
                </tr>
            <?php
            //Hace conexión con la base de datos
                $servidor = 'localhost';
                $cuenta = 'root';
                $password = '';
                $bd = 'tienda';
                $conexion = new mysqli($servidor, $cuenta, $password, $bd) or die(mysqli_error());
                if ($conexion->connect_errno) {
                die('Error en la conexion');
                                            }

            //Básicamente, selecciona la tabla usuarios para pasarla a nuestra tabla en PHP
                $query="SELECT * FROM productos";
                $resultado= $conexion->query($query);
                while($row=$resultado->fetch_assoc()){
              ?>

                <tr>
                  <td><?php echo $row['idProducto']; ?></td>
                  <td><?php echo $row['nombre']; ?></td>
                  <td><?php echo $row['categoria']; ?></td>
                  <td><?php echo $row['descripcion']; ?></td>
                  <td><?php echo $row['existencia']; ?></td>
                  <td><?php echo $row['precio']; ?></td>
                    <td><?php echo '<img src="'.$row["imagen"].'" width="200" heigth="200">'; ?></td>

                </tr>
            <?php
                }
            ?>

            </tbody>
        </table>
    </center>
</body>
<br>
<br>
<br>
</html>
