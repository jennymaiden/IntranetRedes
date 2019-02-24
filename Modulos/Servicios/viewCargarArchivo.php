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
			<div class="panel-heading" align="center"><h2>Cargar Archivo</h2></div>
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
  	      		<form action="../Controlador/ServicioArchivos.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
							    <label for="documento">Favor cargar un archivo</label>
							    <input type="file" class="form-control-file" name="documento">
							</div>
							<div class="form-group row">
							    
							    <div class="col-sm-6">
							      <input type="submit" class="btn btn-primary btn-lg btn-block" name="Enviar">
							    </div>
							</div>
				</form>

  	      	</div>
		</div>
		
	</div>
</body>
</html>