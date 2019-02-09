<?php

	$dbconn = pg_connect("host=localhost dbname=Intranet user=postgres password=123456")
    or die('No se ha podido conectar: ' . pg_last_error());
    if($dbconn){
    	//echo "Se pudo realizar la conexion";
    	//SQL de validar si ese usuario existe con esa contraseña
    	$query = "select * from empleado_autenticacion where usuario='".$_POST['usuario']."' and contrasenia='".$_POST['contrasenia']."' ".
    	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
    	if($result){
    		echo "Se pudo realizar la consulta";
    		echo "<table>\n";
    		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
			     echo "\t<tr>\n";
			    foreach ($line as $col_value) {
			        echo "\t\t<td>$col_value</td>\n";
			    }
			    echo "\t</tr>\n";
			}
    	}else{
    		echo "No se pudo realizar la consulta";
    	}

    }else{
    	echo "No se pudo realizar la conexion";
    }

// Realizando una consulta SQL
/*$query = 'SELECT * FROM usuario';
$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

// Imprimiendo los resultados en HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);*/

?>