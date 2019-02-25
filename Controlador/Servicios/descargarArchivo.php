<?php
	$data = file_get_contents("../../configuracion.json");
    $variables = json_decode($data, true);

	$enlace = $variables['ruta_archivos']."/".$_GET['documento'];
	echo "enlace ::".$enlace;echo "<br>";
	
	header ("Content-Disposition: attachment; filename=".$_GET['documento']." ");
	header ("Content-Type: application/jpeg");
	header ("Content-Length: ".filesize($enlace));
	readfile($enlace);
?>