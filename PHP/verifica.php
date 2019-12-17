<?php

    session_start();

    // Primero preguntamos si se ingreso usuario y contraseña, es obvio que si acceden de manera directa no va a existir estos datos
    // por los tanto lo redireccionaremos a la pagina para iniciar sesion

    if (isset($_POST['user']) && isset($_POST['pass'])){ // Si existen los datos
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        // Si el usuario y la contraseña estan bien
        if ($user == 'ADMIN' && $pass == "CONTRASEÑA"){
            session_start();
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            header("Location:../panel_control_admin.php");
        } else { // De lo contrario, lo regresamos a la pagina
            // de iniciar sesion y aparte con error para que le salte el alert
            $_SESSION['error'] = true;
            header("Location:../login_admin.php");
        }
    } else { // No existen los datos
        header("Location:../login_admin.php");
    }

?>