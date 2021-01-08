<?php

include('../ConexionBD/Conexion_BD.php');

    session_start();


    if(isset ($_SESSION['UsuarioActivo']['id_user'])){

        
        $id_user = $_SESSION['UsuarioActivo']['id_user'];
        $FechaLogout = $_POST['FechaLogout'];
        $res = 0;
        //echo'Usuario ', $id_user;
        //echo '  ',$FechaLogout;


        
        /*
        $insert = $conexion -> prepare("INSERT INTO bitacora_logout (fecha_logout,id_user) VALUES (?,?)");

        $insert -> bindParam(1,$FechaLogout);
        $insert  -> bindParam(2,$id_user);

        $status = $insert-> execute();

        if(!$status){


            $json[]= array(
                'status'=> 0
            );


            $jsonstring = json_encode($json);
            echo $jsonstring;


        }else{*/
       
            unset($_SESSION['UsuarioActivo']);
            session_destroy();

            $json[]= array(
                'status'=> 1
            );

            
            $jsonstring = json_encode($json);
            echo $jsonstring;

          
            
            
       // }


    }else{

    }




  

   

?>