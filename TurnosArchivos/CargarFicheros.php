<?php

// Cómo subir el archivo
$status = 0;

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_FILES['turnoFile']['type'])){
    $directorio = "TurnosRecepción/";
    $archivo = $directorio . basename($_FILES["turnoFile"]["name"]);
    $typeFile = pathinfo($archivo,PATHINFO_EXTENSION);

    if($typeFile != 'pdf' && $typeFile != 'rar'){
        //El archivo que intenta subir no es un archivo PDF
        $status = 5;
        echo $status;
    }else if(file_exists($archivo)){
        //El archivo que intenta subir ya existe
        $status = 4;
        echo $status;
    }else{

        if(move_uploaded_file($_FILES["turnoFile"]["tmp_name"], $archivo)){
            $status = 2;
            echo $status;
        }else{
            $status = 3;
            echo $status;
        }


    }

           


}else{
    $status = 1;
    echo $status;
}


?>