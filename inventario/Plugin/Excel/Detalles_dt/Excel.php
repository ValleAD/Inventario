<?php
include '../../../Model/conexion.php';
require ' ../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$writer = new Xlsx($spreadsheet);

$sheet->getColumnDimension('A')->setWidth(10);
$sheet->getColumnDimension('B')->setWidth(37);
$sheet->getColumnDimension('C')->setWidth(9);
$sheet->getColumnDimension('D')->setWidth(19);
$sheet->getColumnDimension('E')->setWidth(21);
$sheet->getColumnDimension('F')->setWidth(15);

$sheet->setCellValue('A2', 'Código');
$sheet->setCellValue('B2', 'Descriptión');
$sheet->setCellValue('C2', 'U/M');
$sheet->setCellValue('D2', 'cantidad_solicitada');
$sheet->setCellValue('E2', 'cantidad_despachada');
$sheet->setCellValue('F2', 'Costo Unitario');
$sheet->setCellValue('G2', 'Total');
$sheet->setCellValue('F1', 'SubTotal');


$fila = 3;
if (isset($_POST['detalle'])) {
         $total = 0;
        $final = 0;
    for($i = 0; $i < count($_POST['cod']); $i++)
    {
       
        $codigo = $_POST['cod'][$i];
        $des = $_POST['desc'][$i];
        $um = $_POST['um'][$i];
        $cantidad = $_POST['cant'][$i];
        $cost = $_POST['cost'][$i];
        $stock = $_POST['cantidad_despachada'][$i];
        $tot = $_POST['tot'][$i];
        $tot_f = $_POST['tot_f'];

        $sheet->setCellValue('A' .$fila, $codigo);
        $sheet->setCellValue('B' .$fila, $des);
        $sheet->setCellValue('C' .$fila, $um);
        $sheet->setCellValue('D' .$fila, $cantidad);
        $sheet->setCellValue('E' .$fila, $stock);
        $sheet->setCellValue('F' .$fila, $cost);
        $sheet->setCellValue('G' .$fila, $tot);
        $sheet->setCellValue('G1' , $tot_f);
        $fila ++;
        }
 $writer->save('Detalle Vale.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Detalle Vale.xlsx");
exit();
    }
    if (isset($_POST['DT'])) {
         $total = 0;
        $final = 0;
    for($i = 0; $i < count($_POST['cod']); $i++)
    {
       
        $codigo = $_POST['cod'][$i];
        $des = $_POST['desc'][$i];
        $um = $_POST['um'][$i];
        $cantidad = $_POST['cant'][$i];
        $cost = $_POST['cost'][$i];
        $stock = $_POST['cantidad_despachada'][$i];
        $tot = $_POST['tot'][$i];
        $tot_f = $_POST['tot_f'];

        $sheet->setCellValue('A' .$fila, $codigo);
        $sheet->setCellValue('B' .$fila, $des);
        $sheet->setCellValue('C' .$fila, $um);
        $sheet->setCellValue('D' .$fila, $cantidad);
        $sheet->setCellValue('E' .$fila, $stock);
        $sheet->setCellValue('F' .$fila, $cost);
        $sheet->setCellValue('G' .$fila, $tot);
        $sheet->setCellValue('G1' , $tot_f);
        $fila ++;
        }
 $writer->save('DT Vale.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: DT Vale.xlsx");
exit();
    }
    if (isset($_POST['detalle_bodega'])) {
         $total = 0;
        $final = 0;
    for($i = 0; $i < count($_POST['cod']); $i++)
    {
       
        $codigo = $_POST['cod'][$i];
        $des = $_POST['desc'][$i];
        $um = $_POST['um'][$i];
        $cantidad = $_POST['cant'][$i];
        $cost = $_POST['cost'][$i];
        $stock = $_POST['cantidad_despachada'][$i];
        $tot = $_POST['tot'][$i];
        $tot_f = $_POST['tot_f'];

        $sheet->setCellValue('A' .$fila, $codigo);
        $sheet->setCellValue('B' .$fila, $des);
        $sheet->setCellValue('C' .$fila, $um);
        $sheet->setCellValue('D' .$fila, $cantidad);
        $sheet->setCellValue('E' .$fila, $stock);
        $sheet->setCellValue('F' .$fila, $cost);
        $sheet->setCellValue('G' .$fila, $tot);
        $sheet->setCellValue('G1' ,$tot_f);
        $fila ++;
        }
 $writer->save('Detalle Bodega.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Detalle Bodega.xlsx");
exit();
    }
    if (isset($_POST['dt_bodega'])) {
        $fila=2;
         $total = 0;
        $final = 0;
    for($i = 0; $i < count($_POST['cod']); $i++)
    {
       
        $codigo = $_POST['cod'][$i];
        $des = $_POST['desc'][$i];
        $um = $_POST['um'][$i];
        $cantidad = $_POST['cant'][$i];
        $cost = $_POST['cost'][$i];
        $stock = $_POST['cantidad_despachada'][$i];
        $tot = $_POST['tot'][$i];
        $tot_f = $_POST['tot_f'];

        $sheet->setCellValue('A' .$fila, $codigo);
        $sheet->setCellValue('B' .$fila, $des);
        $sheet->setCellValue('C' .$fila, $um);
        $sheet->setCellValue('D' .$fila, $cantidad);
        $sheet->setCellValue('E' .$fila, $stock);
        $sheet->setCellValue('F' .$fila, $cost);
        $sheet->setCellValue('G' .$fila, $tot);
        $sheet->setCellValue('G1' .$fila, $tot_f);
        $fila ++;
        }

 $writer->save('DT Bodega.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: DT Bodega.xlsx");
exit();
    }
    if (isset($_POST['detalle_almacen'])) {
         $total = 0;
        $final = 0;
    for($i = 0; $i < count($_POST['cod']); $i++)
    {
       
        $codigo = $_POST['cod'][$i];
        $des = $_POST['desc'][$i];
        $um = $_POST['um'][$i];
        $cantidad = $_POST['cant'][$i];
        $cost = $_POST['cost'][$i];
        $stock = $_POST['cantidad_despachada'][$i];
        $tot = $_POST['tot'][$i];
        $tot_f = $_POST['tot_f'];

        $sheet->setCellValue('A' .$fila, $codigo);
        $sheet->setCellValue('B' .$fila, $des);
        $sheet->setCellValue('C' .$fila, $um);
        $sheet->setCellValue('D' .$fila, $cantidad);
        $sheet->setCellValue('E' .$fila, $stock);
        $sheet->setCellValue('F' .$fila, $cost);
        $sheet->setCellValue('G' .$fila, $tot);
        $sheet->setCellValue('G1' ,$tot_f);
        $fila ++;
        }
 $writer->save('Detalle Almacen.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Detalle Almacen.xlsx");
exit();
    }
    if (isset($_POST['dt_almacen'])) {
        $fila=2;
         $total = 0;
        $final = 0;
    for($i = 0; $i < count($_POST['cod']); $i++)
    {
       
        $codigo = $_POST['cod'][$i];
        $des = $_POST['desc'][$i];
        $um = $_POST['um'][$i];
        $cantidad = $_POST['cant'][$i];
        $cost = $_POST['cost'][$i];
        $stock = $_POST['cantidad_despachada'][$i];
        $tot = $_POST['tot'][$i];
        $tot_f = $_POST['tot_f'];

        $sheet->setCellValue('A' .$fila, $codigo);
        $sheet->setCellValue('B' .$fila, $des);
        $sheet->setCellValue('C' .$fila, $um);
        $sheet->setCellValue('D' .$fila, $cantidad);
        $sheet->setCellValue('E' .$fila, $stock);
        $sheet->setCellValue('F' .$fila, $cost);
        $sheet->setCellValue('G' .$fila, $tot);
        $sheet->setCellValue('G1' .$fila, $tot_f);
        $fila ++;
        }

 $writer->save('DT Almacen.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: DT Almacen.xlsx");
exit();
    }
    

