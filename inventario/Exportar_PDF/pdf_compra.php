<?php

if(isset($_POST['cod'])){

    $solicitud = $_POST['sol_compra'];
    $dependencia = $_POST['dependencia'];
    $plazo = $_POST['plazo'];
    $unidad = $_POST['unidad'];
    $suministro = $_POST['suministro'];
    $usuario = $_POST['usuario'];
    $fecha = $_POST['fech'];

    
        
    $final = 0;

require('../fpdf/fpdf.php');

class PDF extends FPDF{ 

function Header(){
    
    $this->Cell(5);
    $this->Image('../img/hospital.jpg', 150, 7, 50);
    $this->Image('../img/log_1.png', 12, null, 50);
    $this->Ln();
    $this->SetFont('Arial', 'B', 11);
    $this->Cell(180, 7, 'MINISTERIO DE SALUD',0, 0, 'C');
    $this->Ln();
    $this->Cell(180, 7, 'HOSPITAL NACIONAL SANTA TERESA',0, 0, 'C');
    $this->Ln();
    $this->Cell(180, 7, 'UNIDAD DE ADQUISICIONES  Y CONTRATACIONES INSTITUCIONAL',0, 0, 'C');
    $this->Ln();
    $this->Cell(180, 7, 'SOLICITUD DE COMPRA',0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', '10');

$pdf->Ln(8);
$pdf->Cell(270, 10, utf8_decode('Fecha de impresión:'), 0, 0, 'C', 0); 
$pdf->Ln(4);
$pdf->Cell(291, 10, utf8_decode('Fecha de creación: ' .$fecha), 0, 0, 'C', 0);  
$pdf->Ln(5); 
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(5);
$pdf->Cell(60, 10, ('Solicitud No. '. $solicitud), 0, 0, 'L', 0);
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->Cell(60, 10, ('Dependencia Solicitante: '. $dependencia), 0, 0, 'L', 0);
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->Cell(60, 10, utf8_decode('Plazo y Número de Entregas: '. $plazo), 0, 0, 'L', 0);
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->Cell(60, 10, utf8_decode('Unidad Técnica: '. $unidad), 0, 0, 'L', 0);
$pdf->Ln(4);
$pdf->Cell(5);
$pdf->Cell(60, 10, ('Suministro Solicitado: '. $suministro), 0, 0, 'L', 0);
$pdf->Ln(10);
$pdf->Cell(142, 10, '', 0, 0, 'C', 0);
$pdf->Cell(35, 10, utf8_decode("Montos Estimados"),1, 0, 'C', 0);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode('Código'), 1, 0, 'C', 0);
$pdf->Cell(60, 10, utf8_decode('Descripción Completa'), 1, 0, 'C', 0);   
$pdf->Cell(12, 10, 'U/M', 1, 0, 'C', 0);
$pdf->Cell(20, 10, 'Cant. sol.', 1, 0, 'C', 0);
$pdf->Cell(25, 10, 'Cant. aprob.', 1, 0, 'C', 0);
$pdf->Cell(15, 10, 'C/U', 1, 0, 'C', 0);
$pdf->Cell(20, 10, 'Total', 1, 1, 'C', 0);

for($i = 0; $i < count($_POST['cod']); $i++)
{
   
    $codigo = $_POST['cod'][$i];
    $des = $_POST['desc'][$i];
    $um = $_POST['um'][$i];
    $cantidad = $_POST['cant'][$i];
    $cost = $_POST['cost'][$i];
    $tot = $_POST['tot'][$i];

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode($codigo),1, 0, 'C', 0);
$pdf->Cell(60, 10, utf8_decode($des),1, 0, 'L', 0);
$pdf->Cell(12, 10, utf8_decode($um),1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode($cantidad),1, 0, 'C', 0);
$pdf->Cell(25, 10, "",1, 0, 'C', 0);
$pdf->Cell(15, 10, utf8_decode($cost),1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode($tot),1, 0, 'C', 0);
$pdf->Ln();
}

$tot_f = $_POST['tot_f'];

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(112, 10, utf8_decode(""),1, 0, 'C', 0);
$pdf->Cell(40, 10, 'Subtotal', 1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode($tot_f),1, 0, 'C', 0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial', '', '10');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(175, 10, utf8_decode('Justificación por el OBS solicitado:'),1, 0, 'L', 0);
$pdf->Ln();
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(175, 40, '', 1, 0, 'C', 0);


//mostramos el PDF
$pdf->Output('', 'Solicitud_compra.pdf');

}

?>