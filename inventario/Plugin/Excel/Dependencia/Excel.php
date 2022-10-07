<?php
include '../../../Model/conexion.php';
require ' ../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$writer = new Xlsx($spreadsheet);
$sheet->getColumnDimension('A')->setWidth(10);
$sheet->getColumnDimension('B')->setWidth(36);
$sheet->getColumnDimension('C')->setWidth(23);

$sheet->setCellValue('A1', 'Codigo');
$sheet->setCellValue('B1', 'Dependencia');
$sheet->setCellValue('C1', 'Habilitado');

$sql="SELECT * FROM  selects_dependencia ";
$result = mysqli_query($conn, $sql);

$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
        if($productos['Habilitado']=='Si') {
                    $c='dependencia Disponible';
                } elseif ($productos['Habilitado']  == 'No') {
                    $c='dependencia no Disponible';
                }
    	$sheet->setCellValue('A' .$fila, $productos['id']);
    	$sheet->setCellValue('B' .$fila, $productos['dependencia']);
    	$sheet->setCellValue('C' .$fila, $c);
    	$fila ++;
    	}
        $writer->save('dependencia.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: dependencia.xlsx");
exit();