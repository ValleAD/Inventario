<?php
include '../../../Model/conexion.php';
require ' ../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$writer = new Xlsx($spreadsheet);

$sheet->getColumnDimension('A','B','D','E','F')->setWidth(10);
$sheet->getColumnDimension('C')->setWidth(104);
$sheet->getColumnDimension('G')->setWidth(12);
$sheet->getColumnDimension('H')->setWidth(30);

$sheet->setCellValue('A1', 'Codigo');
$sheet->setCellValue('B1', 'catalogo');
$sheet->setCellValue('C1', 'Description');
$sheet->setCellValue('D1', 'U/M');
$sheet->setCellValue('E1', 'stock');
$sheet->setCellValue('F1', 'Precio');
$sheet->setCellValue('G1', 'Fecha');
$sheet->setCellValue('H1', 'Categorias');

$cod=$_POST['consulta'];

   $sql = "SELECT * FROM `tb_productos` WHERE codProductos LIKE '%".$cod."%' or descripcion LIKE '%".$cod."%' ";
$result = mysqli_query($conn, $sql);

$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
    	$sheet->setCellValue('A' .$fila, $productos['codProductos']);
    	$sheet->setCellValue('B' .$fila, $productos['catalogo']);
    	$sheet->setCellValue('C' .$fila, $productos['descripcion']);
    	$sheet->setCellValue('D' .$fila, $productos['unidad_medida']);
    	$sheet->setCellValue('E' .$fila, $productos['SUM(stock)']);
    	$sheet->setCellValue('F' .$fila, $productos['precio']);
    	$sheet->setCellValue('G' .$fila, $productos['fecha_registro']);
    	$sheet->setCellValue('H' .$fila, $productos['categoria']);
    	$fila ++;
    	}
      $writer->save('Productos.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Productos.xlsx");
exit();