<?php
require('fpdf/fpdf.php');
include('../ConexionBD/Conexion_BD.php'); 
$idReporte = $_POST['idR'];
$selectReporte = '';
$selectTurno = '';
$fecha1 = '';
$fecha2 = '';
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../Imagenes/LogoUnidad.png',10,10,70);
    $this->Image('../Imagenes/LogoCoordinador.jpg',230,5,55);
    // Arial bold 15
    $this->SetFont('Arial','B',25);
    // Movernos a la derecha
    $this->Cell(10);
    // Título
    // Salto de línea
}
// Pie de página
function Footer()
{
    $this->Image('../Imagenes/LogoPiePagina1.png',13,180,30);
    $this->Ln();
   
    $this->Image('../Imagenes/LogoPiePaginaDatos2.jpg',210,180,70);
    $this->Ln();
   
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
$selectReporte = $conexion -> prepare("SELECT reporte_fecha1 as fecha1, reporte_fecha2 as fecha2 FROM reportes WHERE id_reporte = '$idReporte'");
$selectReporte->execute();
$resultado = $selectReporte->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultado as $dato){
   $fecha1 = $dato['fecha1'];
   $fecha2 = $dato['fecha2'];
}
$selectTurno = $conexion -> prepare("SELECT turno_no_turno,turno_no_oficio,turno_asunto,turno_remitente,turno_area,turno_responsable,turno_fecha_recibido FROM turno WHERE turno_fecha_recibido  BETWEEN '2020-09-16' AND '2020-09-16'");
$selectTurno->execute();
$resultado2 = $selectTurno->fetchAll(PDO::FETCH_ASSOC);
$pdf = new PDF('L');
$pdf->AliasNbPages(); 
$pdf->AddPage();
$pdf->SetMargins(5, 50);
$pdf->SetAutoPageBreak(true,30); 
$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(270,60,utf8_decode("UNIDAD DE PLANEACIÓN Y PROSPECTIVA"),50,0,'C');
$pdf->Ln(5);
$pdf->Cell(270,60,utf8_decode("COORDINACIÓN GENERAL DE NORMATIVIDAD"),50,0,'C');
$pdf->Ln(5);
$pdf->Cell(270,60,utf8_decode("REPORTE SEMANAL DE CORRESPONDENCIA RECIBIDA"),50,0,'C');
$pdf->Ln(5);
$pdf->Cell(270,60,utf8_decode("SEMANA  $fecha1 - $fecha2"),50,0,'C');
$pdf->Ln(1);
$pdf->SetFont('Arial','B',8);
//$pdf->Cell(180,0,utf8_decode("Inventario de $tipoR"),50,0,'C');
$pdf->Ln(8);
//$pdf->Cell(180,0,utf8_decode("Reporte $periodoR $fecha"),0,0,'C');
$pdf->Ln(0);
$pdf->SetFont('Arial','B',9);
////$pdf->Cell(340,20,"Fecha: $FechaHora",0,0,'C');
//$pdf->Cell(0,20,utf8_decode($FechaHora),0,0,'C',0);
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(31,78,121);
$pdf->SetTextColor(240, 255, 240);
$pdf->Ln(30);
$pdf->Cell(15,10,utf8_decode('No. Turno'),1,0,'C',true);
$pdf->Cell(40,10,utf8_decode('No. Oficio'),1,0,'C',true);
$pdf->Cell(50,10,utf8_decode('Asunto'),1,0,'C',true);
$pdf->Cell(50,10,utf8_decode('Remitente'),1,0,'C',true);
$pdf->Cell(50,10,utf8_decode('Área de Turno'),1,0,'C',true);
$pdf->Cell(50,10,utf8_decode('Responsable'),1,0,'C',true);
$pdf->Cell(25,10,utf8_decode('Fecha de Turno'),1,1,'C',true);
$pdf->SetFont('Arial','B',6.5);
$pdf->SetTextColor(0, 0, 0);
foreach ($resultado2 as $dato2){
    $cellWidth=50;
    $cellHeight=4;

   
    //echo $line;
    if($pdf -> GetStringWidth($dato2['turno_asunto'])<$cellWidth){
        $lineasunto = 1;
    }else{
        $textLength = strlen($dato2['turno_asunto']);
        $errMargin = 10;
        $startChar = 0;
        $maxChar = 0;
        $textArray = array();
        $tmpString = "";

        while($startChar < $textLength){
            while(
                $pdf -> GetStringWidth($tmpString) < ($cellWidth-$errMargin) &&
                ($startChar+$maxChar) < $textLength){
                    $maxChar++;
                    $tmpString = substr($dato2['turno_asunto'],$startChar,$maxChar);
                }
                $startChar = $startChar + $maxChar;
                array_push($textArray,$tmpString);
                $maxChar = 0;
                $tmpString = '';


            
        }
        $lineasunto = count($textArray);
        
    }
    //echo $line;

    if($pdf -> GetStringWidth($dato2['turno_remitente'])<$cellWidth){
        $lineremi = 1;
    }else{
        $textLength = strlen($dato2['turno_remitente']);
        $errMargin = 10;
        $startChar = 0;
        $maxChar = 0;
        $textArray = array();
        $tmpString = "";

        while($startChar < $textLength){
            while(
                $pdf -> GetStringWidth($tmpString) < ($cellWidth-$errMargin) &&
                ($startChar+$maxChar) < $textLength){
                    $maxChar++;
                    $tmpString = substr($dato2['turno_remitente'],$startChar,$maxChar);
                }
                $startChar = $startChar + $maxChar;
                array_push($textArray,$tmpString);
                $maxChar = 0;
                $tmpString = '';


            
        }
        
        $lineremi = count($textArray);
    }

    if($pdf -> GetStringWidth($dato2['turno_area'])<$cellWidth){
        $linearea = 1;
    }else{
        $textLength = strlen($dato2['turno_area']);
        $errMargin = 10;
        $startChar = 0;
        $maxChar = 0;
        $textArray = array();
        $tmpString = "";

        while($startChar < $textLength){
            while(
                $pdf -> GetStringWidth($tmpString) < ($cellWidth-$errMargin) &&
                ($startChar+$maxChar) < $textLength){
                    $maxChar++;
                    $tmpString = substr($dato2['turno_area'],$startChar,$maxChar);
                }
                $startChar = $startChar + $maxChar;
                array_push($textArray,$tmpString);
                $maxChar = 0;
                $tmpString = '';


            
        }
        $linearea = count($textArray);
    }

    if($pdf -> GetStringWidth($dato2['turno_responsable'])<$cellWidth){
        $lineres = 1;
    }else{
        $textLength = strlen($dato2['turno_responsable']);
        $errMargin = 10;
        $startChar = 0;
        $maxChar = 0;
        $textArray = array();
        $tmpString = "";

        while($startChar < $textLength){
            while(
                $pdf -> GetStringWidth($tmpString) < ($cellWidth-$errMargin) &&
                ($startChar+$maxChar) < $textLength){
                    $maxChar++;
                    $tmpString = substr($dato2['turno_responsable'],$startChar,$maxChar);
                }
                $startChar = $startChar + $maxChar;
                array_push($textArray,$tmpString);
                $maxChar = 0;
                $tmpString = '';


            
        }
        $lineres = count($textArray);
    }

   //echo $lineasunto.' '.$lineremi.' '.$linearea.' '.$lineres;

    
    $pdf->Cell(15,($lineasunto * 3),utf8_decode($dato2['turno_no_turno']),1,0,'C');
    $pdf->Cell(40,($lineasunto * 3),utf8_decode($dato2['turno_no_oficio']),1,0,'C');

   

    $xPos = $pdf ->GetX();
    $yPos = $pdf ->GetY();

    
    $pdf-> MultiCell($cellWidth,($cellHeight),utf8_decode($dato2['turno_asunto']),1,'C');
    $pdf -> SetXY($xPos + $cellWidth, $yPos);

    

    $xPos = $pdf ->GetX();
    $yPos = $pdf ->GetY();
    $pdf-> MultiCell($cellWidth,($cellHeight),utf8_decode($dato2['turno_remitente']),1,'C');
    $pdf -> SetXY($xPos + $cellWidth, $yPos);

    $xPos = $pdf ->GetX();
    $yPos = $pdf ->GetY();
    $pdf-> MultiCell($cellWidth,($cellHeight),utf8_decode($dato2['turno_area']),1,'C');
    $pdf -> SetXY($xPos + $cellWidth, $yPos);
  
    $xPos = $pdf ->GetX();
    $yPos = $pdf ->GetY();
    $pdf-> MultiCell($cellWidth,($cellHeight),utf8_decode($dato2['turno_responsable']),1,'C');
    $pdf -> SetXY($xPos + $cellWidth, $yPos);
   
    $pdf->Cell(25,($lineasunto ),utf8_decode($dato2['turno_fecha_recibido']),1,1,'C');
}
$pdf->Output();
?>