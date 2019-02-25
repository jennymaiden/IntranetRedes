<?php

	echo "Crear cliente <br>";
    $data = file_get_contents("../../configuracion.json");
    $variables = json_decode($data, true);
   
	$dbconn = pg_connect($variables['conexion_bd'])
    or die('No se ha podido conectar: ' . pg_last_error());
    if($dbconn){
        $idUsuario = $_POST['usuario'];
        $nombre = $_POST['txtNombre'];
        $costo = $_POST['txtCosto'];
        $vigencia = $_POST['txtVigencia'];

        $query = "INSERT INTO servicio(nombre, vigencia, costo) VALUES ( '".$nombre."', '".$costo."', '".$vigencia."');";
        $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
        if($result){
            //echo "Se pudo realizar la consulta";
            
            if(pg_affected_rows($result) == 1){
                $row = pg_fetch_assoc($result);

                //echo "<br>la respuesta es:...".$row['id'];
                header("Location: ../../index.php?nav=prodCrear&usuario=".$idUsuario."&result=true");
                
            }else{
                header("Location: ../../index.php?nav=prodCrear&usuario=".$idUsuario."&result=false");
            }
            
        }else{
            header("Location: ../../index.php?nav=prodCrear&usuario=".$idUsuario."&result=false");
            
        }


    }else{
    	header("Location: ../../index.php?nav=prodCrear&usuario=".$idUsuario."&result=false");
    }

    // Liberando el conjunto de resultados
	pg_free_result($result);

	// Cerrando la conexión
	pg_close($dbconn);
?>