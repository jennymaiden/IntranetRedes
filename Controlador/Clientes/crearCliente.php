<?php

	echo "Crear cliente <br>";
	$dbconn = pg_connect("host=localhost dbname=Intranet user=postgres password=123456")
    or die('No se ha podido conectar: ' . pg_last_error());
    if($dbconn){

    }else{
    	header("Location: ../Modulos/Clientes/viewCrear.php?result=Problema_Conexion");
    }

    // Liberando el conjunto de resultados
	pg_free_result($result);

	// Cerrando la conexión
	pg_close($dbconn);
?>