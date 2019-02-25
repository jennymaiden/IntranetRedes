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
			<div class="panel-heading" align="center"><h2>Crear Empleado</h2></div>
  	      	<div class="panel-body">
  	      		<?php
  	      			if (isset($_GET['result'])){

  	      				if ($_GET['result'] =="true") { ?>
  	      				 	<div class="alert alert-success alert-dismissible " role="alert">
							  <strong>Se pudo crear correctamente el Empleado</strong> 
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
  	      		<form action="Controlador/Empleados/crearEmpleado.php" method="POST" accept-charset="utf-8" align="center">
  	      			<input type="hidden" name="usuario" value=<?php echo $_GET['usuario'];?>>
  	      			<div class="row">
  	      				<div class="col-sm-6">
  	      					<div class="form-group">
							    <label for="txtNombre">Nombre</label>
							    <input type="text" class="form-control" id="txtNombre" name="txtNombre" required placeholder="Nombre">
							</div>
							<div class="form-group">
							    <label for="txtDireccion">Dirección</label>
							    <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" required placeholder="Dirección">
							</div>
							<div class="form-group">
							    <label for="txtCorreo">Correo electronico</label>
							    <input type="text" class="form-control" id="txtCorreo" name="txtCorreo" required placeholder="Correo">
							</div>
  	      				</div>
  	      				<!--- ********* -->
  	      				<div class="col-sm-6">
  	      					<div class="form-group">
							    <label for="txtApellido">Apellido</label>
							    <input type="text" class="form-control" id="txtApellido" name="txtApellido" required placeholder="Apellido">
							</div>
							<div class="form-group">
							    <label for="txtTelefono">Teléfono</label>
							    <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" required placeholder="Teléfono">
							</div>
							
							<div class="form-group">
							    <label for="txtArea">Area al que pertenecera:</label>
							    <select class="form-control" name="selecArea">
								  <option>Seleccione un area</option>
								  <?php
								$data = file_get_contents("./configuracion.json");
								$variables = json_decode($data, true);
								$dbconn = pg_connect($variables['conexion_bd']) or die('No se ha podido conectar: ' . pg_last_error());
							    if($dbconn){
							    	$query="select * from area;";
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
  	      			</div>
  	      			<div class="row">
  	      				<div class="col-sm-4"></div>
						<div class="col-sm-4">
						    <input type="submit" class="btn btn-primary btn-lg btn-block" name="Autenticar" value="Crear">
						</div>
						<div class="col-sm-4"></div>
							
  	      			</div>
		  	      			

		  	    </form>

  	      	</div>
		</div>
		
	</div>
</body>
</html>