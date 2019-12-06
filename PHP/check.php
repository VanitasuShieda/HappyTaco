<?php
    session_start();
    $dir = "127.0.0.1";
    $user = "root";
    $pass = "";
    $bd = "bdd";

    $got = array();

    $conn = mysqli_connect($dir, $user, $pass, $bd);
    if(!$conn)
    {
        exit;
    }

    $email = htmlspecialchars($_POST['correo']);
    $captcha = sha1($_POST['captcha']);


    $sql = "SELECT * FROM usuarios WHERE correo='" . $email . "'";
    if($result = mysqli_query($conn, $sql))
    {
        $data = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) == 0)
        {
            $got["status"] = "no_user";
        }
        else if((int)$data["bloqueo"] <= 2)
        {
            if(password_verify($_POST["password"], $data["contraseña"]))
            {
                if($captcha === $_COOKIE['captcha'])
                {
                    $update = mysqli_query($conn, "UPDATE usuarios SET bloqueo=0 WHERE correo='" . $email . "'");
                    $got["status"] = "entered";
                }
                else
                {
                    $update = mysqli_query($conn, "UPDATE usuarios SET bloqueo=bloqueo+1 WHERE correo='" . $email . "'");
                    if((int)$data["bloqueo"] == 2)
                    {
                        $datetime = new DateTime('tomorrow');
                        if(is_null($data['fecha-desbloqueo']))
                        {
                            mysqli_query($conn, "UPDATE usuarios SET `fecha-desbloqueo`='". $datetime->format("Y-m-d H:i:s") . "' WHERE correo='" . $email . "'");
    
                        }
                        $got["status"] = "blocked";
                        $got["result"] = $datetime->format("Y-m-d H:i:s");
                    }
                    else
                    {
                        $got["status"] = "captcha";
                    }
                }
            }
            else
            {

                $update = mysqli_query($conn, "UPDATE usuarios SET bloqueo=bloqueo+1 WHERE correo='" . $email . "'");
                if((int)$data["bloqueo"] == 2)
                {
                    $datetime = new DateTime('tomorrow');
                    if(is_null($data['fecha-desbloqueo']))
                    {
                        mysqli_query($conn, "UPDATE usuarios SET `fecha-desbloqueo`='". $datetime->format("Y-m-d H:i:s") . "' WHERE correo='" . $email . "'");

                    }
                    $got["status"] = "blocked";
                    $got["result"] = $datetime->format("Y-m-d H:i:s");
                }
                else
                {
                    $got["status"] = "incorrect";
                }
            }
        }
        else
        {
            $dates = "SELECT *, DATE('fecha-desbloqueo') < DATE(NOW()) AS is_old FROM usuarios where correo='" . $email ."'";
            $getDates = mysqli_query($conn, $dates);
            $datesOld = mysqli_fetch_assoc($result);
            if($datesOld['is_old'])
            {
                mysqli_query($conn, "UPDATE usuarios SET bloqueo=0, fecha-desbloqueo=NULL WHERE correo='" . $email . "'");
            }
            

            $update = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo='" . $email . "'");
            $update_data = mysqli_fetch_assoc($update);

            $got["status"] = "blocked";
            $got["result"] = $update_data['fecha-desbloqueo'];
        }
    }
    
    echo json_encode($got);

?>