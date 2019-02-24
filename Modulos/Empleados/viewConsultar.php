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
			<div class="panel-heading" align="center"><h2>Consulta Empleados</h2></div>
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
  	      		<table class="table table-hover">
				    <thead>
				      <tr>
				        <th>Nombre</th>
				        <th>Apellido</th>
				        <th>Dirección</th>
				        <th>Teléfono</th>
				        <th>Correo</th>
				        <th>Area</th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr>
				        <td>John</td>
				        <td>Doe</td>
				        <td>calle 100</td>
				        <td>123456</td>
				        <td>john@example.com</td>
				        <td>Recursos humanos</td>
				      </tr>
				      
				    </tbody>
				</table>

  	      	</div>
		</div>
		
	</div>
</body>
</html>