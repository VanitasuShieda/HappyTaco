<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'bdd';

$conexion = new mysqli($server, $user, $pass, $db);

// En teoria me deberia de devolver todos los registros que no contengan como
// username a root
$cadena = "SELECT * FROM logs WHERE username <> 'root' ORDER BY id DESC";

$resultado = $conexion -> query($cadena);

$salida = "No existen mensajes aún.";

if ($resultado -> num_rows){
    $salida = "<table><tr><th>Username</th><th>Message</th></tr>";
    while ($fila = $resultado -> fetch_assoc()){
        $salida .= "<tr><td>" . $fila['username'] . "</td>" . "<td>" . $fila['msg'] . "</td></tr>";
    }
    $salida .= "</table>";
}

echo $salida;

?>