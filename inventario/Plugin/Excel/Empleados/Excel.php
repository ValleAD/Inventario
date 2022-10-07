<?php
include '../../../Model/conexion.php';
require ' ../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$writer = new Xlsx($spreadsheet);
$sheet->getColumnDimension('A')->setWidth(15);
$sheet->getColumnDimension('B')->setWidth(37.57);
$sheet->getColumnDimension('C')->setWidth(46);
$sheet->getColumnDimension('D')->setWidth(20);

$sheet->setCellValue('A1', 'Usuario');
$sheet->setCellValue('B1', 'Nombre Completos');
$sheet->setCellValue('C1', 'Establecimiento');
$sheet->setCellValue('D1', 'Cuenta');
$sql="SELECT * FROM tb_usuarios";
$result = mysqli_query($conn, $sql);

$fila = 2;

    while ($productos = mysqli_fetch_array($result)){
    if ($productos['tipo_usuario']==1) {
            $u='Administrador';
    }else if($productos['tipo_usuario']==2){
        $u='Cliente';
    } if($productos['Habilitado']=="No"){
    $u='Cuenta Desabilitada';
}
    	$sheet->setCellValue('A' .$fila, $productos['username']);
    	$sheet->setCellValue('B' .$fila, $productos['firstname']." ".$productos['lastname']);
    	$sheet->setCellValue('C' .$fila, $productos['Establecimiento']);
    	$sheet->setCellValue('D' .$fila, $u);
    	$fila ++;
    	}
        $writer->save('Empleados.xlsx');
// Redireccionamos para que descargue el archivo generado
header("Location: Empleados.xlsx");
exit();