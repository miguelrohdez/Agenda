<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <?php 
        require("datos_con.php");
        $usuario =   $_POST["txt_email"];
        $password = $_POST["txt_contra"];
        $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data);
        if ($conexion -> connect_errno) {
            echo "Fallo la conexion ".$conexion -> connect_errno;
        }else{
            $conexion -> set_charset("utf8");
            $consulta = "SELECT * FROM cliente WHERE cliente_correo = '$usuario' AND cliente_contrasenia = '$conexion'";
            $resultado = $conexion -> query($consulta);
            $registros = $conexion -> affected_rows;
            echo $conexion -> fied_count;
            if ($registros > 0) {
                echo "Es valido";
                session_start();
                $_SESSION["usuario"]=$_POST["txt_email"];
                header("location:menu.html");
            }else{
                echo "Incorrecto";
                header("location:../login.html"); //Posiblemente agrege una loginErro.html con el mensaje de error
            }
            $conexion -> close();
        }            
    
    ?>
</body>
</html>