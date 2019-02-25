<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="bootstrap.min.css">

</head>
<body>
	<div class="panel-group">
		<div class="panel panel-info">
			<div class="panel-heading" align="center"><h2>Consulta Empleados</h2></div>
  	      	<div class="panel-body">
  	      		
  	      		<table class="table table-hover">
				    <thead>
				      <tr>
				        <th>Nombre</th>
				        <th>Apellido</th>
				        <th>Dirección</th>
				        <th>Teléfono</th>
				        <th>Correo</th>
				        <th>Area</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
				    		$data = file_get_contents("./configuracion.json");
							$variables = json_decode($data, true);
							$dbconn = pg_connect($variables['conexion_bd']) or die('No se ha podido conectar: ' . pg_last_error());
						    if($dbconn){
						    	$query="select a.nombre, a.apellido, a.direccion,a.telefono,a.correo, b.nombre as area from empleado as a inner join area as b on a.id_area=b.id ;";
						    	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
						    	if ($result) {
						    		
						    		if(pg_affected_rows($result) > 0){
						    			//$row = pg_fetch_assoc($result);
						    			while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
										     echo "\t<tr>\n";
										    foreach ($line as $col_value) {
										        echo "\t\t<td>$col_value</td>\n";
										    }
										    echo "\t</tr>\n";
										}
						    		}else {
						    			echo "No ahi resultados";
						    		}
						    	}else {

						    		echo "Fallo consulta";
						    	}
						    }else{
						    	echo "No se pudo conectar";
						    }
				    	?>
				      
				      
				    </tbody>
				</table>

  	      	</div>
		</div>
		
	</div>
</body>
</html>