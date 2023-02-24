<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title>Eliminar</title>
</head>
<body>
<?php include("./nav_bar.html"); ?>
    <div class="container">
		<header>
			<h1 class="tituloPrincipal">Bienvenido a Lalo's Burgues</h1>
		</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">
		<?php 
            session_start();
            require("./datos_con.php");
            $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
            if ($conexion -> connect_errno) {
                echo "Fallo la conexion ".$conexion -> connect_errno;
            }else{
                
                $idCliente = $_SESSION['id_cita'];
                $conexion -> set_charset("utf8");
                //$conexion -> query("Select * from cliente where NoCliente =". $idCliente);
                $consulta = "call SP_BorrarReservacion(?)";
                $stmt = $conexion->prepare($consulta);
                $stmt->bind_param("i", $idCliente);
                $stmt->execute();	
                //$stmt->bind_result($idUsuario, $nombre_cliente);
                if ($stmt->affected_rows>0) {
                    session_destroy();
                    header("location: ../eliminacion_correcta.php");
                }else{
                    echo "<h2>Hubo un error al eliminar</h2>";
                }
            }
		?>
        </div>
		<div class="clear"></div>
	</div>
    <?php include("./footer.html");	?>
	</body>
</html>
