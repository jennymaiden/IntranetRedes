<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Envio de correos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="panel-group">
		<div class="panel panel-info">
			<div class="panel-heading" align="center"><h2>Servicio de envio de correos</h2></div>
  	      	<div class="panel-body">
  	      		
  	      		<form action="../Controlador/ServicioCorreo.php" method="POST" accept-charset="utf-8">
  	      			<div class="form-group row">
					    <label for="destinatario" class="col-sm-2 col-form-label">Destinatario</label>
					    <div class="col-sm-10">
					      <input type="text"  class="form-control-plaintext" id="destinatario" name="destino" value="" required>
					    </div>
					</div>
					<div class="form-group row">
					    <label for="asunto" class="col-sm-2 col-form-label">Asunto</label>
					    <div class="col-sm-10">
					      <input type="text"  class="form-control-plaintext" id="asunto" name="asunto" value="" required>
					    </div>
					</div>
					<div class="form-group row">
					    <label for="mensaje" class="col-sm-2 col-form-label">Mensaje</label>
					    <div class="col-sm-10">
					      <textarea  name="mensaje" placeholder="Leave your message here ...." required >
					      	
					      </textarea>
					    </div>
					</div>
					<div class="form-group row">
					    
					    <div class="col-sm-6">
					      <input type="submit" class="btn btn-primary btn-lg btn-block" name="Enviar">
					    </div>
					</div>

  	      		</form>
  	      		<?php
  	      			if (isset($_GET['result'])){
  	      				echo "Hola el resultado es:....".$_GET['result'];
  	      			}
  	      		?>
  	      	</div>
		</div>
		
	</div>
</body>
</html>