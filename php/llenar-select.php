<?php

include ('../ConexionBD/Conexion_BD.php');


$listar = $conexion -> prepare("SELECT id_reporte, CONCAT(reporte_fecha1,' - ',reporte_fecha2 ) as fecha_reporte FROM reportes");
$listar->execute();

$json = array();

while($row = $listar ->fetch(PDO::FETCH_ASSOC) ){
    $json[] = array(
        'id_reporte' => $row['id_reporte'],
        'fecha_reporte' => $row['fecha_reporte']
         
     
       
    );
}
$jsonstring = json_encode($json);
echo $jsonstring;


?>