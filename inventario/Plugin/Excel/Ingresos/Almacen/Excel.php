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
$sheet->getColumnDimension('C')->setWidth(41);
$sheet->getColumnDimension('D')->setWidth(32.43);
$sheet->getColumnDimension('E')->setWidth(53.57);
$sheet->getColumnDimension('F')->setWidth(5.14);
$sheet->getColumnDimension('G')->setWidth(17.57);
$sheet->getColumnDimension('H')->setWidth(19.71);
$sheet->getColumnDimension('I')->setWidth(13.19);
$sheet->getColumnDimension('J')->setWidth(13);

$sheet->setCellValue('A1', 'N° Almacen');
$sheet->setCellValue('B1', 'Departamento');
$sheet->setCellValue('C1', 'Encargado');
$sheet->setCellValue('D1', 'Código');
$sheet->setCellValue('E1', 'Descriptión');
$sheet->setCellValue('F1', 'U/M');
$sheet->setCellValue('G1', 'Cantidad');
$sheet->setCellValue('H1', 'Costo Unitario');
$sheet->setCellValue('I1', 'Fecha Registro');
if (isset($_POST['almacen'])) {

    $sql = "SELECT * FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
        $precio=$productos['precio'];
        $precio2=number_format($precio, 2,".",",");
        $stock1=$productos['cantidad_solicitada'];
        $stock=number_format($stock1, 2,".",",");
           if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
    	$sheet->setCellValue('A' .$fila, $productos['codAlmacen']);
        $sheet->setCellValue('B' .$fila, $productos['departamento']);
    	$sheet->setCellValue('C' .$fila, $productos['encargado']." "."(".$u.")");
    	$sheet->setCellValue('D' .$fila, $productos['codigo']);
    	$sheet->setCellValue('E' .$fila, $productos['nombre']);
    	$sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
    	$sheet->setCellValue('G' .$fila, $stock);
    	$sheet->setCellValue('H' .$fila, $precio2);
        $sheet->setCellValue('I' .$fila, $productos['fecha_solicitud']);
    	$fila ++;
    	}
    }
    if (isset($_POST['almacen1'])) {$idusuario=$_POST['idusuario'];
        $sql = "SELECT * FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen WHERE db.idusuario='$idusuario'";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
        $precio=$productos['precio'];
        $precio2=number_format($precio, 2,".",",");
        $stock1=$productos['cantidad_solicitada'];
        $stock=number_format($stock1, 2,".",",");
        $sheet->setCellValue('A' .$fila, $productos['codAlmacen']);
        $sheet->setCellValue('B' .$fila, $productos['departamento']);
        $sheet->setCellValue('C' .$fila, $productos['encargado']);
        $sheet->setCellValue('D' .$fila, $productos['codigo']);
        $sheet->setCellValue('E' .$fila, $productos['nombre']);
        $sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
        $sheet->setCellValue('G' .$fila, $stock);
        $sheet->setCellValue('H' .$fila, $precio2);
        $sheet->setCellValue('I' .$fila, $productos['fecha_solicitud']);
        $fila ++;
        }
    }
        $writer->save('Ingresos del Almacen.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Ingresos del Almacen.xlsx");
exit();