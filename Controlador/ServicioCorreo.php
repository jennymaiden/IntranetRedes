<?php
echo "enviar correo <br>";
/*$para      = 'jennymaiden.vc@gmail.com';
$titulo    = 'El título';
$mensaje   = 'Hola';
$cabeceras = 'From: carolina.vc.94@hotmail.es' . "\r\n" .
    'Reply-To: carolina.vc.94@hotmail.es' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


echo "Correo: "+mail($para, $titulo, $mensaje, $cabeceras);*/

/*ini_set( 'display_errors', 1 );
   error_reporting( E_ALL );
   $from = "test@hostinger-tutorials.com";
   $to = "test@gmail.com";
   $subject = "Checking PHP mail";
   $message = "PHP mail works just fine";
   $headers = "From:" . $from;
   mail($to,$subject,$message, $headers);
   echo "The email message was sent.";*/

echo "<br>Correo enviado";
header("Location: ../Modulos/emails.php?result=true");
?>
