<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Eliminar</title>
</head>
<body>
<?php       
        session_start();
        ?>
    <div class="container">
		<header>
			<h1 class="tituloPrincipal">Bienvenido a Lalo's Burgues</h1>
		</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">
		<?php 
            require("./php/datos_con.php");
            $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
            if ($conexion -> connect_errno) {
                echo "Fallo la conexion ".$conexion -> connect_errno;
            }else{
                
                $conexion -> set_charset("utf8");
                //$conexion -> query("Select * from cliente where NoCliente =". $idCliente);
                $consulta = "call SP_BorrarCliente(?)";
                $idCliente = $_SESSION['id_cita'];
                $stmt = $conexion->prepare($consulta);
                $stmt->bind_param("i", $idCliente);
                $stmt->execute();	
                //$stmt->bind_result($idUsuario, $nombre_cliente);
                if ($stmt->affected_rows>0) {
                    session_start();
                    session_destroy();
                    header("location:eliminacion_correcta.html");
                }else{
                    echo "<h2>Hubo un error al borrarla</h2>";
                }
            }
		?>
        </div>
		<div class="clear"></div>
	</div>
		<footer>
			<h1 class="text-footer"> Ⓒ 2021 Lalo's Burger ALGUNOS PRODUCTOS ESTAN SUJETOS A DISPONIBILIDAD</h1>
		</footer>
	</body>
</html>
