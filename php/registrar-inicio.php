<?php
        include('../ConexionBD/Conexion_BD.php');

        session_start();

        if(isset ($_SESSION['UsuarioActivo']['id_user'])){
            
            $Fecha = $_POST['FH'];
            $id_user = $_POST['id_user'];


            echo $Fecha;
            echo $id_user;

            $insert = $conexion -> prepare("INSERT INTO bitacora_log (fecha_login,id_user) VALUES (?,?)");

            $insert -> bindParam(1,$Fecha);
            $insert  -> bindParam(2,$id_user);
           

            $status = $insert-> execute();

            if(!$status){

                
                echo 'Error al Registrar Fecha';
           
       
                 

            }else{

                

                echo 'Registro de Fecha Exitoso';
                
                
            }

        }else{

        }
           
            
          
?>