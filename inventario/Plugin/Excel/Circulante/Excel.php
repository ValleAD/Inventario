<?php
include '../../../Model/conexion.php';
require ' ../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$writer = new Xlsx($spreadsheet);
$sheet->getColumnDimension('A')->setWidth(16);
$sheet->getColumnDimension('B')->setWidth(12.14);



if (isset($_POST['circulante'])) {
$sheet->setCellValue('A1', 'No. de solicitud');
$sheet->setCellValue('B1', 'Fecha');
    $sql = "SELECT * FROM tb_circulante";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
        
           if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        if ($productos['idusuario']==0) {
            $u='Invitado';
        }
        $sheet->setCellValue('A' .$fila, $productos['codCirculante']);
        $sheet->setCellValue('B' .$fila, $productos['fecha_solicitud']);
        $fila ++;
        }
    if (isset($_POST['circulante1'])) {$idusuario=$_POST['idusuario'];
$sheet->setCellValue('A1', 'No. de solicitud');
$sheet->setCellValue('B1', 'Fecha');
        $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario' ";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
                   if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        if ($productos['idusuario']==0) {
            $u='Invitado';
        }
        $stock=number_format($precio, 2,".",",");
        $sheet->setCellValue('A' .$fila, $productos['codCirculante']);
        $sheet->setCellValue('B' .$fila, $productos['fecha_solicitud']);
        $fila ++;
        }
    }
    }
    if (isset($_POST['Consultar'])) {$tipo=$_POST['tipo'];$columna=$_POST['columna'];
$sheet->setCellValue('A2', 'No. de solicitud');
$sheet->setCellValue('B2', 'Fecha');
if ($tipo=="asc") {
    $tipo1= "Ordenado: Ascendente";
}
if ($tipo=="desc") {
    $tipo1= "Ordenado: Descendente";
}
$sheet->setCellValue('C1',$tipo1);
    $sql = "SELECT * FROM tb_circulante Order by $columna $tipo";
$result = mysqli_query($conn, $sql);
$fila = 3;

    while ($productos = mysqli_fetch_array($result)){
        
           if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        if ($productos['idusuario']==0) {
            $u='Invitado';
        }
        $sheet->setCellValue('A' .$fila, $productos['codCirculante']);
        $sheet->setCellValue('B' .$fila, $productos['fecha_solicitud']);
        $fila ++;
        }
    }
    if (isset($_POST['Consultar1'])) {$idusuario=$_POST['idusuario'];$tipo=$_POST['tipo'];$columna=$_POST['columna'];
$sheet->setCellValue('A2', 'No. de solicitud');
$sheet->setCellValue('B2', 'Fecha');
    if ($tipo=="asc") {
    $tipo1= "Ordenado: Ascendente";
}
if ($tipo=="desc") {
    $tipo1= "Ordenado: Descendente";
}
$sheet->setCellValue('C1',$tipo1);
        $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario' Order by $columna $tipo";
$result = mysqli_query($conn, $sql);
$fila = 3;

    while ($productos = mysqli_fetch_array($result)){
                   if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        if ($productos['idusuario']==0) {
            $u='Invitado';
        }
        $stock=number_format($precio, 2,".",",");
        $sheet->setCellValue('A' .$fila, $productos['codCirculante']);
        $sheet->setCellValue('B' .$fila, $productos['fecha_solicitud']);
        $fila ++;
        }
    }
        $writer->save('Solicitud Circulante.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Solicitud Circulante.xlsx");
exit();