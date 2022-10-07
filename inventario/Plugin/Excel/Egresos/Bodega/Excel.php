<?php
include '../../../../Model/conexion.php';
require ' ../../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$writer = new Xlsx($spreadsheet);
$sheet->getColumnDimension('A')->setWidth(10);
$sheet->getColumnDimension('B')->setWidth(34.86);
$sheet->getColumnDimension('C')->setWidth(46);
$sheet->getColumnDimension('D')->setWidth(53.57);
$sheet->getColumnDimension('E')->setWidth(7.14);
$sheet->getColumnDimension('F')->setWidth(17.57);
$sheet->getColumnDimension('G')->setWidth(19.71);
$sheet->getColumnDimension('H')->setWidth(13.19);
$sheet->getColumnDimension('I')->setWidth(13);

$sheet->setCellValue('A1', 'Codigo');
$sheet->setCellValue('B1', 'Departamento');
$sheet->setCellValue('C1', 'Encargado');
$sheet->setCellValue('D1', 'Descriptión');
$sheet->setCellValue('E1', 'U/M');
$sheet->setCellValue('F1', 'Cantidad Solicitada');
$sheet->setCellValue('G1', 'Cantidad Despachada');
$sheet->setCellValue('H1', 'Costo Unitario');
$sheet->setCellValue('I1', 'Fecha Registro');
if (isset($_POST['bodega'])) {

    $sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
        $precio=$productos['precio'];
        $precio2=number_format($precio, 2,".",",");
        $stock1=$productos['stock'];
        $stock=number_format($stock1, 2,".",",");
           if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
    	$sheet->setCellValue('A' .$fila, $productos['codBodega']);
    	$sheet->setCellValue('B' .$fila, $productos['departamento']);
    	$sheet->setCellValue('C' .$fila, $productos['usuario']." "."(".$u.")");
    	$sheet->setCellValue('D' .$fila, $productos['descripcion']);
    	$sheet->setCellValue('E' .$fila, $productos['unidad_medida']);
    	$sheet->setCellValue('F' .$fila, $stock);
    	$sheet->setCellValue('G' .$fila, $productos['cantidad_despachada']);
    	$sheet->setCellValue('H' .$fila, $productos['precio']);
        $sheet->setCellValue('I' .$fila, $productos['fecha_registro']);
    	$fila ++;
    	}
    }
    if (isset($_POST['bodega1'])) {$idusuario=$_POST['idusuario'];
        $sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE b.codigodetallebodega='$idusuario'";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
        $precio=$productos['precio'];
        $precio2=number_format($precio, 2,".",",");
        $stock1=$productos['stock'];
        $stock=number_format($stock1, 2,".",",");
        $sheet->setCellValue('A' .$fila, $productos['codBodega']);
        $sheet->setCellValue('B' .$fila, $productos['departamento']);
        $sheet->setCellValue('C' .$fila, $productos['usuario']);
        $sheet->setCellValue('D' .$fila, $productos['descripcion']);
        $sheet->setCellValue('E' .$fila, $productos['unidad_medida']);
        $sheet->setCellValue('F' .$fila, $stock);
        $sheet->setCellValue('G' .$fila, $productos['cantidad_despachada']);
        $sheet->setCellValue('H' .$fila, $productos['precio']);
        $sheet->setCellValue('I' .$fila, $productos['fecha_registro']);
        $fila ++;
        }
    }
        $writer->save('Egreso Bodega.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Egreso Bodega.xlsx");
exit();