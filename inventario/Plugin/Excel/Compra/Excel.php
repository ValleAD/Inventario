<?php
include '../../../Model/conexion.php';
require ' ../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$writer = new Xlsx($spreadsheet);
$sheet->getColumnDimension('A')->setWidth(16);
$sheet->getColumnDimension('B')->setWidth(16);
$sheet->getColumnDimension('C')->setWidth(22);
$sheet->getColumnDimension('D')->setWidth(16);
$sheet->getColumnDimension('E')->setWidth(20);
$sheet->getColumnDimension('F')->setWidth(41);
$sheet->getColumnDimension('G')->setWidth(11);
$sheet->getColumnDimension('H')->setWidth(11);



if (isset($_POST['compra'])) {
$sheet->setCellValue('A1', 'No. de solicitud');
$sheet->setCellValue('B1', 'Dependencia');
$sheet->setCellValue('C1', 'Plazo y No. de Entregas');
$sheet->setCellValue('D1', 'Unidad Técnica');
$sheet->setCellValue('E1', 'Descripción Solicitud');
$sheet->setCellValue('F1', 'Encargado');
$sheet->setCellValue('G1', 'Estado');
$sheet->setCellValue('H1', 'Fecha');
    $sql = "SELECT * FROM tb_compra";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
        
           if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
    
        $sheet->setCellValue('A' .$fila, $productos['nSolicitud']);
        $sheet->setCellValue('B' .$fila, $productos['dependencia']);
        $sheet->setCellValue('C' .$fila, $productos['plazo']);
        $sheet->setCellValue('D' .$fila, $productos['unidad_tecnica']);
        $sheet->setCellValue('E' .$fila, $productos['descripcion_solicitud']);
        $sheet->setCellValue('F' .$fila, $productos['usuario']." "."(".$u.")");
        $sheet->setCellValue('G' .$fila, $productos['estado']);
        $sheet->setCellValue('H' .$fila, $productos['fecha_registro']);
        $fila ++;
        }
    if (isset($_POST['compra1'])) {$idusuario=$_POST['idusuario'];
$sheet->setCellValue('A1', 'No. de solicitud');
$sheet->setCellValue('B1', 'Dependencia');
$sheet->setCellValue('C1', 'Plazo y No. de Entregas');
$sheet->setCellValue('D1', 'Unidad Técnica');
$sheet->setCellValue('E1', 'Descripción Solicitud');
$sheet->setCellValue('F1', 'Encargado');
$sheet->setCellValue('G1', 'Estado');
$sheet->setCellValue('H1', 'Fecha');
        $sql = "SELECT * FROM tb_compra WHERE idusuario='$idusuario' ";
$result = mysqli_query($conn, $sql);
$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
                   if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
    
        $sheet->setCellValue('A' .$fila, $productos['nSolicitud']);
        $sheet->setCellValue('B' .$fila, $productos['dependencia']);
        $sheet->setCellValue('C' .$fila, $productos['plazo']);
        $sheet->setCellValue('D' .$fila, $productos['unidad_tecnica']);
        $sheet->setCellValue('E' .$fila, $productos['descripcion_solicitud']);
        $sheet->setCellValue('F' .$fila, $productos['usuario']." "."(".$u.")");
        $sheet->setCellValue('G' .$fila, $productos['estado']);
        $sheet->setCellValue('H' .$fila, $productos['fecha_registro']);
        $fila ++;
        }
    }
    }
    if (isset($_POST['Consultar'])) {$tipo=$_POST['tipo'];$columna=$_POST['columna'];
$sheet->setCellValue('A2', 'No. de solicitud');
$sheet->setCellValue('B2', 'Dependencia');
$sheet->setCellValue('C2', 'Plazo y No. de Entregas');
$sheet->setCellValue('D2', 'Unidad Técnica');
$sheet->setCellValue('E2', 'Descripción Solicitud');
$sheet->setCellValue('F2', 'Encargado');
$sheet->setCellValue('G2', 'Estado');
$sheet->setCellValue('H2', 'Fecha');
if ($tipo=="asc") {
    $tipo1= "Ordenado: Ascendente";
}
if ($tipo=="desc") {
    $tipo1= "Ordenado: Descendente";
}
$sheet->setCellValue('I1',$tipo1);
    $sql = "SELECT * FROM tb_compra Order by $columna $tipo";
$result = mysqli_query($conn, $sql);
$fila = 3;

    while ($productos = mysqli_fetch_array($result)){
        
           if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
    
        $sheet->setCellValue('A' .$fila, $productos['nSolicitud']);
        $sheet->setCellValue('B' .$fila, $productos['dependencia']);
        $sheet->setCellValue('C' .$fila, $productos['plazo']);
        $sheet->setCellValue('D' .$fila, $productos['unidad_tecnica']);
        $sheet->setCellValue('E' .$fila, $productos['descripcion_solicitud']);
        $sheet->setCellValue('F' .$fila, $productos['usuario']." "."(".$u.")");
        $sheet->setCellValue('G' .$fila, $productos['estado']);
        $sheet->setCellValue('H' .$fila, $productos['fecha_registro']);
        $fila ++;
        }
    }
    if (isset($_POST['Consultar1'])) {$idusuario=$_POST['idusuario'];$tipo=$_POST['tipo'];$columna=$_POST['columna'];
$sheet->setCellValue('A2', 'No. de solicitud');
$sheet->setCellValue('B2', 'Dependencia');
$sheet->setCellValue('C2', 'Plazo y No. de Entregas');
$sheet->setCellValue('D2', 'Unidad Técnica');
$sheet->setCellValue('E2', 'Descripción Solicitud');
$sheet->setCellValue('F2', 'Encargado');
$sheet->setCellValue('G2', 'Estado');
$sheet->setCellValue('H2', 'Fecha');
    if ($tipo=="asc") {
    $tipo1= "Ordenado: Ascendente";
}
if ($tipo=="desc") {
    $tipo1= "Ordenado: Descendente";
}
$sheet->setCellValue('I1',$tipo1);
        $sql = "SELECT * FROM tb_compra WHERE idusuario='$idusuario' Order by $columna $tipo";
$result = mysqli_query($conn, $sql);
$fila = 3;

    while ($productos = mysqli_fetch_array($result)){
                   if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        $sheet->setCellValue('A' .$fila, $productos['nSolicitud']);
        $sheet->setCellValue('B' .$fila, $productos['dependencia']);
        $sheet->setCellValue('C' .$fila, $productos['plazo']);
        $sheet->setCellValue('D' .$fila, $productos['unidad_tecnica']);
        $sheet->setCellValue('E' .$fila, $productos['descripcion_solicitud']);
        $sheet->setCellValue('F' .$fila, $productos['usuario']." "."(".$u.")");
        $sheet->setCellValue('G' .$fila, $productos['estado']);
        $sheet->setCellValue('H' .$fila, $productos['fecha_registro']);
        $fila ++;
        }
    }
        $writer->save('Solicitud de Compra.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Solicitud de Compra.xlsx");
exit();