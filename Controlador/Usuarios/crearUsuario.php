<?php

	echo "Crear Usuario <br>";
    $data = file_get_contents("../../configuracion.json");
    $variables = json_decode($data, true);
   
	$dbconn = pg_connect($variables['conexion_bd'])
    or die('No se ha podido conectar: ' . pg_last_error());
    if($dbconn){
        $idUsuario = $_POST['usuario'];
        $usuario = $_POST['txtUsuario'];
        $empleado = $_POST['selectEmpleado'];
        $contrasenia = $_POST['txtContrasenia'];
        
        $query = "INSERT INTO empleado_autenticacion(usuario, contrasenia) VALUES ( '".$usuario."', '".$contrasenia."');";
        
        
        $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
        if($result){
            //echo "Se pudo realizar la consulta";
            $sql = "SELECT id FROM empleado_autenticacion ORDER BY id DESC LIMIT 1";
            $result2 = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
            
             $row = pg_fetch_assoc($result2);
             echo "::::".$row['id'];

             $query2 = "UPDATE empleado SET  id_autenticacion=".$row['id']."  WHERE id=".$empleado.";";
            $result3 = pg_query($query2) or die('La consulta fallo: ' . pg_last_error());
            header("Location: ../../index.php?nav=usuCrear&usuario=".$idUsuario."&result=true");
            
        }else{
            header("Location: ../../index.php?nav=usuCrear&usuario=".$idUsuario."&result=false");
            
        }


    }else{
    	header("Location: ../../index.php?nav=usuCrear&usuario=".$idUsuario."&result=false");
    }

    // Liberando el conjunto de resultados
	pg_free_result($result);

	// Cerrando la conexión
	pg_close($dbconn);
?>