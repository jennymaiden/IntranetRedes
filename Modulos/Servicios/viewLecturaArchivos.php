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
			<div class="panel-heading" align="center"><h2>Lectura archivos</h2></div>
  	      	<div class="panel-body">
  	      		
  	      		<table class="table table-hover">
				    <thead>
				      <tr>
				        <th>Nombre Archivo</th>
				        <th>Descarga</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php 
				    		$data = file_get_contents("./configuracion.json");
							$variables = json_decode($data, true);
				    		$path="./".$variables['ruta_archivos']."/";
				    		$directorio=dir($path);
				    		while ($archivo = $directorio->read())
							{
								if($archivo !="." && $archivo !=".."){
									echo "<tr>
								        <td>".$archivo."</td>
								        <td><a href='./Controlador/Servicios/descargarArchivo.php?documento=".$archivo."'>Descargar</a></td>
								      </tr>";
								}
								
							}
							$directorio->close();
				    	?>
				     
				      
				    </tbody>
				</table>

  	      	</div>
		</div>
		
	</div>
</body>
</html>