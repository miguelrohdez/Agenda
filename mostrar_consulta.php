<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="utf-8">
		<title>Lalo's Burgers</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
	<!-- Parte que verifica el login -->
		
		<?php
				include("./nav_bar.html");
		?>
	
	<!-- Aqui  empieza la caja principal -->
	<div class="container">
		<header>
			<h1 class="tituloPrincipal">Perfil</h1>
		</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">
				
			<?php 
               session_start();
               echo $_SESSION['id_cita'];
               require("./php/datos_con.php");
               $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
               $conexion -> set_charset("utf8");
               if ($conexion -> connect_errno) {
                    echo "Fallo la conexion ".$conexion -> connect_errno;
               }else{
                   $consulta = "SELECT nocita, area_reserva, colaborador_reserva, asunto_reserva, sala_reserva, fecha_reserva, hora_inicio, hora_termino, participantes_reserva FROM agenda WHERE nocita = ?";
                   $stmt = $conexion->prepare($consulta);
                   $stmt->bind_param("s", $_SESSION['id_cita']);
                   $stmt->execute();
                   $stmt->bind_result($nocita, $area,$colaborador,$asunto,$sala,$fecha,$hora_inicio,$hora_termino,$no_personas);
                   $stmt->fetch();
               }
               echo "<table class='t_registro'>
                        <tr>
                            <td>ID de Cita </td><td>".$nocita."</td>
                        </tr>
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
                            <td>Horario</td><td>".$hora_inicio."<span> - </span>".$hora_termino."</td>
                        </tr>
                        <tr>
                            <td>No de participantes </td><td>".$no_personas."</td>
                        </tr>
                        <tr>
                        <td class='btn_registro'><a href='./modificar.php'><button>Modificar Cita</button></a></td>
                        <td class='btn_registro'><a href='advertencia_eliminar.php'><button>Eliminarla</button></a></td>
                        </tr>
                    </table>";
                                    
            ?>
        </div>
                                
                                
		<div class="clear"></div>
		</div>
	</body>
    <footer>
        <h1 class="text-footer"> Derechos reservados Labotec México, S.C.</h1>
    </footer>
</html>