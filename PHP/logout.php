<?php

    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    session_destroy();
    setcookie("usuario_happy_taco", '', time()-3600, "/");
    header("Location: ../index.php");

?>