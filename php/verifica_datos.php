<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <?php
        require("./datos_con.php");
        $id_user = $_POST["txt_nocita"];
        $contra_user = $_POST["txt_contra"];
        $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
        $conexion -> set_charset("utf8");
        if ($conexion -> connect_errno) {
            echo "Fallo la conexion ".$conexion -> connect_errno;
        }else{
            $consulta = "SELECT nocita, estado_reserva FROM agenda WHERE nocita = ?";
            $stmt = $conexion->prepare($consulta);
            $stmt->bind_param("s", $id_user);
            $stmt->execute();
            $stmt->bind_result($idCita, $contra_bd);
            $stmt->fetch();
            echo "Recibe: ".$contra_user;
            echo "<br>Obtiene: ".$contra_bd;
            echo strcmp($contra_user, $contra_bd);
            if (!strcmp($contra_user, $contra_bd)) {
                session_start();
                $_SESSION['id_cita'] = $idCita;
                header("Location: ../mostrar_consulta.php");
                
            }else{
                header("Location: ../aviso_contra_incorrecta.php");
            }
            $conexion -> close();
        }            
	?>
    <?php include("../footer.html");	?>
</body>
</html>