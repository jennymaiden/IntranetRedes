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
			<div class="panel-heading" align="center"><h2>Consulta Producto o Servicio</h2></div>
  	      	<div class="panel-body">
  	      		
  	      		<table class="table table-hover">
				    <thead>
				      <tr>
				        <th>Nombre</th>
				        <th>Vigencia</th>
				        <th>Costo</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
				    		$data = file_get_contents("./configuracion.json");
							$variables = json_decode($data, true);
							$dbconn = pg_connect($variables['conexion_bd']) or die('No se ha podido conectar: ' . pg_last_error());
						    if($dbconn){
						    	$query="select nombre, vigencia, costo from servicio;";
						    	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
						    	if ($result) {
						    		
						    		if(pg_affected_rows($result) > 0){
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