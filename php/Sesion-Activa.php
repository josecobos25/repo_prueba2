<?php
            session_start();

            

            if(!isset($_SESSION['UsuarioActivo'])){
                header("location: ../Login.php");
                
                
            }else{
                if($_SESSION['UsuarioActivo']['id_rol'] != 1){
                    header("location: ../Login.php");
                }else{
                        $usuario = $_SESSION['UsuarioActivo']['nombre_user'];  
                        echo  $usuario;
                    }
                }
 ?> 