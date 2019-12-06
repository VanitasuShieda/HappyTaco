<?php

    header("content-type: image/png");
    $im = imagecreate(110, 32);
    $color_fondo = imagecolorallocate($im, 207, 52 ,118);
    $color_texto = imagecolorallocate($im, 255, 255, 255);
    $cubo="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    function generar_captcha($str, $lenght)
    {
        $captcha = null;
        for($i = 0; $i < $lenght; ++$i)
        {
            $rand = rand(0, count($str)-1);
            $captcha .= $str[$rand];
        }

        return $captcha;
    }

    $captcha = generar_captcha(str_split($cubo, 1), 5);
    setcookie('captcha', sha1($captcha), time()+60*3);
    $x = 15;

    for($i = 0; $i < 5; ++$i)
    {
        $c = $captcha{$i};
        imagechar($im, rand(3,5), $x, rand(2,14), $c, $color_texto);
        $x += 20;
    }

    //imagestring($im, 5, 5, 5, $captcha, $color_texto);
    imagepng($im);

?>