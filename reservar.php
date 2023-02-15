<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/main.css">
		<title>Datos registrados</title>
	</head>
	<body>
    <?php include("nav_bar.html");	?>
    <div class="container">
		<header>
			<h1 class="tituloPrincipal">Agenda</h1>
		</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">
		<?php 
			require("./php/datos_con.php");
			require("./php/generar_pass.php");
           
			$area = $_POST['txt_area'];
			$colaborador = $_POST['txt_colaborador'];
			$asunto = $_POST['txt_asunto'];
			$sala = $_POST['txt_sala'];
			$fecha = $_POST['txt_fecha'];
			$hora_inicio = $_POST['txt_hora_ini'];
			$hora_termino = $_POST['txt_hora_fin'];
			$participantes = $_POST['txt_participantes'];
			$contrasenia  = generarContrasenia();
            echo "<table class='t_registro'>
								<tr>
									<td>Area que reserva </td><td>".$area."</td>
								</tr>
								<tr>
									<td>Quien reserva </td><td>".$colaborador."</td>
								</tr>
								<tr>
									<td>Asunto </td><td>".$asunto."</td>
								</tr>
								<tr>
									<td>Sala </td><td>".$sala."</td>
								</tr>
								<tr>
									<td>Fecha </td><td>".$fecha."</td>
								</tr>
								<tr>
									<td>Hora incio </td><td>".$hora_inicio."</td>
								</tr>
								<tr>
									<td>Hora termino </td><td>".$hora_termino."</td>
								</tr>
                                <tr>
									<td>No de participantes </td><td>".$participantes."</td>
								</tr>
                                <tr>
									<td>Contraseña </td><td>".$contrasenia."</td>
								</tr>
							</table>
							";
            $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
            if ($conexion -> connect_errno) {
                echo "Fallo la conexion ".$conexion -> connect_errno;
            }else{
                $conexion -> set_charset("utf8");
                $consulta = "call SP_AltaReservacion(?,?,?,?,?,?,?,?,?)";
                $stmt = $conexion->prepare($consulta);
                $stmt->bind_param("sssssssss",$area,$colaborador,$asunto,$sala,$fecha,$hora_inicio,$hora_termino,$participantes,$contrasenia);
                $stmt->execute();	
                if ($stmt->affected_rows>0) {
					echo "<h2 class='txt_adventencia'>Se ha registrado correctamente</h2>
					<p>Guarde bien la contraseña antes de cerrar la ventana, ya que se requiere para modificar o cancelar la cita</p>"; //ir a pagina
                }else{
					echo "Hubo error";
                }
				$stmt->free_result();	
				$conexion -> close();
			}
		?>
        </div>
		<div class="clear"></div>
	</div>
</body>
<footer>
    <h1 class="text-footer"> Derechos reservados Labotec México, S.C.</h1>
</footer>
</html>