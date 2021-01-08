<?php



try {
    $dsn = 'mysql:host=localhost;port=3306;dbname=controlcorrespondecia';
    $username = 'admin';
    $password = 'pBoQiG1e5dZ6ddPX';

    $conexion = new PDO($dsn, $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}


?>