<?php
    include("vendor/autoload.php");
    include('../ConexionBD/Conexion_BD.php'); 
    $idReporte = $_POST['idR'];
    $selectReporte = '';
    $selectTurno = '';
    $fecha1 = '';
    $fecha2 = '';
    $plantilla = '';
    $footer = '';
    $css = file_get_contents('../css/stilosPDF.css');

    $selectReporte = $conexion -> prepare("SELECT reporte_fecha1 as fecha1, reporte_fecha2 as fecha2 FROM reportes WHERE id_reporte = '$idReporte'");
    $selectReporte->execute();

    $resultado = $selectReporte->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultado as $dato){
                $fecha1 = $dato['fecha1'];
                $fecha2 = $dato['fecha2'];
            }

    $selectTurno = $conexion -> prepare("SELECT turno_no_turno,turno_no_oficio,turno_asunto,turno_remitente,turno_area,turno_responsable,turno_fecha_recibido FROM turno WHERE turno_fecha_recibido  BETWEEN '$fecha1' AND '$fecha2'");
    $selectTurno->execute();
    $resultado2 = $selectTurno->fetchAll(PDO::FETCH_ASSOC);


    $plantilla = '
<body>

<header>
<div class="row">
    <div class="col-md-3" >
        <img class="img1" src="../Imagenes/LogoUnidad.png" >
    </div>
    <div class="col-md-3" style="postion: right:">
    <img class="img2" src="../Imagenes/LogoCoordinador.jpg" >
</div>
    <div class="col-md-6 text-center "  >
        <h5 class="titulo">UNIDAD DE PLANEACIÓN Y PROSPECTIVA COORDINACIÓN GENERAL DE NORMATIVIDAD</h5>
        <h5 class="titulo2">REPORTE SEMANAL DE CORRESPONDENCIA RECIBIDA</h5>
        <h5 class="titulo3">Semana : '; $plantilla.=''.$fecha1.'/'.$fecha2.''; $plantilla.='</h5>

    </div>
   
</div>
</header>
<div class="tabla">
<table class="tabla">
          <thead>
            <tr>
                <th >No. Turno</th>
                <th >No. Oficio</th>
                <th >Asunto</th>
                <th >Remitente</th>
                <th >Área de Turno</th>
                <th >Responsable</th>
                <th >Fecha de Turno</th>
            </tr>
          </thead>
          <tbody>';
          foreach($resultado2 as $dato){
          $plantilla .='
            <tr>
                <td>'.$dato["turno_no_turno"].'</th>
                <td>'.$dato["turno_no_oficio"].'</th>
                <td >'.$dato["turno_asunto"].'</th>
                <td >'.$dato["turno_remitente"].'</th>
                <td >'.$dato["turno_area"].'</th>
                <td >'.$dato["turno_responsable"].'</th>
                <td >'.$dato["turno_fecha_recibido"].'</th>
            </tr>';
        }
            $plantilla .= '
            
          </tbody>
        </table> 
</div>





</body>
    
    ';


   
 
    $mpdf = new \Mpdf\Mpdf(['format' => 'Legal','setAutoBottomMargin' => 'pad']);
    
    $mpdf -> SetFooter($footer);
    $mpdf->setFooter('{PAGENO}');

    
    $mpdf ->AddPage('L');




    $mpdf -> writeHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf -> writeHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);


    
    $mpdf -> Output();

?>