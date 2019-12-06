<?php
    session_start();

    setcookie("usuario_happy_taco", $_POST["correo"], time()+21600, "/");
    
    $dir = "127.0.0.1";
    $user = "root";
    $pass = "";
    $bd = "bdd";

    $conn = mysqli_connect($dir, $user, $pass, $bd);
    if(!$conn)
    {
        echo "Error conectando con el servidor";
        exit;
    }

    $sql = "SELECT * FROM usuarios WHERE correo='" . htmlspecialchars($_POST['correo']) . "'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = htmlspecialchars($data['id']);
    $_SESSION['user_name'] = htmlspecialchars($data['cuenta']);
    $_SESSION['user_email'] = htmlspecialchars($data['correo']);

    header("Location: ../index.php");

?>