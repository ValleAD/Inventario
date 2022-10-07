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
$sheet->getColumnDimension('C')->setWidth(42);
$sheet->getColumnDimension('D')->setWidth(40.30);
$sheet->getColumnDimension('E')->setWidth(96.30);
$sheet->getColumnDimension('F')->setWidth(7.14);
$sheet->getColumnDimension('G')->setWidth(10);
$sheet->getColumnDimension('H')->setWidth(19.71);
$sheet->getColumnDimension('I')->setWidth(15);
$sheet->getColumnDimension('J')->setWidth(14.19);

$sheet->setCellValue('A1', 'N° Vale');
$sheet->setCellValue('B1', 'Codigo');
$sheet->setCellValue('C1', 'Departamento');
$sheet->setCellValue('D1', 'Encargado');
$sheet->setCellValue('E1', 'Descriptión');
$sheet->setCellValue('F1', 'U/M');
$sheet->setCellValue('G1', 'Stock');
$sheet->setCellValue('H1', 'Cantidad Despachada');
$sheet->setCellValue('I1', 'Costo Unitario');
$sheet->setCellValue('J1', 'Fecha Registro');
if (isset($_POST['vale'])) {

    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale";
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
        if ($productos['idusuario']==0) {
            $u= 'Invitado';
        }
    	$sheet->setCellValue('A' .$fila, $productos['codVale']);
        $sheet->setCellValue('B' .$fila, $productos['codigo']);
    	$sheet->setCellValue('C' .$fila, $productos['departamento']);
    	$sheet->setCellValue('D' .$fila, $productos['usuario']." "."(".$u.")");
    	$sheet->setCellValue('E' .$fila, $productos['descripcion']);
    	$sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
    	$sheet->setCellValue('G' .$fila, $stock);
    	$sheet->setCellValue('H' .$fila, $productos['cantidad_despachada']);
        $sheet->setCellValue('I' .$fila, $productos['precio']);
        $sheet->setCellValue('J' .$fila, $productos['fecha_registro']);
    	$fila ++;
    	}
    }
    if (isset($_POST['vale1'])) {$idusuario=$_POST['idusuario'];
        $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE V.idusuario='$idusuario' ";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
        $precio=$productos['precio'];
        $precio2=number_format($precio, 2,".",",");
        $stock1=$productos['stock'];
        $stock=number_format($precio, 2,".",",");
        $sheet->setCellValue('A' .$fila, $productos['codVale']);
        $sheet->setCellValue('B' .$fila, $productos['codigo']);
        $sheet->setCellValue('C' .$fila, $productos['departamento']);
        $sheet->setCellValue('D' .$fila, $productos['usuario']);
        $sheet->setCellValue('E' .$fila, $productos['descripcion']);
        $sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
        $sheet->setCellValue('G' .$fila, $stock);
        $sheet->setCellValue('H' .$fila, $productos['precio']);
        $sheet->setCellValue('I' .$fila, $productos['fecha_registro']);
        $fila ++;
        }
    }
        $writer->save('Egreso Vale.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Egreso Vale.xlsx");
exit();