<?php 	
//Obtener los datos del archivo json
$data = file_get_contents("../configuracion.json");
$variables = json_decode($data, true);
//print_r($variables);

	$conexion = ftp_connect($variables['ftp_server']);
	$login_respuesta =ftp_login($conexion, $variables['ftp_usuario'], $variables['ftp_pass']);

	if ( (!$conexion) || (!$login_respuesta)) {
		echo "No se pudo realizar la conexion";
		header("Location: ../index.php?nav=cargarArchivo&usuario=".$_POST['usuario']."&result=false");
		exit;
	}else {
		echo "Conexion Exitosa<br>";
		$nombre= $_FILES['documento']['name'];
		//echo "el nombre es:...".$nombre;
		$temp = explode(".", $_FILES['documento']['name']);
		$source_file=$_FILES['documento']['tmp_name'];
		$destino= $variables['ruta_archivos'];
		
		
		//Si el servidor se archivos se encutra en modo pasivo
		//ftp_pass($conexion,true);

		//Subir el archivo
		$subio = ftp_put($conexion, $destino.'/'.$nombre, $source_file, FTP_BINARY);

		if ($subio) {
			echo "Archivo cargado correctamente";
			header("Location: ../index.php?nav=cargarArchivo&usuario=".$_POST['usuario']."&result=true");
		}else{
			echo "Ocurrio algun error al cargar el archivo";
			header("Location: ../index.php?nav=cargarArchivo&usuario=".$_POST['usuario']."&result=false");
		}
	}

?>