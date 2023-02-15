<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formulario.css">
    <title>Formulario enviado </title>
</head>
<body>
    <header class="header">
        <div class="container">
        <?php

            // si existen todas las variables
            if( $_POST['name'] && $_POST['email'] && $_POST['subject'] && $_POST['message'] ) {

                $host = "localhost";
                $user = "root";
                $password = "usbw";
                $database = "testing";
    
                // Conexion a la base de datos
                $con = new mysqli($host, $user, $password, $database);

                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }
                
                $nombre = $_POST['name'];
                $email = $_POST['email'];
                $asunto = $_POST['subject'];
                $mensaje = $_POST['message'];

                $query = "call sp_inserta_contacto('".$nombre."','".$email."','".$asunto."','".$mensaje."');";

                if (!$result = mysqli_query($con, $query)) {
                    exit(mysqli_error($con));
                }
                echo '<h1 class="mensaje"> Felicidades '. $nombre . ' su mensaje ha sido recibido </h1>';

            }
            else {
                echo '<h1 class="mensaje"> Por favor necesita enviar sus datos </h1>';
            }
            echo '<a class="regresar-boton" href="../index.html"> Regresar a la sección de contacto </a>';
        ?>
        </div>
    </header>
</body>
</html>