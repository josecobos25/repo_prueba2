<?php

include ('../ConexionBD/Conexion_BD.php');

$fecha1 = '';
$fecha2 = '';
$insertFecha = '';
$verificar_fecha = '';


if(isset($_POST['fecha1']) && isset($_POST['fecha2'])){

    $fecha1 = $_POST['fecha1'];
    $fecha2 = $_POST['fecha2'];

    $verificar_fecha = $conexion -> query("SELECT * FROM reportes WHERE reporte_fecha1 = '$fecha1' && reporte_fecha2 = '$fecha2'");
    $row = $verificar_fecha->fetch(PDO::FETCH_NUM);

    if($row == true){

        //echo 'Periodo de fecha que se desea insertar ya existe';
                        
        
                        
    }else{

        $insertFecha = $conexion -> prepare("INSERT INTO reportes (reporte_fecha1,reporte_fecha2) VALUES (?,?)");
        $insertFecha -> bindParam(1,$fecha1);
        $insertFecha -> bindParam(2,$fecha2);
        $status = $insertFecha-> execute();
        


    }
   
    

}else{

    echo 'No existe post';
}

?>