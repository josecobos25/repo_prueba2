<?php

include ('../ConexionBD/Conexion_BD.php');

$tipo='';
$periodo='';
$año='';
$mes='';
$listar='';
$tabla ='';
$insert ='';
$año1 = '';
$Dlast_id = '';





if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo']; 
    //echo $tipo.' ';   
} 
if(isset($_POST['periodo'])){
    $periodo = $_POST['periodo'];
    //echo $periodo.' ';
}
if(isset($_POST['año'])){
    $año1 = $_POST['año'];
    //echo ' Año PHP '.$año.' ';
}

if(isset($_POST['añomes'])){
    $AñoMes = $_POST['añomes'];
    $año = substr($AñoMes,0,4);
    $mes = substr($AñoMes,5,6);
    //echo 'Año'.$año.'Mes'.$mes;
}


switch ($tipo) {
    case 'altas':
        $tabla ='equiposdecomputo';

        if($periodo == 'Anual'){

            $listar = $conexion -> prepare("SELECT id_Equipo,Numero_Equipo, CONCAT(Tipo_Equipo,' ',Marca_Equipo,' ',Modelo_Equipo) as descripcion, responsable_equipo,fecha_ingreso_equipo FROM equiposdecomputo WHERE YEAR(fecha_ingreso_equipo) = $año1");
            //$listar ->bindParam(1,$año1,PDO::PARAM_INT);
            $listar->execute();



            $insert = $conexion -> prepare("INSERT INTO datos_reporte (D_tipo,D_periodo,D_año,D_tabla) VALUES (?,?,?,?)");

                        $insert -> bindParam(1,$tipo);
                        $insert  -> bindParam(2,$periodo);
                        $insert  -> bindParam(3,$año1);
                        $insert  -> bindParam(4,$tabla);
                        
                   
                        $insert-> execute();
                        $Dlast_id= $conexion -> lastInsertId();

        }else if($periodo == 'Mensual'){
          
            $listar = $conexion -> prepare("SELECT id_Equipo,Numero_Equipo, CONCAT(Tipo_Equipo,' ',Marca_Equipo,' ',Modelo_Equipo) as descripcion, responsable_equipo,fecha_ingreso_equipo FROM equiposdecomputo WHERE YEAR(fecha_ingreso_equipo) = $año && MONTH(fecha_ingreso_equipo) = $mes");
            $listar->execute();

            $insert = $conexion -> prepare("INSERT INTO datos_reporte (D_tipo,D_periodo,D_año,D_mes,D_tabla) VALUES (?,?,?,?,?)");

            $insert -> bindParam(1,$tipo);
            $insert  -> bindParam(2,$periodo);
            $insert  -> bindParam(3,$año);
            $insert  -> bindParam(4,$mes);
            $insert  -> bindParam(5,$tabla);
            
       
            $insert-> execute();
            $Dlast_id= $conexion -> lastInsertId();

        }

        $json = array();
        while($row = $listar ->fetch(PDO::FETCH_ASSOC) ){
            $json[] = array(
                'id_Equipo' => $row['id_Equipo'],
                'Numero_Equipo'=> $row['Numero_Equipo'],
                'descripcion' => $row['descripcion'],
                'responsable_equipo' => $row['responsable_equipo'],
                'fecha_ingreso' => $row['fecha_ingreso_equipo']
            );
        }
       
        break;
   
    case 'bajas':
        $tabla ='bajas_equipo';
        if($periodo == 'Anual'){

            $listar = $conexion -> prepare("SELECT idEquipo_baja,no_inventario, descripcion_equipo, responsable_equipo,fechaEquipo_baja FROM bajas_equipo WHERE YEAR(fechaEquipo_baja) = $año1");
            //$listar ->bindParam(1,$año1,PDO::PARAM_INT);
            $listar->execute();

            $insert = $conexion -> prepare("INSERT INTO datos_reporte (D_tipo,D_periodo,D_año,D_tabla) VALUES (?,?,?,?)");

                        $insert -> bindParam(1,$tipo);
                        $insert  -> bindParam(2,$periodo);
                        $insert  -> bindParam(3,$año1);
                        $insert  -> bindParam(4,$tabla);
                        
                   
                        $insert-> execute();


                        $Dlast_id= $conexion -> lastInsertId();

        }else if($periodo == 'Mensual'){
          
            $listar = $conexion -> prepare("SELECT idEquipo_baja,no_inventario, descripcion_equipo, responsable_equipo,fechaEquipo_baja FROM bajas_equipo WHERE YEAR(fechaEquipo_baja) = $año && MONTH(fechaEquipo_baja) = $mes");
            $listar->execute();

            $insert = $conexion -> prepare("INSERT INTO datos_reporte (D_tipo,D_periodo,D_año,D_mes,D_tabla) VALUES (?,?,?,?,?)");

            $insert -> bindParam(1,$tipo);
            $insert  -> bindParam(2,$periodo);
            $insert  -> bindParam(3,$año);
            $insert  -> bindParam(4,$mes);
            $insert  -> bindParam(5,$tabla);
            
       
            $insert-> execute();

           

            $Dlast_id= $conexion -> lastInsertId();

           
           

        }
      

        $json = array();
        while($row = $listar ->fetch(PDO::FETCH_ASSOC) ){
            $json[] = array(
                'id_Equipo' => $row['idEquipo_baja'],
                'Numero_Equipo'=> $row['no_inventario'],
                'descripcion' => $row['descripcion_equipo'],
                'responsable_equipo' => $row['responsable_equipo'],
                'fecha_ingreso' => $row['fechaEquipo_baja']
            );
        }
       
        break;
}



$jsonstring = json_encode($json);
echo $jsonstring;

?>