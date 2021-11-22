<?php
require('fpdf/fpdf.php');
require ('dt_form_vale.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{

    // Logo

    // Poner una Imagen que concuerde 
    $this->Image('img/baner.png',165,10,40);
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Move to the right
    $this->Cell(60);
    // Title
    $this->Cell(60,10,'Hospital Nacional Santa Teresa de Zacatecoluca',0,0,'C');
    // Line break
    $this->Ln(20);
    $this->SetFont('Arial','B',10);
    $this->MultiCell(0,7,utf8_decode('Almacén de medicamentos, insumos médicos, papelería y otros artículos'));
    $this->ln(20);
    // Conexion con la descripcion a la tabla que se conectara
    $this->Cell(30,10,'codigo', 1, 0,'C',0);
    $this->Cell(67,10,'descripcion', 1, 0,'C',0);
    $this->Cell(30,10,'precioVenta', 1, 0,'C',0);
    $this->Cell(30,10,'precioCompra', 1, 0,'C',0);
    $this->Cell(35,10,'existencia', 1, 1,'C',0);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
// Tabla con la que se conectara



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);


     // Conexion con la descripcion a la tabla que se conectara
    $pdf->Cell(30,10,'cod', 1,0,'L',0);
    $pdf->Cell(67,10,'desc', 1,0,'L',0);
    $pdf->Cell(30,10,'um', 1,0,'L',0);
    $pdf->Cell(30,10,'cant', 1,0,'L',0);
    $pdf->Cell(35,10,$total, 1,1,'L',0);


$pdf->Output();
