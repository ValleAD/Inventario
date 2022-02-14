<?php

if(isset($_POST['cod'])){

    $depto = $_POST['depto'];
    $fech = $_POST['fech'];
    
        
    $final = 0;

require('../fpdf/fpdf.php');

class PDF extends FPDF{ 

function Header(){

    $odt = $_POST['num_sol'];
    
    $this->Cell(8);
    $this->Image('../img/hospital.jpg', 150, 7, 50);
    $this->Image('../img/log_1.png', 12, null, 50);
    $this->Ln(5);
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(30);
    $this->Cell(10, 5, 'HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA',0, 0, 'c');
    $this->Ln(5);
    $this->Cell(35);
    $this->Cell(10, 10, 'ALMACEN DE MEDICAMENTOS, INSUMOS MEDICOS,',0, 0, 'c');
    $this->Ln(5);
    $this->Cell(55);
    $this->Cell(10, 10, 'PAPELERIA Y OTROS ARTICULOS',0, 0, 'c');
    $this->Ln();
    }
}

$pdf = new PDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode('Código'), 1, 0, 'C', 0);   
$pdf->Cell(12, 10, 'U/M', 1, 0, 'C', 0);
$pdf->Cell(60, 10, utf8_decode('Nombre del Artículo'), 1, 0, 'C', 0);
$pdf->Cell(20, 10, 'Cant. sol.', 1, 0, 'C', 0);
$pdf->Cell(25, 10, 'Cant. desp.', 1, 0, 'C', 0);
$pdf->Cell(15, 10, 'C/U', 1, 0, 'C', 0);
$pdf->Cell(20, 10, 'Total', 1, 1, 'C', 0);

for($i = 0; $i < count($_POST['cod']); $i++)
{
   
    $codigo = $_POST['cod'][$i];
    $nombre = $_POST['nombre'][$i];
    $um = $_POST['um'][$i];
    $cantidad = $_POST['cant'][$i];
    $cost = $_POST['cost'][$i];
    $tot = $_POST['tot'][$i];

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode($codigo),1, 0, 'C', 0);
$pdf->Cell(12, 10, utf8_decode($um),1, 0, 'C', 0);
$pdf->Cell(60, 10, utf8_decode($nombre),1, 0, 'L', 0);
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
$pdf->SetFont('Arial', '', '11');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(172, 10, utf8_decode('DEPARTAMENTO QUE SOLICITA: ' . $depto), 1, 0, 'L', 0);
$pdf->Ln();
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(172, 10, utf8_decode('FECHA: '. $fech . '                                               FIRMA:                                              SELLO'), 1, 0, 'L', 0);
$pdf->Ln();
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(172, 10, utf8_decode('AUTORIZA: DIRECTOR DEL HOSPITAL NACIONAL "SANTA TERESA"'), 1, 0, 'L', 0);
$pdf->Ln();

//mostramos el PDF
$pdf->Output('', 'Solicitud_almacen.pdf');

}

?>