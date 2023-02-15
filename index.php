<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css">
   
   
    <title>Agenda de salas Labotec</title>
</head>
<body>
        <?php include("nav_bar.html");	?>
    

        <header>
			<h1 class="tituloPrincipal">Agenda</h1>
		</header>
        
        <?php require("./php/mesEspaniol.php");
            $nombreMes = traducirNombre($month = date("F"));
            echo "<h2>$nombreMes</h2>";
        ?>

  <table class="calendario">
    <thead>
        <tr>
        <th class="calendario">Lunes</th>
        <th class="calendario">Martes</th>
        <th class="calendario">Miércoles</th>
        <th class="calendario">Jueves</th>
        <th class="calendario">Viernes</th>
        <th class="calendario">Sábado</th>
        <th class="calendario">Domingo</th>
        </tr>
    </thead>
    <tbody>
        <?php
            require("./php/datos_con.php");
                $month = date("m");
                $year = date("Y");
                $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                $first_day = date('N', strtotime("$year-$month-01"));
                $last_day = date('N', strtotime("$year-$month-$day"));
                $weeks = ceil(($day + $first_day - 1) / 7);
                $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
                $conexion -> set_charset("utf8");
                $consulta = "SELECT nocita, area_reserva, colaborador_reserva, asunto_reserva, sala_reserva, hora_inicio, hora_termino FROM agenda WHERE fecha_reserva = ?";
        
                for ($i = 0; $i < $weeks; $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= 7; $j++) {
                    $current_day = $i * 7 + $j - $first_day + 1;
                    if ($current_day > 0 && $current_day <= $day) {
                        $current_date = "$year-$month-$current_day";
                        echo "<td class='calendario'>";
                        echo "<div class='day'>$current_day</div>";

                        $stmt = $conexion->prepare($consulta);
                        $stmt->bind_param("s", $current_date);
                        $stmt->execute();
                        $stmt->bind_result($nocita, $area,$colaborador,$asunto,$sala,$hora_inicio,$hora_termino);
                        while ($stmt->fetch()) {
                            echo "<ul class='cita'>"; 
                            echo "<li class='cita'>"."<span>No Cita: </span>".$nocita."</li>"; 
                            echo "<li class='cita'>".$area."<span> - </span>".$colaborador."</li>"; 
                            echo "<li class='cita'>"."<span>Sala </span>".$sala."</li>"; 
                            echo "<li class='cita'>".$hora_inicio."<span> - </span>".$hora_termino."</li>"; 
                            echo"</ul>";
                            }
                            $stmt->free_result();
                            $stmt->close();		   
                            echo "</td>";
                        } else {
                        echo "<td></td>";
                        }
                    }
                    echo "</tr>";
                    }
        ?>
        </tbody>
    </table>

    <?php 
        $nombreMes = traducirNombre(date('F', strtotime('+1 month')));
        echo "<h2>$nombreMes</h2>";
    ?>
    <table class="calendario">
    <thead>
        <tr>
        <th class="calendario">Lunes</th>
        <th class="calendario">Martes</th>
        <th class="calendario">Miércoles</th>
        <th class="calendario">Jueves</th>
        <th class="calendario">Viernes</th>
        <th class="calendario">Sábado</th>
        <th class="calendario">Domingo</th>
        </tr>
    </thead>
    <tbody>
        <?php
                $month = date('m', strtotime('+1 month'));
                $year = date("Y");
                $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                $first_day = date('N', strtotime("$year-$month-01"));
                $last_day = date('N', strtotime("$year-$month-$day"));
                $weeks = ceil(($day + $first_day - 1) / 7);
                $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
                $conexion -> set_charset("utf8");
                $consulta = "SELECT area_reserva, colaborador_reserva, asunto_reserva, sala_reserva, hora_inicio, hora_termino FROM agenda WHERE fecha_reserva = ?";
        
                for ($i = 0; $i < $weeks; $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= 7; $j++) {
                    $current_day = $i * 7 + $j - $first_day + 1;
                    if ($current_day > 0 && $current_day <= $day) {
                        $current_date = "$year-$month-$current_day";
                        echo "<td class='calendario'>";
                        echo "<div class='day'>$current_day</div>";

                        $stmt = $conexion->prepare($consulta);
                        $stmt->bind_param("s", $current_date);
                        $stmt->execute();
                        $stmt->bind_result($area,$colaborador,$asunto,$sala,$hora_inicio,$hora_termino);
                        while ($stmt->fetch()) {
                            echo "<ul class='cita'>"; 
                            echo "<li class='cita'>".$asunto."</li>"; 
                            echo "<li class='cita'>".$area."<span> - </span>".$colaborador."</li>"; 
                            echo "<li class='cita'>"."<span>Sala </span>".$sala."</li>"; 
                            echo "<li class='cita'>".$hora_inicio."<span> - </span>".$hora_termino."</li>"; 
                            echo"</ul>";
                            }
                            $stmt->free_result();
                            $stmt->close();		   
                            echo "</td>";
                        } else {
                        echo "<td></td>";
                        }
                    }
                    echo "</tr>";
                    }
        ?>
        </tbody>
    </table>
</body>
<footer>
    <h1 class="text-footer"> Derechos reservados Labotec México, S.C.</h1>
</footer>
</html>