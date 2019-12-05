<?php
    
    $uname = 'root';
    $msg = $_REQUEST['msg'];
    $destino = $_REQUEST['destino'];

    // Esta informacion es susceptible al cambio cuando
    // lo movamos al dominio en internet
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'bdd';

    // Conectamos con la base de datos
    $conexion = new mysqli($server, $user, $pass, $db);

    // Hacemos el insert del mensaje, va destinado al root porque el es el que leera
    // nuestros mensajes
    $conexion -> query("INSERT INTO logs (`username` , `msg`, `user_destiny`) VALUES ('$uname','$msg','$destino')");

    // Ahora hacemos otra query para mostrar los mensajes que aqui tenemos
    $resultado = $conexion -> query("SELECT * FROM logs WHERE username='$destino' or user_destiny='$destino' ORDER BY id ASC");

    // Si la consulta genero registros
    if ($resultado -> num_rows){

        while ($fila = $resultado -> fetch_assoc()){
            // Ahora los vamos a regresar a nuestro AJAX que hizo el request
            echo $fila['username'] . ": " . $fila['msg'] . "\n";
        }

    } else { // Si no genero registros
        echo "No existen mensajes aún.";
    }

    // Cerramos la conexion
    mysqli_close($conexion);
?>