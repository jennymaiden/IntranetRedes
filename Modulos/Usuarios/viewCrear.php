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
  	      			if (isset($_GET['result'])){ ?>
  	      				<div class="alert alert-danger alert-dismissible " role="alert">
						  <strong>Ocurrio un problema!</strong> <?php echo "".$_GET['result']; ?>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						
  	      		<?php 
  	      			}
  	      		?>
  	      		<form action="Controlador/Clientes/crearUsuario.php" method="POST" accept-charset="utf-8" align="center">
  	      			<div class="row">
  	      				<div class="col-sm-6">
  	      					<div class="form-group">
							    <label for="txtUsuario">Usuario</label>
							    <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" required placeholder="Nombre">
							</div>
							<div class="form-group">
							    <label for="txtEmpleado">Asociar un empleado</label>
							     <select class="form-control">
								  	<option>Nombre Apellido</option>
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