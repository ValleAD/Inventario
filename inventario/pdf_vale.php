<?php

if(isset($_POST['cod'])){

    $depto = $_POST['depto'];
        
    $final = 0;
require('fpdf/fpdf.php');

class PDF extends FPDF{ 

function Header(){
    
    $this->Cell(10);
    $this->Image('img/log_1.png', 150, 10, 50);
    $this->Image('img/log_1.png', 12, null, 50);
    $this->Ln(5);
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(70, 15, 'HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA',0, 0, 'c');
    $this->SetFont('Arial', '', 11);
    $this->Cell(160, 15, ('Vale No.: '), 0, 0, 'C', 0);
    $this->Ln();
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(70, 5, 'DEPARTAMENTO DE MANTENIMIENTO',0, 0, 'c');
    $this->Ln(15);
    $this->Cell(70);
    $this->Cell(70, 5, 'Solicitud de Materiales',0, 0, 'c');
    $this->Ln();
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', '12');


$pdf->Ln();
$pdf->Cell(25, 10, utf8_decode('Fecha: '), 0, 0, 'C', 0);   
$pdf->Cell(126, 10, 'Depto. o Servicio: ', 0, 0, 'C', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(25, 10, utf8_decode('Código'), 1, 0, 'C', 0);
$pdf->Cell(60, 10, utf8_decode('Descripción'), 1, 0, 'C', 0);   
$pdf->Cell(15, 10, 'U/M', 1, 0, 'C', 0);
$pdf->Cell(20, 10, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(40, 10, 'Costo Unitario', 1, 0, 'C', 0);
$pdf->Cell(20, 10, 'Total', 1, 1, 'C', 0);

for($i = 0; $i < count($_POST['cod']); $i++)
{
   
    $codigo = $_POST['cod'][$i];
    $des = $_POST['desc'][$i];
    $um = $_POST['um'][$i];
    $cantidad = $_POST['cant'][$i];
    $cost = $_POST['cost'][$i];

    $total[$i] = $cost * $cantidad;
    $final = $final + $total[$i];

$pdf->SetFont('Arial', '', '12');
$pdf->Cell(25, 10, utf8_decode($codigo),1, 0, 'C', 0);
$pdf->Cell(60, 10, utf8_decode($des),1, 0, 'C', 0);
$pdf->Cell(15, 10, utf8_decode($um),1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode($cantidad),1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode("$" . $cost),1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode("$" . $total[$i]),1, 0, 'C', 0);
$pdf->Ln();
}

$pdf->Cell(160, 10, utf8_decode(""),1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode("$" . $final),1, 0, 'C', 0);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0, 12,('Solicita: ________________                                  Entrega: ________________'), 0, 1);
$pdf->Ln();
$pdf->Cell(50);
$pdf->Cell(0, 12,('Autoriza: ________________'), 0, 1);


//mostramos el PDF
$pdf->Output('', 'Vale.pdf');

}

?>