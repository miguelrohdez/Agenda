<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="utf-8">
        <title>Agenda de salas Labotec</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
		
		
	</head>
	<body>
	
	<div class="container">
		<header>
			<h1 class="tituloPrincipal">Perfil</h1>
		</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">
			echo "<h2>Ver tu cita</h2>";
			<?php
				if (isset($_POST["btn_entrar"]) or !session_start() ) {
					$_SESSION['error_login'] = FALSE;
					require("./php/datos_con.php");
					$usuario =   $_POST["txt_email"];
					$password = $_POST["txt_contra"];
					$conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
					if ($conexion -> connect_errno) {
						echo "Fallo la conexion ".$conexion -> connect_errno;
					}else{
						$conexion -> set_charset("utf8");
						$consulta = "SELECT  NoCliente, cliente_nombre FROM cliente WHERE cliente_correo = ? AND cliente_contrasenia = ?";
						//$consulta ="SELECT  NoCliente, cliente_nombre, cliente_contrasenia FROM cliente WHERE cliente_correo = ?";
						$stmt = $conexion->prepare($consulta);
						$stmt->bind_param("ss", $usuario, $password);
						//$stmt->bind_param("s", $usuario);
						$stmt->execute();	
						$stmt->bind_result($idUsuario, $nombre_cliente);
						//$stmt->bind_result($idUsuario, $nombre_cliente, $contra_enc);
						/*if (password_verify($password,$contra_enc)) {
							echo "Correcto";
						}else{
							echo "INNCorrecto";
						}*/
						if ($stmt->fetch() ) {
							session_start();
							$_SESSION["usuario"]=$nombre_cliente;
							$_SESSION["id"]=$idUsuario;
							//header("location:carrito.php"); NO SE A QUE PAGINA MARDAR AL CLIENTE REGISTRADO
							
						}
						$conexion -> close();
					}            
				} 
			?>
			
			
		</div>
		
		
		<div class="clear"></div>
		</div>
		<footer>
            <h1 class="text-footer"> Derechos reservados Labotec México, S.C.</h1>
        </footer>
	</body>
</html>