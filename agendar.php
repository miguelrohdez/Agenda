<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Reserva de salas</title>
</head>
<body>
<?php include("nav_bar.html");	?>
<form action="reservar.php" method="POST">
        <table class="t_registro">
            <tr>
                <td>Area que reserva </td><td><input list="areas" name="txt_area" placeholder="Selecciona tu área...">
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
                <td>Quien reserva </td><td><input type="text" name="txt_colaborador" placeholder="Quién usara la sala..."></td>
            </tr>
            <tr>
                <td>Asunto </td><td><input type="text" name="txt_asunto" placeholder="Asunto..."></td>
            </tr>
            <tr>
                <td>Sala </td><td><input list="salas" name="txt_sala" placeholder="Selecciona la sala...">
                                            <datalist id="salas">
                                                <option value="Tesla">
                                                <option value="Volta">
                                                <option value="Faraday">
                                            </datalist>
                                            </td>
            </tr>
            <tr>
                <td>Fecha </td><td><input type="date" name="txt_fecha" placeholder="Para que fecha..."></td>
            </tr>
            <tr>
                <td>Hora incio </td><td><input type="time" name="txt_hora_ini" placeholder="Hora inicio..."></td>
            </tr>
            <tr>
                <td>Hora termino </td><td><input type="time" name="txt_hora_fin" placeholder="Hora termino..."></td>
            </tr>
            <tr>
                <td>No de participantes </td><td><input type="number" name="txt_participantes" placeholder="Número de participantes..."></td>
            </tr>
            <tr>
                <td class="btn_registro"><input  type="reset" name="btn_borrar" value="Borrar Campos"></td>
                <td class="btn_registro"><input  type="submit" name="btn_entrar" value="Reservar"></td>
            </tr>
        </table>
    </form>
    <?php include("./footer.html");	?>
</body>
    
</html>