<?php
    include ('../ConexionBD/Conexion_BD.php');
   
  
   
    $status = 0; 

    if(($_POST['correo']=="") && ($_POST['contraseña']=="")){
        $json[]= array(
            'status' => 1,
            
           


        );

        $jsonstring = json_encode($json);
        echo $jsonstring;
        
    }else{


        if(isset( $_POST['correo'])&& isset( $_POST['contraseña'])){
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];


                    
            $consulta = $conexion ->prepare ("SELECT id_user,user_rol_id,user_nombre,user_correo FROM users WHERE user_correo = '$correo' AND user_contraseña = '$contraseña'");
            $consulta->execute();

            

            $row = $consulta ->fetch(PDO::FETCH_ASSOC);

            

            if($row){

                session_start();

                $_SESSION['UsuarioActivo']['id_user'] = $row['id_user'];
                $_SESSION['UsuarioActivo']['nombre_user'] = $row['user_nombre'];
                $_SESSION['UsuarioActivo']['correo_user'] = $row['user_correo'];
                $_SESSION['UsuarioActivo']['id_rol'] = $row['user_rol_id'];
                
               // $_SESSION['UsuarioActivo']['time'] = $fecha;

                $json[]= array(
                    'status'=> 2,
                    'id_user' => $row['id_user'],
                    'nombre_user'=> $row['user_nombre'],
                    'corre_user' => $row['user_correo'],
                    'rol_id' =>$_SESSION['UsuarioActivo']['id_rol']
                   
                );

               

                $jsonstring = json_encode($json);
                echo $jsonstring;
            }else{

                $json[]= array(
                    'status'=> 3,
                    
                   


                );

                $jsonstring = json_encode($json);
                echo $jsonstring;
            }

            



           

           


           
           
          
        }
}




?>