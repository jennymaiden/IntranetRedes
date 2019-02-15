<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="bootstrap.min.css">
	<title>Autenticacion usuarios</title>

</head>
<body>
	<div class="panel-group">
		<div class="panel panel-info">
			<div class="panel-heading" align="center"><h2>Servicio de envio de correos</h2></div>
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
  	      		<form action="../Controlador/AutenticacionEmpleado.php" method="POST" accept-charset="utf-8" align="center">
		  	      			<div class="form-group row">
							    <label for="usuario" class="col-sm-2 col-form-label text-right">Usuario</label>
							    <div class="col-sm-8">
							      <input type="text"  class="form-control" id="usuario" name="usuario" value="" required placeholder="Usuario">
							    </div>
							</div>

							<div class="form-group row">
							    <label for="contrasenia" class="col-sm-2 col-form-label text-right" >Contraseña</label>
							    <div class="col-sm-8">
							      <input type="password"  class="form-control" id="contrasenia" name="contrasenia" value="" required placeholder="Contraseña">
							    </div>
							</div>
							<br>
							<div class="form-group row">
							    <div class="col-sm-4"></div>
							    <div class="col-sm-4">
							      <input type="submit" class="btn btn-primary btn-lg btn-block" name="Autenticar">
							    </div>
							    <div class="col-sm-4"></div>
							</div>

		  	      		</form>

  	      	</div>
		</div>
		
	</div>
</body>
</html>