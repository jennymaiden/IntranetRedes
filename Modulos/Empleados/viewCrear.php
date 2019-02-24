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
  	      		<form action="Controlador/Clientes/crearEmpleado.php" method="POST" accept-charset="utf-8" align="center">
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
							    <select class="form-control">
								  <option>Recursos Humanos</option>
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