<?php
        include('../ConexionBD/Conexion_BD.php');

        if(isset($_POST['no_turno']) && isset($_POST['fechaRecibido']) && isset($_POST['no_oficio'])&& isset($_POST['fechaOficio'])
        && isset($_POST['remitente'])&& isset($_POST['asunto'])&& isset($_POST['area'])&& isset($_POST['responsable_area'])&& isset($_POST['fecha_segui'])
        && isset($_POST['SNContes'])){
            
            $no_turno = $_POST['no_turno'];
            $fechaRecibido = ($_POST['fechaRecibido']);
            $no_oficio =  strtoupper($_POST['no_oficio']);
            $fechaOficio = ($_POST['fechaOficio']);
            $remitente =  strtoupper($_POST['remitente']);
            $asunto =  strtoupper($_POST['asunto']);
            $areaId = $_POST['area'];
            $responsable_area =  strtoupper($_POST['responsable_area']);
            $fecha_segui = $_POST['fecha_segui'];
            $estatus = 'EN PROCESO';
            $SNContes = $_POST['SNContes'];
            

            $area= $conexion -> prepare("SELECT área_nombre FROM área WHERE área_id = '$areaId'");
            $area->execute();

            $json = array();

            while($row = $area -> fetch(PDO::FETCH_ASSOC) ){
               $areaNombre = $row['área_nombre']; 
            };

            $status = 0;
            
                if($_POST['no_turno'] == "" || $_POST['fechaRecibido'] == "" || $_POST['no_oficio'] == ""||$_POST['fechaOficio']==""||$_POST['remitente']==""
                ||$_POST['asunto']==""||$_POST['area']==""||$_POST['responsable_area']==""||$_POST['fecha_segui']==""||$_POST['SNContes']==""){
                    
                    $status = 1;
                   
                    echo $status;


                }else{

                    $verificar_numero = $conexion -> query("SELECT * FROM turno WHERE turno_no_turno = '$no_turno' or turno_no_oficio = '$no_oficio'");
                    $row = $verificar_numero->fetch(PDO::FETCH_NUM);

                    if($row == true){
                        
                        $status = 2;
                   
                        echo $status;
                        
                    }else{

                        $insert = $conexion -> prepare("INSERT INTO turno (turno_no_turno,turno_fecha_recibido,turno_no_oficio,turno_fecha_oficio,
                        turno_remitente,turno_asunto,turno_area,turno_responsable,turno_fecha1_segui,turno_estatus,turno_SNContes) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

                        $insert -> bindParam(1,$no_turno);
                        $insert  -> bindParam(2,$fechaRecibido);
                        $insert  -> bindParam(3,$no_oficio );
                        $insert  -> bindParam(4,$fechaOficio);
                        $insert  -> bindParam(5,$remitente);
                        $insert  -> bindParam(6,$asunto);
                        $insert  -> bindParam(7,$areaNombre);
                        $insert  -> bindParam(8,$responsable_area);
                        $insert  -> bindParam(9,$fecha_segui);
                        $insert  -> bindParam(10,$estatus);
                        $insert  -> bindParam(11,$SNContes);

                        $status = $insert-> execute();

                        if(!$status){

                            $status = 3;
                   
                             echo $status;
                            
            
                        }else{
                            $status = 4;
                   
                             echo $status;
                            
                        }
                        


                    }


               
            }
            

        }else{
            echo 'no existe post';
        }
?>