<?php

include ('../ConexionBD/Conexion_BD.php');

$estatus = '';
$id_turno = '';

if(isset($_POST['estatusTurno']) && isset($_POST['id_turno'])){

        $estatus = $_POST['estatusTurno'];
        $id_turno = $_POST['id_turno'];

}else{
    echo 'No existe Post';
}



$updateEstatus = "UPDATE turno SET turno_estatus = '$estatus' WHERE turno_id='$id_turno'";

$resultado = $conexion->prepare($updateEstatus);

$resultado->execute();

if(!$resultado){
    echo 'Error al Actualizar Estatus';
}else{

    
    echo 'Estatus Actualizado!';
}




?>