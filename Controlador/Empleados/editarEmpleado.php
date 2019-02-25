<?php

	$data = file_get_contents("../../configuracion.json");
	$variables = json_decode($data, true);

	$dbconn = pg_connect($variables['conexion_bd']) or die('No se ha podido conectar: ' . pg_last_error());
	if($dbconn){

		$idUsuario = $_POST['usuario'];
		$idEmpleado = $_POST['idEmpleado'];
        $nombre = $_POST['txtNombre'];
        $direccion = $_POST['txtDireccion'];
        $correo = $_POST['txtCorreo'];
        $apellido = $_POST['txtApellido'];
        $telefono = $_POST['txtTelefono'];
        $area = $_POST['selectArea'];

        $query = "UPDATE empleado SET nombre='".$nombre."', apellido='".$apellido."', direccion='".$direccion."', telefono='".$telefono."', correo='".$correo."', id_area=".$area."  WHERE id=".$idEmpleado.";";
        $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
        if($result){
            //echo "Se pudo realizar la consulta";
            
            if(pg_affected_rows($result) == 1){
                $row = pg_fetch_assoc($result);

                //echo "<br>la respuesta es:...".$row['id'];
                header("Location: ../../index.php?nav=emplEditar&usuario=".$idUsuario."&result=true");
                
            }else{
                header("Location: ../../index.php?nav=emplEditar&usuario=".$idUsuario."&result=false");
            }
            
        }else{
            header("Location: ../../index.php?nav=emplEditar&usuario=".$idUsuario."&result=false");
            
        }

	}else{
    	header("Location: ../../index.php?nav=emplEditar&usuario=".$idUsuario."&result=false");
    }

    // Liberando el conjunto de resultados
	pg_free_result($result);

	// Cerrando la conexión
	pg_close($dbconn);
	
?>