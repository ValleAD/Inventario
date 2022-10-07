<?php
include '../../../../Model/conexion.php';
require ' ../../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$writer = new Xlsx($spreadsheet);
$sheet->getColumnDimension('A')->setWidth(10);
$sheet->getColumnDimension('B')->setWidth(15.14);
$sheet->getColumnDimension('C')->setWidth(40.29);
$sheet->getColumnDimension('D')->setWidth(11);
$sheet->getColumnDimension('E')->setWidth(53.57);
$sheet->getColumnDimension('F')->setWidth(7.43);
$sheet->getColumnDimension('G')->setWidth(8);
$sheet->getColumnDimension('H')->setWidth(14);
$sheet->getColumnDimension('I')->setWidth(13.53);

$sheet->setCellValue('A1', 'N° Compra');
$sheet->setCellValue('B1', 'Dependencia');
$sheet->setCellValue('C1', 'Encargado');
$sheet->setCellValue('D1', 'Código');
$sheet->setCellValue('E1', 'Descriptión Completa');
$sheet->setCellValue('F1', 'U/M');
$sheet->setCellValue('G1', 'Stock');
$sheet->setCellValue('H1', 'Costo Unitario');
$sheet->setCellValue('I1', 'Fecha Registro');
if (isset($_POST['compra'])) {

    $sql = "SELECT * FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra ";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
        $precio=$productos['precio'];
        $precio2=number_format($stock1, 2,".",",");
        $stock1=$productos['cantidad_solicitada'];
        $stock=number_format($precio, 2,".",",");
           if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        $sheet->setCellValue('A' .$fila, $productos['nSolicitud']);
        $sheet->setCellValue('B' .$fila, $productos['dependencia']);
        $sheet->setCellValue('C' .$fila, $productos['usuario']." "."(".$u.")");
        $sheet->setCellValue('D' .$fila, $productos['codigo']);
        $sheet->setCellValue('E' .$fila, $productos['descripcion']);
        $sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
        $sheet->setCellValue('G' .$fila, $stock);
        $sheet->setCellValue('H' .$fila, $precio2);
        $sheet->setCellValue('I' .$fila, $productos['fecha_registro']);
    	$fila ++;
    	}
    }
    if (isset($_POST['compra1'])) {$idusuario=$_POST['idusuario'];
        $sql = "SELECT * FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra WHERE db.idusuario='$idusuario'";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
        $precio=$productos['precio'];
        $precio2=number_format($precio, 2,".",",");
        $stock1=$productos['cantidad_solicitada'];
        $stock=number_format($precio, 2,".",",");

        $sheet->setCellValue('A' .$fila, $productos['nSolicitud']);
        $sheet->setCellValue('B' .$fila, $productos['dependencia']);
        $sheet->setCellValue('C' .$fila, $productos['usuario']);
        $sheet->setCellValue('D' .$fila, $productos['codigo']);
        $sheet->setCellValue('E' .$fila, $productos['descripcion']);
        $sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
        $sheet->setCellValue('G' .$fila, $stock);
        $sheet->setCellValue('H' .$fila, $precio2);
        $sheet->setCellValue('I' .$fila, $productos['fecha_registro']);
        $fila ++;
        }
    }
        $writer->save('Ingresos De la Compra.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Ingresos De la Compra.xlsx");
exit();