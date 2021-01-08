<?php   
     include ('../ConexionBD/Conexion_BD.php');

    $area = $_POST['area'];

    if(!empty($area)){

        $area= $conexion -> prepare("SELECT área_responsable FROM área WHERE área_id = '$area'");
        $area->execute();

        $json = array();

        while($row = $area ->fetch(PDO::FETCH_ASSOC) ){
            $json[] = array(
                'responsableArea' => $row['área_responsable'],
            );
        };
        $jsonstring = json_encode($json);
        echo $jsonstring;
     


    }

     
?>