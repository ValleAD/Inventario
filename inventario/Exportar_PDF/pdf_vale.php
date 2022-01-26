<?php

if(isset($_POST['cod'])){

    $depto = $_POST['depto'];
    $fech = $_POST['fech'];
    $encargado = $_POST['usuario'];
    
        
    $final = 0;

require('../fpdf/fpdf.php');

class PDF extends FPDF{ 

function Header(){

    $vale = $_POST['vale'];
    
    $this->Cell(8);
    $this->Image('../img/hospital.jpg', 150, 7, 48);
    $this->Image('../img/log_1.png', 12, null, 50);
    $this->Ln(5);
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(10);
    $this->Cell(70, 15, 'HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA',0, 0, 'c');
    $this->SetFont('Arial', '', 11);
    $this->Cell(160, 15, ('Vale No.: '.$vale), 0, 0, 'C', 0);
    $this->Ln();
    $this->Cell(10);
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
$pdf->Cell(58, 10, utf8_decode('Fecha: '. $fech), 0, 0, 'C', 0);   
$pdf->Cell(105, 10, ('Depto. o Servicio: '. $depto), 0, 0, 'C', 0);
$pdf->Ln(10);
$pdf->Cell(71, 5, utf8_decode('Encargado: '. $encargado), 0, 0, 'C', 0);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode('Código'), 1, 0, 'C', 0);
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
    $tot = $_POST['tot'][$i];

$pdf->SetFont('Arial', '', '12');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode($codigo),1, 0, 'C', 0);
$pdf->Cell(60, 10, utf8_decode($des),1, 0, 'C', 0);
$pdf->Cell(15, 10, utf8_decode($um),1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode($cantidad),1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($cost),1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode($tot),1, 0, 'C', 0);
$pdf->Ln();
}

$tot_f = $_POST['tot_f'];

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(115, 10, utf8_decode(""),1, 0, 'C', 0);
$pdf->Cell(40, 10, 'Subtotal', 1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode($tot_f),1, 0, 'C', 0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(175, 10, utf8_decode('Observaciones (En que se ocupará el bien entregado)'),1, 0, 'L', 0);
$pdf->Ln();
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(175, 40, '', 1, 0, 'C', 0);
$pdf->Ln(50);
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(0, 12,('Solicita: ________________                                  Entrega: ________________'), 0, 1);
$pdf->Ln();
$pdf->Cell(50);
$pdf->Cell(0, 12,('Autoriza: ________________'), 0, 1);


//mostramos el PDF
$pdf->Output('', 'Vale.pdf');

}

?>