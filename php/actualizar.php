<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
		<title>Actualización de datos</title>
</head>
<body>
    
    <?php include("./nav_bar.html");?>
    <div class="container">
		<header>
            <h1 class="tituloPrincipal">Actualización de datos!</h1>
		</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">
    <?php 
        require("./datos_con.php");
        session_start();
        $area = $_POST['txt_area'];
        $colaborador = $_POST['txt_colaborador'];
        $asunto = $_POST['txt_asunto'];
        $sala = $_POST['txt_sala'];
        $fecha = $_POST['txt_fecha'];
        $hora_inicio = $_POST['txt_hora_ini'];
        $hora_termino = $_POST['txt_hora_fin'];
        $participantes = $_POST['txt_participantes'];
        $idCliente = $_SESSION['id_cita'];
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
                    <td>Contraseña </td><td>Sin modificaciones</td>
                </tr>
               
            </table>";
            $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
            if ($conexion -> connect_errno) {
                echo "Fallo la conexion ".$conexion -> connect_errno;
            }else{
                $conexion -> set_charset("utf8");
                $consulta = "call SP_ModificarReservacion(?,?,?,?,?,?,?,?,?)";
                $stmt = $conexion->prepare($consulta);
                $stmt = $conexion->prepare($consulta);
                $stmt->bind_param("sssssssss",$idCliente,$area,$colaborador,$asunto,$sala,$fecha,$hora_inicio,$hora_termino,$participantes);
                $stmt->execute();	
                if ($stmt->affected_rows>0) {
                    echo "<h2 class='txt_adventencia'>Se ha modificado correctamente
                    <a href='../index.php'><button>Regresar</button></a></h2>"; //ir a pagina
                }else{
                    echo "<h2 class='txt_adventencia'>Hubo un error al registrarlo</h2>";
                }
                $stmt->free_result();	
                $conexion -> close();
            }
    	?>
</div>
		<div class="clear"></div>
	</div>
    <?php include("../footer.html");	?>
	</body>
</html>