<?php

    session_start();
    
    // Comprobaremos que si inicio sesion como ADMIN
    if (isset($_SESSION['user']) && $_SESSION['user'] == "ADMIN"){
        // No hace nada
    } else { // Si no es el correcto, lo regresamos a la pagina de iniciar sesion
        header("Location:login_admin.php");
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel de Control de Happy Taco</title>

    <!-- Favicon -->
    <link href="img/logo.ico" rel="icon" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Estilos -->
    <link rel="stylesheet" href="css/estilo_panel_control.css">

    <?php
        include 'nav_admin.php';
    ?>

</head>
<body>

    <div class="cuerpo">
        <h1>HAPPY TACO CONTROL PANEL</h1>
        <img src="img/logo.png" alt="Logo de la empresa">

        <ul class="list-group">
            <li class="list-group-item active">Acciones disponibles:</li>
            <li class="list-group-item"><a href="php/altas.php">Añadir productos a la Happy Taco</a></li>
            <li class="list-group-item"><a href="php/modificar.php">Modificar poductos de Happy Taco</a></li>
            <li class="list-group-item"><a href="php/bajas.php">Eliminar productos de Happy Taco</a></li>
            <li class="list-group-item"><a href="contestar.php">Contestar Chats</a></li>
            <li class="list-group-item"><a href="#">Crear cupones</a></li>
            <li class="list-group-item"><a href="reporte_grafico.php">Reporte gráfico de Happy Taco</a></li>
        </ul>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>