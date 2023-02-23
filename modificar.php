<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Agenda de salas Labotec</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Actualizar</title>
</head>
<body>
    <?php
            session_start();
            $idCita = $_SESSION['id_cita'];
            include("./nav_bar.html");
            require("./php/datos_con.php");
            $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
            $conexion -> set_charset("utf8");
            $consulta = "SELECT area_reserva, colaborador_reserva, asunto_reserva, sala_reserva, fecha_reserva, hora_inicio, hora_termino, participantes_reserva FROM agenda WHERE nocita = ?";
            $stmt = $conexion->prepare($consulta);
            $stmt->bind_param("s", $idCita);
            $stmt->execute();
            $stmt->bind_result($area,$colaborador,$asunto,$sala,$fecha,$hora_i,$hora_t,$participantes);
            $consulta = $stmt->fetch();
    ?>
    <div class="container">
		<header>
			<h1 class="tituloPrincipal">Actualizar datos</h1>
		</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">
            
            <form action="./php/actualizar.php" method="POST">
            <table class="t_registro">
                <tr>
                    <td>Area que reserva </td><td><input list="areas" name="txt_area" value= '<?php echo $area;?>'>
                                                <datalist id="areas">
                                                    <option value="Atencion a clientes">
                                                    <option value="Calidad">
                                                    <option value="Finanzas">
                                                    <option value="Recursos Humanos">
                                                    <option value="Seguridad e Higiene">
                                                    <option value="TI">
                                                    <option value="UEL">
                                                    <option value="UEN">
                                                    <option value="UI">
                                                    <option value="UME">
                                                </datalist>
                                                </td>
                </tr>
                <tr>
                    <td>Quien reserva </td><td><input type="text" name="txt_colaborador" value='<?php echo $colaborador;?>'></td>
                </tr>
                <tr>
                    <td>Asunto </td><td><input type="text" name="txt_asunto" value='<?php echo $asunto;?>'></td>
                </tr>
                <tr>
                    <td>Sala </td><td><input list="salas" name="txt_sala" value='<?php echo $sala;?>'>
                                                <datalist id="salas">
                                                    <option value="Tesla">
                                                    <option value="Volta">
                                                    <option value="Faraday">
                                                </datalist>
                                                </td>
                </tr>
                <tr>
                    <td>Fecha </td><td><input type="date" name="txt_fecha" value='<?php echo $fecha;?>'></td>
                </tr>
                <tr>
                    <td>Hora incio </td><td><input type="time" name="txt_hora_ini" value='<?php echo $hora_i;?>'></td>
                </tr>
                <tr>
                    <td>Hora termino </td><td><input type="time" name="txt_hora_fin" value='<?php echo $hora_t;?>'></td>
                </tr>
                <tr>
                    <td>No de participantes </td><td><input type="number" name="txt_participantes" value='<?php echo $participantes;?>'></td>
                </tr>
                <tr>
                    <td class="btn_registro"><input  type="submit" name="btn_actualizar" value="Actualizar"></td>
                </tr>
            </table>
        </form>
        </div>
        <div class="clear"></div>
        </div>
        <?php include("./footer.html");	?>
    </body>
</html>