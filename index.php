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
			<img src="Utilidades/Imagenes/Colfondos_logo.png" alt="Logo de la universidad distrital" class="img_logo"  href="index.php">
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
					<div class="alert alert-success col-sm-12 " style="margin-left: 30px"role="alert" >
					  <STRONG>Bienvenido!</STRONG>
					</div>
		<?php }?>
		<div class="col-sm-3">
			<!-- Contenedor -->
			<?php
				if (isset($_GET['usuario'])){ 
					$usuario =$_GET['usuario'];
					?>
					
					<ul id="accordion" class="accordion">
						<!--<li class="">
							<div class="link"><i class="fa fa-tachometer"></i>Menu Principal<i class="fa fa-chevron-down"></i></div>
							<ul class="submenu">

								<li><a href="#" onclick="navegacionPagina('Modulos','emails')">Envio de correos SMTP</a></li>
								<li><a href="#" onclick="navegacionPagina('Modulos','archivos')">Archivos FTP</a></li>
								<li><a href="#" onclick="navegacionPagina('Modulos','baseDatos')">Prueba Base datos</a></li>

							</ul>
						</li>-->
						<!-- Clientes -->
						<li class="">
							<div class="link"><i class="fa fa-tachometer"></i>Clientes<i class="fa fa-chevron-down"></i></div>
							<ul class="submenu">

								<li><a href=<?php echo "index.php?nav=clienConsulta&usuario=".$usuario; ?> >Consultar</a></li>
								<li><a href=<?php echo "index.php?nav=clienCrear&usuario=".$usuario; ?>>Crear</a></li>
								<li><a href=<?php echo "index.php?nav=clienEditar&usuario=".$usuario; ?>>Editar</a></li>

							</ul>
						</li>
						<!-- Poductos -->
						<li class="">
							<div class="link"><i class="fa fa-tachometer"></i>Productos y Servicios<i class="fa fa-chevron-down"></i></div>
							<ul class="submenu">

								<li><a href=<?php echo "index.php?nav=prodConsultar&usuario=".$usuario; ?>>Consultar</a></li>
								<li><a href=<?php echo "index.php?nav=prodCrear&usuario=".$usuario; ?>>Crear</a></li>
								<li><a href=<?php echo "index.php?nav=prodEditar&usuario=".$usuario; ?>>Editar</a></li>

							</ul>
						</li>
						<!-- Empleados -->
						<li class="">
							<div class="link"><i class="fa fa-tachometer"></i>Empleados<i class="fa fa-chevron-down"></i></div>
							<ul class="submenu">

								<li><a href=<?php echo "index.php?nav=emplConsultar&usuario=".$usuario; ?>>Consultar</a></li>
								<li><a href=<?php echo "index.php?nav=emplCrear&usuario=".$usuario; ?>>Crear</a></li>
								<li><a href=<?php echo "index.php?nav=emplEditar&usuario=".$usuario; ?>>Editar</a></li>

							</ul>
						</li>
						<!-- Usuarios -->
						<li class="">
							<div class="link"><i class="fa fa-tachometer"></i>Usuarios<i class="fa fa-chevron-down"></i></div>
							<ul class="submenu">

								<li><a href=<?php echo "index.php?nav=usuConsultar&usuario=".$usuario; ?>>Consultar</a></li>
								<li><a href=<?php echo "index.php?nav=usuCrear&usuario=".$usuario; ?>>Crear</a></li>
								<li><a href=<?php echo "index.php?nav=usuEditar&usuario=".$usuario; ?>>Editar</a></li>

							</ul>
						</li>
						<!-- Servicios de intranet-->
						<li class="">
							<div class="link"><i class="fa fa-tachometer"></i>Servicios Complementarios<i class="fa fa-chevron-down"></i></div>
							<ul class="submenu">

								<li><a href=<?php echo "index.php?nav=enviarCorreo&usuario=".$usuario; ?>>Enviar correo</a></li>
								<li><a href=<?php echo "index.php?nav=leerArchivo&usuario=".$usuario; ?>>Lectura de archivos</a></li>
								<li><a href=<?php echo "index.php?nav=cargarArchivo&usuario=".$usuario; ?>>Cargar archivos</a></li>

							</ul>
						</li>
					</ul>
			<?php }else{ ?>
				<a class="btn btn-info" href=<?php echo "index.php?nav=autenticacion"; ?> >Autenticarse</a>
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
				if($navegacion == "clienConsulta"){
					include_once 'Modulos/Clientes/viewConsulta.php';
				}
				if ($navegacion =="clienCrear") {
					include_once 'Modulos/Clientes/viewCrear.php';
				}
				if ($navegacion =="clienEditar") {
					include_once 'Modulos/Clientes/viewEditar.php';
				}
				if ($navegacion =="prodConsultar") {
					include_once 'Modulos/Productos/viewConsulta.php';
				}
				if ($navegacion =="prodCrear") {
					include_once 'Modulos/Productos/viewCrear.php';
				}
				if ($navegacion =="prodEditar") {
					include_once 'Modulos/Productos/viewEditar.php';
				}
				if ($navegacion =="emplConsultar") {
					include_once 'Modulos/Empleados/viewConsultar.php';
				}
				if ($navegacion =="emplCrear") {
					include_once 'Modulos/Empleados/viewCrear.php';
				}
				if ($navegacion=="emplEditar") {
					include_once 'Modulos/Empleados/viewEditar.php';
				}
				if ($navegacion =="usuConsultar") {
					include_once 'Modulos/Usuarios/viewConsultar.php';
				}
				if ($navegacion =="usuCrear") {
					include_once 'Modulos/Usuarios/viewCrear.php';
				}
				if ($navegacion =="usuEditar") {
					include_once 'Modulos/Usuarios/viewEditar.php';
				}
				if ($navegacion == "enviarCorreo") {
					include_once 'Modulos/Servicios/viewEnviarCorreo.php';
				}
				if ($navegacion =="leerArchivo") {
					include_once 'Modulos/Servicios/viewLecturaArchivos.php';
				}
				if ($navegacion =="cargarArchivo") {
					include_once 'Modulos/Servicios/viewCargarArchivo.php';
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
