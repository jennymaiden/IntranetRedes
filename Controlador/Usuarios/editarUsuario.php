<?php

	$data = file_get_contents("../../configuracion.json");
	$variables = json_decode($data, true);

	$dbconn = pg_connect($variables['conexion_bd']) or die('No se ha podido conectar: ' . pg_last_error());
	if($dbconn){

		$idUsuario = $_POST['usuario'];
		$idUsu = $_POST['idUsuario'];
        $usuario = $_POST['txtUsuario'];
        $idEmpleado = $_POST['selectEmpleado'];
        $contrasenia = $_POST['txtContrasenia'];
       
        $query = "UPDATE empleado_autenticacion SET usuario='".$usuario."', contrasenia='".$contrasenia."'  WHERE id=".$idUsu.";";
        $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
        if($result){
            //echo "Se pudo realizar la consulta";
            $query2 = "UPDATE empleado SET  id_autenticacion=".$idUsu."  WHERE id=".$idEmpleado.";";
            $result3 = pg_query($query2) or die('La consulta fallo: ' . pg_last_error());
            header("Location: ../../index.php?nav=usuEditar&usuario=".$idUsuario."&result=true");
            
            
        }else{
            header("Location: ../../index.php?nav=usuEditar&usuario=".$idUsuario."&result=false");
            
        }

	}else{
    	header("Location: ../../index.php?nav=usuEditar&usuario=".$idUsuario."&result=false");
    }

    // Liberando el conjunto de resultados
	pg_free_result($result);

	// Cerrando la conexión
	pg_close($dbconn);
	
?>