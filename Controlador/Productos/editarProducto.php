<?php

	$data = file_get_contents("../../configuracion.json");
	$variables = json_decode($data, true);

	$dbconn = pg_connect($variables['conexion_bd']) or die('No se ha podido conectar: ' . pg_last_error());
	if($dbconn){

		$idUsuario = $_POST['usuario'];
		$idServicio = $_POST['idServicio'];
        $nombre = $_POST['txtNombre'];
        $costo = $_POST['txtCosto'];
        $vigencia = $_POST['txtVigencia'];

        $query = "UPDATE servicio SET nombre='".$nombre."', vigencia='".$vigencia."', costo='".$costo."'  WHERE id=".$idServicio.";";
        $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
        if($result){
            //echo "Se pudo realizar la consulta";
            
            if(pg_affected_rows($result) == 1){
                $row = pg_fetch_assoc($result);

                //echo "<br>la respuesta es:...".$row['id'];
                header("Location: ../../index.php?nav=prodEditar&usuario=".$idUsuario."&result=true");
                
            }else{
                header("Location: ../../index.php?nav=prodEditar&usuario=".$idUsuario."&result=false");
            }
            
        }else{
            header("Location: ../../index.php?nav=prodEditar&usuario=".$idUsuario."&result=false");
            
        }

	}else{
    	header("Location: ../../index.php?nav=prodEditar&usuario=".$idUsuario."&result=false");
    }

    // Liberando el conjunto de resultados
	pg_free_result($result);

	// Cerrando la conexión
	pg_close($dbconn);
	
?>