<?php

session_start();

    // Este script solo lo puede acceder el administrador
    if (isset($_SESSION['user']) && isset($_SESSION['pass']) && $_SESSION['user'] == 'ADMIN' && $_SESSION['pass'] == "CONTRASEÑA"){
        // No hace nada
    } else {
        header("Location:login_admin.php");
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

$consulta= "SELECT nombre,existencia FROM productos";
$res=$conexion->query($consulta);
?>
 <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Nombre','Existencia'],
         <?php
            
            while($fila = $res->fetch_assoc())
            {
               echo "['".$fila["nombre"]."',".$fila["existencia"]."],";
            }
            ?>
        ]);

        var options = {
          title: 'Cantidad de Productos',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
   <center>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </center>
  </body>
</html>