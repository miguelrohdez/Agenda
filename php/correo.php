<?php 
Configuración de correo
$email = "M@ejemplo.com";
$asunto = "Asunto del correo electrónico";
$cuerpo = "Cuerpo del correo electrónico";

// Configuración de autenticación SMTP
$smtpHost = "servidor_smtp_ejemplo.com";
$smtpUsername = "usuario_smtp_ejemplo";
$smtpPassword = "contraseña_smtp_ejemplo";
$smtpPort = 587;

// Encabezados del correo electrónico
$headers = "From: remitente@ejemplo.com\r\n";
$headers .= "Reply-To: remitente@ejemplo.com\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Configuración de la función mail()
ini_set("SMTP", $smtpHost);
ini_set("smtp_port", $smtpPort);
ini_set("sendmail_from", "remitente@ejemplo.com");
ini_set("auth_username", $smtpUsername);
ini_set("auth_password", $smtpPassword);

// Envío del correo electrónico
if (mail($email, $asunto, $cuerpo, $headers)) {
    echo "El correo electrónico ha sido enviado con éxito.";
} else {
    echo "Hubo un problema al enviar el correo electrónico.";
}
?>
