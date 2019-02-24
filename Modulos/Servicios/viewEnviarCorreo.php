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
			<div class="panel-heading" align="center"><h2>Enviar Correo</h2></div>
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
  	      		<div class="row">
  	      			<div class="col-sm-12">
  	      				<p>Para poder ingresar a su correo corporativo, es obligatorio ser parte de la empresa, y tener un usuario registrado dentro del directorio activo de Colfondos.<br>En el siguiente link podra realizar la gestion de correo</p><br>
  	      				<a href="https://www.google.com/" target="_blank">Correo Corporativo Red Colfondos.ud</a>
  	      			</div>
  	      		</div>

  	      	</div>
		</div>
		
	</div>
</body>
</html>