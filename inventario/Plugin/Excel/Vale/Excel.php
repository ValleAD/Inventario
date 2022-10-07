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
$sheet->getColumnDimension('F')->setWidth(15.30);



if (isset($_POST['vale'])) {
$sheet->setCellValue('A1', 'No. Vale');
$sheet->setCellValue('B1', 'Departamento Solicitante');
$sheet->setCellValue('C1', 'Encargado');
$sheet->setCellValue('D1', 'Fecha');
    $sql = "SELECT * FROM tb_vale";
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
        $sheet->setCellValue('A' .$fila, $productos['codVale']);
        $sheet->setCellValue('B' .$fila, $productos['departamento']);
        $sheet->setCellValue('C' .$fila, $productos['usuario']." "."(".$u.")");
        $sheet->setCellValue('D' .$fila, $productos['fecha_registro']);
        $fila ++;
        }
    if (isset($_POST['vale1'])) {$idusuario=$_POST['idusuario'];
$sheet->setCellValue('A1', 'No. Vale');
$sheet->setCellValue('B1', 'Departamento Solicitante');
$sheet->setCellValue('C1', 'Encargado');
$sheet->setCellValue('D1', 'Fecha');
        $sql = "SELECT * FROM tb_vale WHERE idusuario='$idusuario' ";
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
        $sheet->setCellValue('A' .$fila, $productos['codVale']);
        $sheet->setCellValue('B' .$fila, $productos['departamento']);
        $sheet->setCellValue('C' .$fila, $productos['usuario']." "."(".$u.")");
        $sheet->setCellValue('D' .$fila, $productos['fecha_registro']);
        $fila ++;
        }
    }
    }
    if (isset($_POST['Consultar'])) {$tipo=$_POST['tipo'];$columna=$_POST['columna'];
$sheet->setCellValue('A2', 'No. Vale');
$sheet->setCellValue('B2', 'Departamento Solicitante');
$sheet->setCellValue('C2', 'Encargado');
$sheet->setCellValue('D2', 'Fecha');
if ($tipo=="asc") {
    $tipo1= "Ordenado: Ascendente";
}
if ($tipo=="desc") {
    $tipo1= "Ordenado: Descendente";
}
$sheet->setCellValue('E1',$tipo1);
    $sql = "SELECT * FROM tb_vale Order by $columna $tipo";
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
        $sheet->setCellValue('A' .$fila, $productos['codVale']);
        $sheet->setCellValue('B' .$fila, $productos['departamento']);
        $sheet->setCellValue('C' .$fila, $productos['usuario']." "."(".$u.")");
        $sheet->setCellValue('D' .$fila, $productos['fecha_registro']);
        $fila ++;
        }
    }
    if (isset($_POST['Consultar1'])) {$idusuario=$_POST['idusuario'];$tipo=$_POST['tipo'];$columna=$_POST['columna'];
$sheet->setCellValue('A2', 'No. Vale');
$sheet->setCellValue('B2', 'Departamento Solicitante');
$sheet->setCellValue('C2', 'Encargado');
$sheet->setCellValue('D2', 'Fecha');
    if ($tipo=="asc") {
    $tipo1= "Ordenado: Ascendente";
}
if ($tipo=="desc") {
    $tipo1= "Ordenado: Descendente";
}
$sheet->setCellValue('E1',$tipo1);
        $sql = "SELECT * FROM tb_vale WHERE idusuario='$idusuario' Order by $columna $tipo";
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
        $sheet->setCellValue('A' .$fila, $productos['codVale']);
        $sheet->setCellValue('B' .$fila, $productos['departamento']);
        $sheet->setCellValue('C' .$fila, $productos['usuario']." "."(".$u.")");
        $sheet->setCellValue('D' .$fila, $productos['fecha_registro']);
        $fila ++;
        }
    }
        $writer->save('Solicitud Vale.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Solicitud Vale.xlsx");
exit();