<?php

if(isset($_POST['num_sol'])){

    $solicitud_no = $_POST['num_sol'];
    
        
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
    $this->Cell(50);
    $this->Cell(10, 10, 'FONDO CIRCULANTE DE MONTO FIJO',0, 0, 'c');
    $this->Ln(10);
    }
}

$pdf = new PDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(5);
$pdf->Cell(0, 10, utf8_decode('Solicitud No.: ' . $solicitud_no), 0, 1);
$pdf->Ln(5);
$pdf->SetFont('Arial', '', '10');
$pdf->Cell(5);
$pdf->Cell(0, 2, utf8_decode('Encargado del Fondo Circulante de Monto Fijo Recursos Propios'), 0, 1);
$pdf->Ln(1);
$pdf->Cell(5);
$pdf->Cell(0, 7, utf8_decode('Hospital Nacional "Santa Teresa" de Zacatecoluca'), 0, 1);
$pdf->Ln(8);
$pdf->Cell(5);
$pdf->Cell(0, 2, utf8_decode('Atentamente solicito a usted la compra Urgente de los materiales y/o servicios que se detallan'), 0, 1);
$pdf->Ln(1);
$pdf->Cell(5);
$pdf->Cell(0, 7, utf8_decode('a continuación, a traves del Fondo Circulante de Monto Fijo.'), 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(85, 10, utf8_decode('Descripción de los materiales'), 1, 0, 'C', 0);
$pdf->Cell(12, 10, 'U/M', 1, 0, 'C', 0);
$pdf->Cell(20, 10, 'Cant. sol.', 1, 0, 'C', 0);
$pdf->Cell(25, 10, 'Cant. desp.', 1, 0, 'C', 0);
$pdf->Cell(15, 10, 'C/U', 1, 0, 'C', 0);
$pdf->Cell(20, 10, 'Total', 1, 1, 'C', 0);

for($i = 0; $i < count($_POST['desc']); $i++)
{
   
    $descripcion = $_POST['desc'][$i];
    $um = $_POST['um'][$i];
    $cantidad = $_POST['cant'][$i];
    $cost = $_POST['cost'][$i];
    $tot = $_POST['tot'][$i];

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(5, 10, '', 0, 0, 'C', 0);
$pdf->Cell(85, 10, utf8_decode($descripcion),1, 0, 'L', 0);
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
$pdf->Cell(157, 10, utf8_decode("Costo Estimado a Realizar"),1, 0, 'R', 0);
$pdf->Cell(20, 10, utf8_decode($tot_f),1, 0, 'C', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', '11');
$pdf->Cell(5);
$pdf->Cell(0, 10, 'Todo lo anteriormente detallado, es indispensable para desarrollar nuestas funciones.', 0, 1);
$pdf->Ln(1);
$pdf->Cell(5);
$pdf->Cell(0, 10, utf8_decode('Sin más particular'), 0, 1);
$pdf->Ln(1);
$pdf->Cell(12);
$pdf->Cell(0, 10, utf8_decode('Solicita:                                                                                Dá fé de no haber existencias:'), 0, 1);
$pdf->Ln(8);
$pdf->Cell(12);
$pdf->Cell(0, 10, utf8_decode('F:_________________                                                          F:_________________'), 0, 1);
$pdf->Ln(1);
$pdf->Cell(12);
$pdf->Cell(0, 5, utf8_decode('Ing. Ernesto González Choto                                                   Sra: Maria Isabel Romero'), 0, 1);
$pdf->Ln(1);
$pdf->Cell(12);
$pdf->Cell(0, 5, utf8_decode('  Jefe de mantenimiento                                                               Guardalmacén'), 0, 1);
$pdf->Ln(5);
$pdf->Cell(75);
$pdf->Cell(0, 10, utf8_decode('Autoriza:'), 0, 1);
$pdf->Ln(8);
$pdf->Cell(60);
$pdf->Cell(0, 10, utf8_decode('F:_________________'), 0, 1);
$pdf->Ln(1);
$pdf->Cell(50);
$pdf->Cell(0, 5, utf8_decode('Dr. William Antonio Fernández Rodríguez'), 0, 1);
$pdf->Ln(1);
$pdf->Cell(48);
$pdf->Cell(0, 5, utf8_decode('Director del Hospital Nacional "Santa Teresa"'), 0, 1);


//mostramos el PDF
$pdf->Output('', 'Solicitud_almacen.pdf');

}

?>