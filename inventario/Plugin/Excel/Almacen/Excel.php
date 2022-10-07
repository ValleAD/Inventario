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
$sheet->getColumnDimension('C')->setWidth(44);
$sheet->getColumnDimension('D')->setWidth(12.30);
$sheet->getColumnDimension('E')->setWidth(10.30);



if (isset($_POST['almacen'])) {
$sheet->setCellValue('A1', 'No. de solicitud');
$sheet->setCellValue('B1', 'Departamento Solicitante');
$sheet->setCellValue('C1', 'Encargado');
$sheet->setCellValue('D1', 'Estado');
$sheet->setCellValue('E1', 'Fecha');
    $sql = "SELECT * FROM tb_almacen";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
        
           if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
    
        $sheet->setCellValue('A' .$fila, $productos['codAlmacen']);
        $sheet->setCellValue('B' .$fila, $productos['departamento']);
        $sheet->setCellValue('C' .$fila, $productos['encargado']." "."(".$u.")");
        $sheet->setCellValue('D' .$fila, $productos['estado']);
        $sheet->setCellValue('E' .$fila, $productos['fecha_solicitud']);
        $fila ++;
        }
    if (isset($_POST['almacen1'])) {$idusuario=$_POST['idusuario'];
$sheet->setCellValue('A1', 'No. de solicitud');
$sheet->setCellValue('B1', 'Departamento Solicitante');
$sheet->setCellValue('C1', 'Encargado');
$sheet->setCellValue('D1', 'Estado');
$sheet->setCellValue('E1', 'Fecha');
        $sql = "SELECT * FROM tb_almacen WHERE idusuario='$idusuario' ";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
                   if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
    
        $sheet->setCellValue('A' .$fila, $productos['codAlmacen']);
        $sheet->setCellValue('B' .$fila, $productos['departamento']);
        $sheet->setCellValue('C' .$fila, $productos['encargado']." "."(".$u.")");
        $sheet->setCellValue('D' .$fila, $productos['estado']);
        $sheet->setCellValue('E' .$fila, $productos['fecha_solicitud']);
        $fila ++;
        }
    }
    }
    if (isset($_POST['Consultar'])) {$tipo=$_POST['tipo'];$columna=$_POST['columna'];
$sheet->setCellValue('A2', 'No. de solicitud');
$sheet->setCellValue('B2', 'Departamento Solicitante');
$sheet->setCellValue('C2', 'Encargado');
$sheet->setCellValue('D2', 'Estado');
$sheet->setCellValue('E2', 'Fecha');
if ($tipo=="asc") {
    $tipo1= "Ordenado: Ascendente";
}
if ($tipo=="desc") {
    $tipo1= "Ordenado: Descendente";
}
$sheet->setCellValue('E1',$tipo1);
    $sql = "SELECT * FROM tb_almacen Order by $columna $tipo";
$result = mysqli_query($conn, $sql);
$fila = 3;

    while ($productos = mysqli_fetch_array($result)){
        
           if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
    
        $sheet->setCellValue('A' .$fila, $productos['codAlmacen']);
        $sheet->setCellValue('B' .$fila, $productos['departamento']);
        $sheet->setCellValue('C' .$fila, $productos['encargado']." "."(".$u.")");
        $sheet->setCellValue('D' .$fila, $productos['estado']);
        $sheet->setCellValue('E' .$fila, $productos['fecha_solicitud']);
        $fila ++;
        }
    }
    if (isset($_POST['Consultar1'])) {$idusuario=$_POST['idusuario'];$tipo=$_POST['tipo'];$columna=$_POST['columna'];
$sheet->setCellValue('A2', 'No. de solicitud');
$sheet->setCellValue('B2', 'Departamento Solicitante');
$sheet->setCellValue('C2', 'Encargado');
$sheet->setCellValue('D2', 'Estado');
$sheet->setCellValue('E2', 'Fecha');
    if ($tipo=="asc") {
    $tipo1= "Ordenado: Ascendente";
}
if ($tipo=="desc") {
    $tipo1= "Ordenado: Descendente";
}
$sheet->setCellValue('E1',$tipo1);
        $sql = "SELECT * FROM tb_almacen WHERE idusuario='$idusuario' Order by $columna $tipo";
$result = mysqli_query($conn, $sql);
$fila = 3;

    while ($productos = mysqli_fetch_array($result)){
                   if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        $sheet->setCellValue('A' .$fila, $productos['codAlmacen']);
        $sheet->setCellValue('B' .$fila, $productos['departamento']);
        $sheet->setCellValue('C' .$fila, $productos['encargado']." "."(".$u.")");
        $sheet->setCellValue('D' .$fila, $productos['estado']);
        $sheet->setCellValue('E' .$fila, $productos['fecha_solicitud']);
        $fila ++;
        }
    }
        $writer->save('Solicitud Almacen.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Solicitud Almacen.xlsx");
exit();