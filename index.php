<html>
<head>
	<!--Estilos-->
	<link href="Utilidades/Bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="Utilidades/estilos.css" rel="stylesheet">
	<!--Acciones-->

	<script src="Utilidades/jquery.min.js"></script>
	<script type="text/javascript" async="" src="Utilidades/acciones.js"></script>


	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Intranet Colfondos</title>
</head>
<body>
	<div class="row">
		<div class="col-sm-2">
			<img src="Utilidades/Imagenes/Colfondos_logo.png" alt="Logo de la universidad distrital" class="img_logo" onclick="navegacionPagina('index','')">
		</div>
    <div class="col-sm-1">
    </div>
		<div class="col-sm-8">
			<img src="Utilidades/Imagenes/mi-futor-mi-pension-home.jpg" width="100%" height="130px"></img>
		</div>
	</div>
	<div class="row">
		<?php
			if (isset($_GET['usuario'])){ ?>
					<div class="alert alert-success col-sm-12 " role="alert" >
					  <STRONG>Bienvenido!</STRONG>
					</div>
		<?php }?>
		<div class="col-sm-3">
			<!-- Contenedor -->

			<?php
				if (isset($_GET['usuario'])){ ?>
					
					<ul id="accordion" class="accordion">
						<li class="">
							<div class="link"><i class="fa fa-tachometer"></i>Menu Principal<i class="fa fa-chevron-down"></i></div>
							<ul class="submenu">

								<li><a href="#" onclick="navegacionPagina('Modulos','emails')">Envio de correos SMTP</a></li>
								<li><a href="#" onclick="navegacionPagina('Modulos','archivos')">Archivos FTP</a></li>
								<li><a href="#" onclick="navegacionPagina('Modulos','baseDatos')">Prueba Base datos</a></li>

							</ul>
						</li>
					</ul>
			<?php }else{ ?>

				<button type="Button" class="btn btn-info" onclick="autenticarUsuario()">Autenticarse</button>
			<?php	}
			?>
			
		</div>
		<div class="col-sm-9">
			<?php
			if(isset($_GET['nav'])){
				$navegacion = $_GET['nav'];
				//echo "la navegacion es .:::: ".$navegacion;
				if($navegacion == "principal"){
					include_once "portada.html";
				}
				if($navegacion =="autenticacion"){
					include_once "Modulos/autenticacion.php";
				}
			} else{

				include_once "portada.html";
			}
			?>

			<!--<iframe src="portada.html"  marginwidth="0" marginheight="0" name="ventana_iframe" scrolling="yes" border="0" frameborder="0" width="100%" height="100%" id="contenedorPrincipal1" style="box-shadow: #bce8f1 2px 2px 2px 2px ">

			</iframe> -->

		</div>
	</div>

</body>
</html>
