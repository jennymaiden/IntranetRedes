<?php
echo "enviar correo <br>";
/**
 * Para poder realizar el envio de correo fue necesario modificar el archivo
 * PHP.INI en donde se cambiaron las siguientes variables:
 * smtp_port=25 --El puerto
 * sendmail_from = postmaster@localhost  --El usuario que envia el correo
 * SMTP=localhost --El servidor SMTP
 */
// El mensaje :::Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
$mensaje = wordwrap($_POST['mensaje'], 70, "\r\n");
//Funcion para el envio de correos
$envio = mail($_POST['destino'], $_POST['asunto'], $mensaje);

if (isset($envio)) {
  $respuesta = 'true';  
}else{
  $respuesta = 'false';
}

header("Location: ../Modulos/emails.php?result=".$respuesta);
?>
