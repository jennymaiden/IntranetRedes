<html>
<head>
	<!--Estilos-->
	<link href="Utilidades/Bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="Utilidades/estilos.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
		<div class="col-sm-3">
			<!-- Contenedor -->

			<ul id="accordion" class="accordion">
				<li class="">
					<div class="link"><i class="fa fa-tachometer"></i>Menu Principal<i class="fa fa-chevron-down"></i></div>
					<ul class="submenu">
						<li><a href="#" onclick="navegacionPagina('Modulos','emails')">Envio de correos SMTP</a></li>
						<li><a href="#" onclick="navegacionPagina('Modulos','archivos')">Archivos FTP</a></li>

					</ul>
				</li>


			</ul>
		</div>
		<div class="col-sm-9">

			<iframe src="portada.html"  marginwidth="0" marginheight="0" name="ventana_iframe" scrolling="yes" border="0" frameborder="0" width="100%" height="100%" id="contenedorPrincipal1" style="box-shadow: #bce8f1 2px 2px 2px 2px ">

			</iframe>

		</div>
	</div>

</body>
</html>
