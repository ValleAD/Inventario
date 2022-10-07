<?php
include '../../../../Model/conexion.php';
require ' ../../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$writer = new Xlsx($spreadsheet);
$sheet->getColumnDimension('A')->setWidth(10);
$sheet->getColumnDimension('B')->setWidth(10);
$sheet->getColumnDimension('C')->setWidth(40);
$sheet->getColumnDimension('D')->setWidth(6.43);
$sheet->getColumnDimension('E')->setWidth(7.29);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(17.57);

$sheet->setCellValue('A1', 'N° Circulante');
$sheet->setCellValue('B1', 'Codigo');
$sheet->setCellValue('C1', 'Descriptión');
$sheet->setCellValue('D1', 'U/M');
$sheet->setCellValue('E1', 'Stock');
$sheet->setCellValue('F1', 'Costo Unitario');
$sheet->setCellValue('G1', 'Fecha');
if (isset($_POST['circulante'])) {

    $sql = "SELECT * FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
        $precio=$productos['precio'];
        $precio2=number_format($precio, 2,".",",");
        $stock1=$productos['stock'];
        $stock=number_format($stock1, 2,".",",");
    	$sheet->setCellValue('A' .$fila, $productos['codCirculante']);
        $sheet->setCellValue('B' .$fila, $productos['codigo']);
    	$sheet->setCellValue('C' .$fila, $productos['descripcion']);
    	$sheet->setCellValue('D' .$fila, $productos['unidad_medida']);
    	$sheet->setCellValue('E' .$fila, $stock);
    	$sheet->setCellValue('F' .$fila, $productos['precio']);
        $sheet->setCellValue('G' .$fila, $productos['fecha_solicitud']);
    	$fila ++;
    	}
    }
    if (isset($_POST['circulante1'])) {$idusuario=$_POST['idusuario'];
        $sql = "SELECT * FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE db.idusuario='$idusuario";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
        $precio=$productos['precio'];
        $precio2=number_format($precio, 2,".",",");
        $stock1=$productos['stock'];
        $stock=number_format($precio, 2,".",",");
        $stock=number_format($precio, 2,".",",");
        $sheet->setCellValue('A' .$fila, $productos['codCirculante']);
        $sheet->setCellValue('B' .$fila, $productos['codigo']);
        $sheet->setCellValue('C' .$fila, $productos['descripcion']);
        $sheet->setCellValue('D' .$fila, $productos['unidad_medida']);
        $sheet->setCellValue('E' .$fila, $stock);
        $sheet->setCellValue('F' .$fila, $productos['precio']);
        $sheet->setCellValue('G' .$fila, $productos['fecha_solicitud']);
        $fila ++;
        }
    }
        $writer->save('Ingresos Circulante.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Ingresos Circulante.xlsx");
exit();