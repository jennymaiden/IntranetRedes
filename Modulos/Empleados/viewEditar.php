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
			<div class="panel-heading" align="center"><h2>Editar Empleados</h2></div>
  	      	<div class="panel-body">
  	      		<?php
  	      			if (isset($_GET['result'])){ ?>
  	      				<div class="alert alert-success alert-dismissible " role="alert">
						  <strong>Se edito correctamente el Empleado</strong> 
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						
  	      		<?php 
  	      			}
  	      			if (!isset($_GET['idEmpleado'])) { ?>
  	      				<table class="table table-hover" id="tbl_editarEmpleado">
						    <thead>
						      <tr>
						        <th>Nombre</th>
						        <th>Apellido</th>
						        <th>Correo</th>
						        <th>Acción</th>
						      </tr>
						    </thead>
						    <tbody>
						    	<?php 
						    		$data = file_get_contents("./configuracion.json");
									$variables = json_decode($data, true);
									$dbconn = pg_connect($variables['conexion_bd']) or die('No se ha podido conectar: ' . pg_last_error());
								    if($dbconn){
								    	$query="select * from empleado";
								    	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
								    	if ($result) {
								    		
								    		if(pg_affected_rows($result) > 0){
								    			//$row = pg_fetch_assoc($result);
								    			while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
												    // var_dump($line);
												     echo "\t<tr>\n";
												     echo "<td>".$line['nombre']."</td>
													        <td>".$line['apellido']."</td>
													        <td>".$line['correo']."</td>
													        <th><a href='index.php?nav=emplEditar&usuario=".$_GET['usuario']."&idEmpleado=".$line['id']."' class='btn btn-success btn-xs'>Editar</a></th>";
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
						      <tr>
						        <td>John</td>
						        <td>Doe</td>
						        <td>john@example.com</td>
						        <th><button type="button" class="btn btn-success btn-xs">Editar</button></th>
						      </tr>
						      
						    </tbody>
						</table>
  	      		<?php	}else{
  	      					$data = file_get_contents("./configuracion.json");
							$variables = json_decode($data, true);
							$dbconn = pg_connect($variables['conexion_bd']) or die('No se ha podido conectar: ' . pg_last_error());
							$nombre="";$apellido=""; $direccion=""; $correo=""; $telefono = ""; $area ="";
							if($dbconn){
							   	$query="select a.nombre, a.apellido, a.direccion,a.telefono,a.correo, b.id as area from empleado as a inner join area as b on a.id_area=b.id  where a.id=".$_GET['idEmpleado'];
								$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
								if ($result) {
								    		
									if(pg_affected_rows($result) > 0){
										$row = pg_fetch_assoc($result);
										
										$nombre = $row['nombre'];
										$apellido = $row['apellido'];
										$direccion = $row['direccion'];
										$correo = $row['correo'];
										$telefono = $row['telefono'];
										$area = $row['area'];
										
								    }else {
								    	echo "No ahi resultados";
								    }
								}else {

									echo "Fallo consulta";
								    	}
							}else{
							  	echo "No se pudo conectar";
							} ?>
							<form action="Controlador/Empleados/editarEmpleado.php" method="POST" accept-charset="utf-8" align="center">
  	      						<input type="hidden" name="usuario" value=<?php echo $_GET['usuario'];?>>
			  	      			<input type="hidden" name="idEmpleado" value=<?php echo $_GET['idEmpleado'];?>>
			  	      			<div class="row">
			  	      				<div class="col-sm-6">
			  	      					<div class="form-group">
										    <label for="txtNombre">Nombre</label>
										    <input type="text" class="form-control" id="txtNombre" name="txtNombre" required placeholder="Nombre" value=<?php echo $nombre; ?>>
										</div>
										<div class="form-group">
										    <label for="txtDireccion">Dirección</label>
										    <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" required placeholder="Dirección" value=<?php echo $direccion; ?>>
										</div>
										<div class="form-group">
										    <label for="txtCorreo">Correo electronico</label>
										    <input type="text" class="form-control" id="txtCorreo" name="txtCorreo" required placeholder="Correo" value=<?php echo $correo; ?>>
										</div>
			  	      				</div>
			  	      				<!--- ********* -->
			  	      				<div class="col-sm-6">
			  	      					<div class="form-group">
										    <label for="txtApellido">Apellido</label>
										    <input type="text" class="form-control" id="txtApellido" name="txtApellido" required placeholder="Apellido" value=<?php echo $apellido; ?>>
										</div>
										<div class="form-group">
										    <label for="txtTelefono">Teléfono</label>
										    <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" required placeholder="Teléfono" value=<?php echo $telefono; ?>>
										</div>
										<div class="form-group">
										    <label for="txtArea">Area al que pertenecera:</label>
										    <select class="form-control" name="selectArea">
											  <option>Seleccione una opcion</option>
											  <?php

													$data = file_get_contents("./configuracion.json");
													$variables = json_decode($data, true);
													$dbconn = pg_connect($variables['conexion_bd']) or die('No se ha podido conectar: ' . pg_last_error());
												    if($dbconn){
												    	$query="select * from area;";
												    	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
												    	if ($result) {
												    		
												    		if(pg_affected_rows($result) > 0){
												    			
												    			while ($line = pg_fetch_assoc($result)) {
																     if($line['id'] == $area){

																    		 echo "<option value='".$line['id']."' selected >".$line['nombre']."</option>";
																    	}else{
																    		 echo "<option value='".$line['id']."'>".$line['nombre']."</option>";
																    	}

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
											</select>
										</div>
			  	      				</div>
			  	      			</div>
			  	      			<div class="row">
			  	      				<div class="col-sm-4"></div>
									<div class="col-sm-4">
									    <input type="submit" class="btn btn-success btn-lg btn-block" name="editar" value="Editar">
									</div>
									<div class="col-sm-4"></div>
										
			  	      			</div>
				  	    </form>
  	      		<?php }?>
  	      		
				
  	      	</div>
		</div>
		
	</div>
</body>
</html>