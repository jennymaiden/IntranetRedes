<!<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Archivos de ftp</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="panel-group">
		<div class="panel panel-info">
			<div class="panel-heading" align="center"><h2>Servicio de carga de archivos</h2></div>
			<div class="panel-body">
				
				<?php 
					if (!isset($_GET['result'])){ ?>
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

				<?php }else{
						echo "La respuesta es:....".$_GET['result'];
					}
				?>
			</div>
		</div>
		
	</div>
	
</body>
</html>