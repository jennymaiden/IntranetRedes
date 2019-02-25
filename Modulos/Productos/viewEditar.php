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
			<div class="panel-heading" align="center"><h2>Editar Producto o Servicio</h2></div>
  	      	<div class="panel-body">
  	      		<?php
  	      			if (isset($_GET['result'])){ ?>
  	      				<div class="alert alert-success alert-dismissible " role="alert">
						  <strong>Se edito correctamente el producto o servicio</strong> 
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						
  	      		<?php 
  	      			}
  	      			if (!isset($_GET['idServicio'])) { ?>
  	      				<table class="table table-hover" id="tbl_editarCliente">
				    <thead>
				      <tr>
				        <th>Nombre</th>
				        <th>Vigencia</th>
				        <th>Costo</th>
				        <th>Acción</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
						    		$data = file_get_contents("./configuracion.json");
									$variables = json_decode($data, true);
									$dbconn = pg_connect($variables['conexion_bd']) or die('No se ha podido conectar: ' . pg_last_error());
								    if($dbconn){
								    	$query="select id,nombre, vigencia, costo from servicio";
								    	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
								    	if ($result) {
								    		
								    		if(pg_affected_rows($result) > 0){
								    			//$row = pg_fetch_assoc($result);
								    			while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
												    // var_dump($line);
												     echo "\t<tr>\n";
												     echo "<td>".$line['nombre']."</td>
													        <td>".$line['vigencia']."</td>
													        <td>".$line['costo']."</td>
													        <th><a href='index.php?nav=prodEditar&usuario=".$_GET['usuario']."&idServicio=".$line['id']."' class='btn btn-success btn-xs'>Editar</a></th>";
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
  	      			<?php }else{ 
  	      					$data = file_get_contents("./configuracion.json");
							$variables = json_decode($data, true);
							$dbconn = pg_connect($variables['conexion_bd']) or die('No se ha podido conectar: ' . pg_last_error());
							$nombre="";$vigencia=""; $costo=""; 
							if($dbconn){
							   	$query="select * from servicio where id=".$_GET['idServicio'];
								$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
								if ($result) {
								    		
									if(pg_affected_rows($result) > 0){
										$row = pg_fetch_assoc($result);
										
										$nombre = $row['nombre'];
										$vigencia = $row['vigencia'];
										$costo = $row['costo'];
										
										
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
  	      					<form action="Controlador/Productos/editarProducto.php" method="POST" accept-charset="utf-8" align="center">
  	      						<input type="hidden" name="usuario" value=<?php echo $_GET['usuario'];?>>
			  	      			<input type="hidden" name="idServicio" value=<?php echo $_GET['idServicio'];?>>
			  	      			<div class="row">
			  	      				<div class="col-sm-6">
			  	      					<div class="form-group">
										    <label for="txtNombre">Nombre</label>
										    <input type="text" class="form-control" id="txtNombre" name="txtNombre" required placeholder="Nombre" value=<?php echo $nombre; ?>>
										</div>
										<div class="form-group">
										    <label for="txtCosto">Costo</label>
										    <input type="text" class="form-control" id="txtCosto" name="txtCosto" required placeholder="Costo" value=<?php echo $costo; ?>>
										</div>
			  	      				</div>
			  	      				<div class="col-sm-6">
			  	      					<div class="form-group">
										    <label for="txtVigencia">Vigencia</label>
										    <input type="text" class="form-control" id="txtVigencia" name="txtVigencia" required placeholder="Vigencia" value=<?php echo $vigencia; ?>>
										</div>
										
			  	      				</div>
			  	      			</div>
			  	      			<div class="row">
			  	      				<div class="col-sm-4"></div>
									<div class="col-sm-4">
									    <input type="submit" class="btn btn-primary btn-lg btn-block" name="editar" value="Editar">
									</div>
									<div class="col-sm-4"></div>
										
			  	      			</div>
					  	      			

					  	    </form>
  	      		<?php	}
  	      		?>
  	      		
				
  	      	</div>
		</div>
		
	</div>
</body>
</html>