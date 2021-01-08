<?php

include ('../ConexionBD/Conexion_BD.php');



$listar = $conexion -> prepare("SELECT turno_id,turno_no_turno,turno_no_oficio,turno_fecha_recibido,turno_responsable,turno_estatus FROM turno ");
$listar->execute();



$json = array();



while($row = $listar ->fetch(PDO::FETCH_ASSOC) ){
    $json[] = array(
        'turno_id' => $row['turno_id'],
        'no_turno' => $row['turno_no_turno'],
        'no_oficio' => $row['turno_no_oficio'],
        'fecha_recibido' => $row['turno_fecha_recibido'],
        'responsable' => $row['turno_responsable'],         
        'turno_estatus'=> $row['turno_estatus']
       
    );
}
$jsonstring = json_encode($json);
echo $jsonstring;


?>