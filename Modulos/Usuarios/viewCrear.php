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
			<div class="panel-heading" align="center"><h2>Crear Usuario</h2></div>
  	      	<div class="panel-body">
  	      		<?php
  	      			if (isset($_GET['result'])){ 
  	      				if ($_GET['result'] =="true") { ?>
  	      				 	<div class="alert alert-success alert-dismissible " role="alert">
							  <strong>Se pudo crear correctamente el Usuario</strong> 
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
  	      				<?php }else{ ?>
  	      						<div class="alert alert-danger alert-dismissible " role="alert">
								  <strong>Ocurrio un problema!</strong>
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>
  	      				<?php } ?>
						
  	      		<?php 
  	      			}
  	      		?>
  	      		<form action="Controlador/Usuarios/crearUsuario.php" method="POST" accept-charset="utf-8" align="center">
  	      			<input type="hidden" name="usuario" value=<?php echo $_GET['usuario'];?>>
  	      			
  	      			<div class="row">
  	      				<div class="col-sm-6">
  	      					<div class="form-group">
							    <label for="txtUsuario">Usuario</label>
							    <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" required placeholder="Nombre">
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
													     echo "<option value='".$line['id']."'>".$line['nombre']."</option>";
													    
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
							    <input type="password" class="form-control" id="txtContrasenia" name="txtContrasenia" required placeholder="Contrasenia">
							</div>
							
  	      				</div>
  	      			</div>
  	      			<div class="row">
  	      				<div class="col-sm-4"></div>
						<div class="col-sm-4">
						    <input type="submit" class="btn btn-primary btn-lg btn-block" name="crear" value="Crear">
						</div>
						<div class="col-sm-4"></div>
							
  	      			</div>
		  	      			

		  	    </form>

  	      	</div>
		</div>
		
	</div>
</body>
</html>