<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <!-- Esta página es para que el administrador inicie sesion y pueda
    acceder a los servicios que el necesita, como modificar el contenido de los productos,
    o contestar a chats, etc... -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Favicon -->
    <link href="img/logo.ico" rel="icon" type="image/x-icon">

    <!-- Estilos -->
    <link rel="stylesheet" href="css/estilo_login_admin.css">

</head>
<body>

    <?php

        session_start();

        // Preguntamos si hubo un error en el inicio de sesion
        if (isset($_SESSION['error']) && $_SESSION['error'] === true){
            // Si hubo error
            ?>
            <script>alert("Error: los datos ingresados no son correctos");</script>
            <?php
        }

    ?>

    <div class="forma">
        <form action="php/verifica.php" class="" method="POST">
            <div class="form-group">
                <img src="img/logo.png" alt="Logo de la empresa">
                <h3>Happy Taco Admin Login</h3>
            </div>
            <div class="form-group">
                <label for="user">Nombre de usuario:</label>
                <input type="text" name="user" placeholder="Usuario" class="form-control centro" id="user" required>
            </div>
            <div class="form-group">
                <label for="pass">Contraseña de administrador:</label>
                <input type="password" name="pass" placeholder="Contraseña" class="form-control centro" id="pass" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary">
                <input type="reset" value="Borrar" class="btn btn-primary">
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>