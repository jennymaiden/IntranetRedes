<?php 	
$data = file_get_contents("../configuracion.json");
$variables = json_decode($data, true);
print_r($variables);
foreach ($variables as $product) {
    print_r($product);
}

echo "un parametro seria:::...".$variables['ftp_server'];
?>