<?php

    session_start();

    // Este script solo lo puede acceder el administrador
    if (isset($_SESSION['user']) && isset($_SESSION['pass']) && $_SESSION['user'] == 'ADMIN' && $_SESSION['pass'] == "CONTRASEÑA"){
        // No hace nada
    } else {
        header("Location:login_admin.php");
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Contestar Chats</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Font awesome -->
    <script src="https://use.fontawesome.com/72e2687a51.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="JS/contestar_script.js"></script>
    <link rel="stylesheet" href="CSS/estilo_contestar.css">

    <?php

        include 'nav_admin.php';

    ?>
</head>
<body>
    
    <div class="contenedor">
        <div class="izquierdo">
            Todos los chats
            <p id="editame"></p>
        </div>
        <div class="derecho">
            Chatea con alguien
            <p id="usuarios" style="display:inline-block"></p>
            <button type="button" onclick="elegir_usuario()">Chatear</button>
            <button onclick="refrescar()">Refrescar</button>
            <br>
            <textarea disabled name="chat" id="chat" cols="30" rows="10"></textarea>
            <textarea name="msg" id="msg" onkeypress="checar_enter()" placeholder="Ingresa tu mensaje"></textarea>
            <button type="button" onclick="mandar_mensaje()">Enviar</button>
        </div>
    </div>

    <p id="uname" style="display: none;">Nadie</p>

    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>