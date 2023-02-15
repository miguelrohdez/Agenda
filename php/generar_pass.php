<?php 
function generarContrasenia()
{
    $contrasenia = "";
    $valores = "1234567890abcdefghijklmnopqrstuvwxyz$#&%";
    $max = strlen($valores)-1;
    for($i = 0; $i < 10; $i++){
        $contrasenia .= substr($valores, mt_rand(0,$max), 1);
    }
    return $contrasenia;
}
?>