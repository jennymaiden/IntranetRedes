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
			<div class="panel-heading" align="center"><h2>Editar Usuario</h2></div>
  	      	<div class="panel-body">
  	      		<?php
  	      			if (isset($_GET['result'])){ ?>
  	      				<div class="alert alert-success alert-dismissible " role="alert">
						  <strong>Se edito correctamente el usuario!</strong> 
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						
  	      		<?php 
  	      			}
  	      			if (!isset($_GET['idUsuario'])) { ?>
  	      				
  	      				<table class="table table-hover" id="tbl_editarCliente">
						    <thead>
						      <tr>
						        <th>Usuario</th>
						        <th>Nombre</th>
						        <th>Area</th>
						        <th>Acción</th>
						      </tr>
						    </thead>
						    <tbody>
						    	<?php
						    		$data = file_get_contents("./configuracion.json");
									$variables = json_decode($data, true);
									$dbconn = pg_connect($variables['conexion_bd']) or die('No se ha podido conectar: ' . pg_last_error());
								    if($dbconn){
								    	$query="select b.id, b.usuario,a.nombre, c.nombre as area from empleado as a inner join empleado_autenticacion as b on a.id_autenticacion=b.id inner join area as c on a.id_area=c.id;";
								    	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
								    	if ($result) {
								    		
								    		if(pg_affected_rows($result) > 0){
								    			//$row = pg_fetch_assoc($result);
								    			while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
												    
												     echo "\t<tr>\n";
												     echo "<td>".$line['usuario']."</td>
													        <td>".$line['nombre']."</td>
													        <td>".$line['area']."</td>
													        <th><a href='index.php?nav=usuEditar&usuario=".$_GET['usuario']."&idUsuario=".$line['id']."' class='btn btn-success btn-xs'>Editar</a></th>";
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

  	      		<?php	}else{

  	      					$data = file_get_contents("./configuracion.json");
							$variables = json_decode($data, true);
							$dbconn = pg_connect($variables['conexion_bd']) or die('No se ha podido conectar: ' . pg_last_error());
							$idEmpleado="";$usuario=""; $contrasenia="";
							if($dbconn){
							   	$query="select a.id as empleado, b.usuario, b.id, b.contrasenia from empleado as a inner join empleado_autenticacion as b on a.id_autenticacion=b.id  where b.id=".$_GET['idUsuario'];
								$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
								if ($result) {
								    		
									if(pg_affected_rows($result) > 0){
										$row = pg_fetch_assoc($result);
										
										$idEmpleado = $row['empleado'];
										$usuario = $row['usuario'];
										$contrasenia = $row['contrasenia'];

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

  	      				<form action="Controlador/Usuarios/editarUsuario.php" method="POST" accept-charset="utf-8" align="center">
		  	      			<input type="hidden" name="usuario" value=<?php echo $_GET['usuario'];?>>
			  	      			<input type="hidden" name="idUsuario" value=<?php echo $_GET['idUsuario'];?>>
		  	      			<div class="row">
		  	      				<div class="col-sm-6">
		  	      					<div class="form-group">
									    <label for="txtUsuario">Usuario</label>
									    <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" required placeholder="Nombre" value=<?php echo $usuario;?>>
									</div>
									<div class="form-group">
									    <label for="txtEmpleado">Asociar un empleado</label>
									     <select class="form-control" name="selectEmpleado">
										  	<option>Seleccione una opcion</option>
										  	<?php
										  		$data = file_get_contents("./configuracion.json");
												$variables = json_decode($data, true);
												$dbconn = pg_connect($variables['conexion_bd']) or die('No se ha podido conectar: ' . pg_last_error());
											    if($dbconn){
											    	$query="select * from empleado;";
											    	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
											    	if ($result) {
											    		
											    		if(pg_affected_rows($result) > 0){
											    			//$row = pg_fetch_assoc($result);
											    			while ($line = pg_fetch_assoc($result)) {
															     if ($line['id'] == $idEmpleado) {
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
		  	      				<!--- ********* -->
		  	      				<div class="col-sm-6">
		  	      					<div class="form-group">
									    <label for="txtContrasenia">Contraseña</label>
									    <input type="password" class="form-control" id="txtContrasenia" name="txtContrasenia" required placeholder="Contrasenia" value=<?php echo $contrasenia;?>>
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
  	      		<?php	}
  	      		?>
  	      		
				
  	      	</div>
		</div>
		
	</div>
</body>
</html>