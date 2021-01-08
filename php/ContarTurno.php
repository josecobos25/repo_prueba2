<?php

include ('../ConexionBD/Conexion_BD.php');


$contarPendientes = $conexion -> prepare("SELECT turno_estatus FROM turno WHERE turno_estatus = 'PENDIENTE'");
$contarPendientes->execute();

$noPendientes = $contarPendientes -> rowCount();

$contarCompletados = $conexion -> prepare("SELECT turno_estatus FROM turno WHERE turno_estatus = 'COMPLETADO'");
$contarCompletados->execute();

$noCompletados = $contarCompletados -> rowCount();


$contarEnProceso = $conexion -> prepare("SELECT turno_estatus FROM turno WHERE turno_estatus = 'EN PROCESO'");
$contarEnProceso ->execute();

$noEnProceso = $contarEnProceso -> rowCount();

$json = array();

    $json[] = array(
        'no_Pendientes' => $noPendientes,
        'no_Completados' => $noCompletados,
        'no_EnProceso' => $noEnProceso
       
    );

$jsonstring = json_encode($json);
echo $jsonstring;


?>