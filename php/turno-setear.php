<?php

include ('../ConexionBD/Conexion_BD.php');

if(isset($_POST['id'])){
    $idTruno = $_POST['id'];
    //echo $_POST['id'];

        $listar = $conexion -> prepare("SELECT * FROM turno WHERE turno_id = '$idTruno'");
        $listar->execute();

        $json = array();

        while($row = $listar ->fetch(PDO::FETCH_ASSOC) ){
            $json[] = array(
                'turno_id' => $row['turno_id'],
                'no_turno' => $row['turno_no_turno'],
                'fecha_recibido' => $row['turno_fecha_recibido'],
                'no_oficio' => $row['turno_no_oficio'],
                'fecha_recibido' => $row['turno_fecha_oficio'],
                'remitente' => $row['turno_remitente'],         
                'asunto'=> $row['turno_asunto'],
                'area' => $row['turno_area'],
                'responsable' => $row['turno_responsable'],
                'fecha1_segui' => $row['turno_fecha1_segui'],
                'acuse_reci' => $row['turno_fecha_acuse_reci'],
                'porcentaje' => $row['turno_porcentaje'],
                'no_oficio_contes' => $row['turno_no_oficio_contes'],
                'fecha_oficio_contes' => $row['turno_fecha_oficio_contes'],
                'destinatario' => $row['turno_destinatario'],
                'contestacion' => $row['turno_contestacion'],
                'observaciones' => $row['turno_observaciones'],
                'estatus' => $row['turno_estatus'],
                'SNContes' => $row['turno_SNContes']
       
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
        

    
}else{
   

}



?>