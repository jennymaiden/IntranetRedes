<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="./Utilidades/Bootstrap/bootstrap.min.css" rel="stylesheet">
	<title>Autenticacion usuarios</title>

</head>
<body>
	<div class="panel-group">
		<div class="panel panel-info">
			<div class="panel-heading" align="center"><h2>Servicio de envio de correos</h2></div>
  	      	<div class="panel-body">
  	      		<?php
  	      			if (!isset($_GET['result'])){ ?>
  	      				<form action="../Controlador/AutenticacionEmpleado.php" method="POST" accept-charset="utf-8" align="center">
		  	      			<div class="form-group row">
							    <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
							    <div class="col-sm-10">
							      <input type="text"  class="form-control-plaintext" id="usuario" name="usuario" value="" required>
							    </div>
							</div>

							<div class="form-group row">
							    <label for="contrasenia" class="col-sm-2 col-form-label">Contraseña</label>
							    <div class="col-sm-10">
							      <input type="password"  class="form-control-plaintext" id="contrasenia" name="contrasenia" value="" required>
							    </div>
							</div>
							<br>
							<div class="form-group row">
							    
							    <div class="col-sm-6">
							      <input type="submit" class="btn btn-primary btn-lg btn-block" name="Autenticar">
							    </div>
							</div>

		  	      		</form>
  	      		<?php 
  	      			}else{
  	      				echo "Hola el resultado es:....".$_GET['result'];
  	      			}
  	      		?>
  	      		

  	      	</div>
		</div>
		
	</div>
</body>
</html>