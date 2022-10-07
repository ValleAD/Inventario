<?php
include '../../../Model/conexion.php';
require ' ../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$writer = new Xlsx($spreadsheet);
$sheet->getColumnDimension('A')->setWidth(10);
$sheet->getColumnDimension('B')->setWidth(43.57);
$sheet->getColumnDimension('C')->setWidth(24.57);

$sheet->setCellValue('A1', 'Codigo');
$sheet->setCellValue('B1', 'Departamento');
$sheet->setCellValue('C1', 'Habilitado');

$sql="SELECT * FROM  selects_departamento ";
$result = mysqli_query($conn, $sql);

$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
        if($productos['Habilitado']=='Si') {
                    $c='Departamento Disponible';
                } elseif ($productos['Habilitado']  == 'No') {
                    $c='Departamento no Disponible';
                }
    	$sheet->setCellValue('A' .$fila, $productos['id']);
    	$sheet->setCellValue('B' .$fila, $productos['departamento']);
    	$sheet->setCellValue('C' .$fila, $c);
    	$fila ++;
    	}
        $writer->save('Departamento.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Departamento.xlsx");
exit();