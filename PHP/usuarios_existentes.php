<?php

    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'bdd';

    $conexion = new mysqli($server, $user, $pass, $db);

    // Este query me devuelve los username existentes SIN REPETIR
    $cadena = "SELECT DISTINCT username FROM logs WHERE username <> 'root' ORDER BY id DESC";

    $resultado = $conexion -> query($cadena);

    $salida = "No existen mensajes aún.";

    if ($resultado -> num_rows){
        $salida = "<select name='username' id='usuario'>";
        while ($fila = $resultado -> fetch_assoc()){
            $salida .= "<option value='" . $fila['username'] . "'>" . $fila['username'] . "</option>";
        }
        $salida .= "</select>";
    }

    echo $salida;

?>