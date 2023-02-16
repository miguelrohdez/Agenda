<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="utf-8">
        <title>Agenda de salas Labotec</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
	<?php include("nav_bar.html");	?>
	<div class="container">
		<header>
			<h1 class="tituloPrincipal">Perfil</h1>
		</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">
			<h2>Ver tu cita</h2>;
			<form action="./php/verifica_datos.php" method="POST">
				<table class="t_registro">
					<tr>
						<td>ID Cita: </td>
						<td><input type="text" name="txt_nocita"></td>
					</tr>
					<tr>
						<td>Contraseña: </td>
						<td><input type="password" name="txt_contra"></td>
					</tr>
					<tr>
						<td id="btn_ingresar" colspan="2"><input  type="submit" name="btn_entrar" value="Consultar"></td>
					</tr>
				</table>
   			</form>
		</div>
		
		
		<div class="clear"></div>
		</div>
		<footer>
            <h1 class="text-footer"> Derechos reservados Labotec México, S.C.</h1>
        </footer>
	</body>
</html>