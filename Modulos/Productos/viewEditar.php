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
			<div class="panel-heading" align="center"><h2>Editar Producto o Servicio</h2></div>
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
  	      		<table class="table table-hover" id="tbl_editarCliente">
				    <thead>
				      <tr>
				        <th>Nombre</th>
				        <th>Vigencia</th>
				        <th>Costo</th>
				        <th>Acción</th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr>
				        <td>John</td>
				        <td>Doe</td>
				        <td>john@example.com</td>
				        <th><button type="button" class="btn btn-success btn-xs">Editar</button></th>
				      </tr>
				      
				    </tbody>
				</table>
				<form action="Controlador/Clientes/editarProducto.php" method="POST" accept-charset="utf-8" align="center">
  	      			<div class="row">
  	      				<div class="col-sm-6">
  	      					<div class="form-group">
							    <label for="txtNombre">Nombre</label>
							    <input type="text" class="form-control" id="txtNombre" name="txtNombre" required placeholder="Nombre">
							</div>
							<div class="form-group">
							    <label for="txtCosto">Costo</label>
							    <input type="text" class="form-control" id="txtCosto" name="txtCosto" required placeholder="Costo">
							</div>
  	      				</div>
  	      				<div class="col-sm-6">
  	      					<div class="form-group">
							    <label for="txtVigencia">Vigencia</label>
							    <input type="text" class="form-control" id="txtVigencia" name="txtVigencia" required placeholder="Vigencia">
							</div>
							
  	      				</div>
  	      			</div>
  	      			<div class="row">
  	      				<div class="col-sm-4"></div>
						<div class="col-sm-4">
						    <input type="submit" class="btn btn-primary btn-lg btn-block" name="editar" value="Editar">
						</div>
						<div class="col-sm-4"></div>
							
  	      			</div>
		  	      			

		  	    </form>
  	      	</div>
		</div>
		
	</div>
</body>
</html>