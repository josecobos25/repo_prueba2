<?php

include ('../ConexionBD/Conexion_BD.php');

$estatusActual = 0;



if(isset($_POST['id_turno']) && isset($_POST['fechaAcuseReci']) && isset($_POST['fechaOficioReci'])&& isset($_POST['fechaOficioContes'])
    && isset($_POST['noOficioContes'])&& isset($_POST['destinatario'])&& isset($_POST['contestacion'])&& isset($_POST['observaciones'])){
    
    $id_turno = $_POST['id_turno'];
    $fechaAcuseReci = $_POST['fechaAcuseReci'];
    $fechaOficioReci = $_POST['fechaOficioReci'];
    $fechaOficioContes = $_POST['fechaOficioContes'];
    $noOficioContes =  strtoupper($_POST['noOficioContes']);
    $destinatario =  strtoupper($_POST['destinatario']);
    $contestacion =  strtoupper($_POST['contestacion']);
    $observaciones =  strtoupper($_POST['observaciones']);
    $sncontes = strtoupper($_POST['SNContes']);
    $estatus = 'COMPLETADO';
    $porcentaje = 100;

    //echo'existe post';
    
    
        if( $_POST['id_turno'] == ""){
            
            $estatusActual = 1;
           
            echo $estatusActual;


        }else{

            $updateEstatus = "UPDATE turno SET turno_fecha_acuse_reci = '$fechaAcuseReci', turno_no_oficio_contes = '$noOficioContes',
            turno_fecha_oficio_contes = '$fechaOficioContes', turno_destinatario = '$destinatario',turno_contestacion = '$contestacion',
            turno_observaciones = '$observaciones',turno_estatus = '$estatus',turno_porcentaje = '$porcentaje' ,turno_SNContes = '$sncontes' WHERE turno_id='$id_turno'";
       
            $resultado = $conexion->prepare($updateEstatus);

            $resultado->execute();

            if(!$resultado){
                $estatusActual = 3;
                echo $estatusActual;
            }else{
                $estatusActual = 4;
                echo $estatusActual;
            }
            


       
    }
    

}else{
    echo 'no existe post';
}




?>