<?php

    $data = file_get_contents("../configuracion.json");
    $variables = json_decode($data, true);

	$dbconn = pg_connect($variables['conexion_bd'])
    or die('No se ha podido conectar: ' . pg_last_error());
    if($dbconn){
    	//echo "Se pudo realizar la conexion";
    	//SQL de validar si ese usuario existe con esa contraseña
    	$query = "select id from empleado_autenticacion where usuario='".$_POST['usuario']."' and contrasenia='".$_POST['contrasenia']."' ";
    	//echo "SQL: ".$query;

    	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

    	if($result){
    		/*echo "Se pudo realizar la consulta";
    		echo "<br>";
    		echo "****** row afectados**** ".pg_affected_rows($result);*/
    		if(pg_affected_rows($result) == 1){
    			$row = pg_fetch_assoc($result);

    			//echo "<br>la respuesta es:...".$row['id'];
    			header("Location: ../index.php?nav=principal&usuario=".$row['id']);
    			/*echo "<table>\n";
	    		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
				     echo "\t<tr>\n";
				    foreach ($line as $col_value) {
				        echo "\t\t<td>$col_value</td>\n";
				    }
				    echo "\t</tr>\n";
				}*/
    		}else{
    			header("Location: ../Modulos/autenticacion.php?result=Error_Autenticacion");
    		}
    		
    	}else{
    		header("Location: ../Modulos/autenticacion.php?result=Problema_Conexion");
    		
    	}

    }else{
    	header("Location: ../Modulos/autenticacion.php?result=Problema_Conexion");
    }

    // Liberando el conjunto de resultados
	pg_free_result($result);

	// Cerrando la conexión
	pg_close($dbconn);

?>