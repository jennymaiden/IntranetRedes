<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href=".../Utilidades/Bootstrap/bootstrap.min.css" rel="stylesheet">
	<title>Envio de correos</title>

</head>
<body>
	<div class="panel-group">
		<div class="panel panel-info">
			<div class="panel-heading" align="center"><h2>Servicio de envio de correos</h2></div>
  	      	<div class="panel-body">
  	      		<?php
  	      			if (!isset($_GET['result'])){ ?>
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
  	      			}else{
  	      				echo "Hola el resultado es:....".$_GET['result'];
  	      			}
  	      		?>
  	      		

  	      	</div>
		</div>
		
	</div>
</body>
</html>