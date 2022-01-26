<?php

if(isset($_POST['cod'])){

   
    $final = 0;

require('../fpdf/fpdf.php');

class PDF extends FPDF{ 

function Header(){

    
    
    $this->Cell(8);
    $this->Image('../img/hospital.jpg', 150, 7, 50);
    $this->Image('../img/log_1.png', 12, null, 50);
    $this->Ln(5);
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(10);
    $this->Cell(70, 15, 'HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA',0, 0, 'c');
    $this->SetFont('Arial', '', 11);
    $this->Ln();
    $this->Cell(10);
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(70, 5, 'DEPARTAMENTO DE MANTENIMIENTO',0, 0, 'c');
    $this->Ln(15);
    $this->Cell(70);
    $this->Cell(70, 5, 'DETALLES CIRCULANTE',0, 0, 'c');
    $this->Ln();
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', '12');


$pdf->Ln();
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode('Código'), 1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode('Nombre'), 1, 0, 'C', 0);
$pdf->Cell(15, 10, 'U/M', 1, 0, 'C', 0);
$pdf->Cell(40, 10, 'Cant. Solicitada', 1, 0, 'C', 0);
$pdf->Cell(40, 10, 'fecha_registro', 1, 0, 'C', 0);
$pdf->Cell(20, 10, 'Precio', 1, 0, 'C', 0);
$pdf->Cell(20, 10, 'Total', 1, 1, 'C', 0);
$codigo =$_POST['cod'];
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode($codigo),1, 0, 'C', 0);
/*$pdf->Cell(60, 10, utf8_decode($des),1, 0, 'C', 0);
$pdf->Cell(15, 10, utf8_decode($um),1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode($cantidad),1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($cost),1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode($tot),1, 0, 'C', 0);*/
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(115, 10, utf8_decode(""),1, 0, 'C', 0);
$pdf->Cell(40, 10, 'Subtotal', 1, 0, 'C', 0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(175, 10, utf8_decode('Observaciones (En que se ocupará el bien entregado)'),1, 0, 'L', 0);
$pdf->Ln();
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(175, 40, '', 1, 0, 'C', 0);
$pdf->Ln(55);
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(0, 12,('Solicita: ________________                                  Entrega: ________________'), 0, 1);
$pdf->Ln();
$pdf->Cell(50);
$pdf->Cell(0, 12,('Autoriza: ________________'), 0, 1);


//mostramos el PDF
$pdf->Output('', 'Vale.pdf');

}
?>