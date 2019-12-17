<?php

    // Se llama chat para que pueda ser incluido en los demas codigos usando el
    // include 'chat.php' y listo :)

    $username = "";

    // En esta parte del codigo vamos a indicar cual es nuestro username
    // Esto servira para que nuestros mensajes se mandan con nuestro username
    // Si la sesion esta vacia, no lo dejamos hacer nada ya que necesitamos que inicie sesion
    if (empty($_SESSION['username'])){
        $username = "";
    } else {
        $username = $_SESSION['username'];
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Font awesome -->
    <script src="https://use.fontawesome.com/72e2687a51.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- El title esta comentado porque no queremos que cambie el titulo por chat -->
    <!-- <title>Chat</title> -->

    <!-- Aqui estan los archivos que cree -->
    <link rel="stylesheet" href="CSS/estilo_chat.css">
    <script src="JS/script_chat.js"></script>

</head>
<body>

    <!-- Esta comentado porque solo es un experimento para saber si se mandan bien los usuarios 
    <input type="text" id="prueba_usuario">
    <button onclick="actualiza()">Actualiza</button> -->

    <p id="uname" style="display: none;"><?php echo $username ?></p>

    <!-- Boton que muestra el chat -->
    <button type="button" class="btn btn-circle btn-xl" onclick="mostrarChat()" id="botonMostrarChat">
        <i class="fa fa-comments" aria-hidden="true"></i>
    </button>

    <!-- Los que tienen la clase inside, significa que estan adentro del chat -->
    <div class="chat" id="chat">

        <!-- Es el titulo y donde esta el boton para cerrar la ventana -->
        <div class="titulo inside">
            <div class="inside_titulo"><i class="fa fa-comments" aria-hidden="true"></i></div>
            <div class="inside_titulo">Chat</div>
            <div class="inside_titulo"><button id="botonCerrarChat" onclick="cerrarChat()">Cerrar</button></div>
        </div>

        <!-- Este es donde se muestran los mensajes -->
        <div class="contenido inside" id="chatlogs">
            <textarea id="mensajes" disabled></textarea>
            <div class="loader active" id="loader"></div>
        </div>

        <!-- Aqui es el input del usuario -->
        <div class="input inside" id="input_inside">

            <!-- Hay un pequeño codigo php, que impide que los usuarios que no hayan
                iniciado sesion manden mensajes -->

            <?php

            if ($username == ""){
            ?>
                <h4>Inicia sesion para poder mandar mensajes</h4>
            <?php

            } else {
            ?>
            <table>
                <tr>
                    <td>
                        <textarea id="msg" placeholder="Ingresa tu mensaje" onkeypress="checar_enter();"></textarea>
                    </td>
                    <td>
                        <button type="button" id="enviar" onclick="submitChat()">Submit</button>
                    </td>
                </tr>
            </table>
            <?php
            }

            ?>
            
        </div> <!-- Fin del input -->

    </div>

    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>