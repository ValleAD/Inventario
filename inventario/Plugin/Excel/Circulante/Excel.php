<?php
include '../../../Model/conexion.php';
require ' ../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\MemoryDrawing;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$writer = new Xlsx($spreadsheet);
$IMG = '../../../img/hospital1.png';
$IMG1 = '../../../img/log_1.png';
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

//styling arrays
//table head style
$tableHead = [
    'font'=>[
        'color'=>[
            'rgb'=>'FFFFFF'
        ],
        'bold'=>true,
        'size'=>11
    ],
    'fill'=>[
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => '343a40'
        ]
    ],
];
//even row
$evenRow = [
    'fill'=>[
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => '00BDFF'
        ]
    ]
];
//odd row
$oddRow = [
    'fill'=>[
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => '00EAFF'
        ]
    ]
];

//styling arrays end

//make a new spreadsheet object
$spreadsheet = new Spreadsheet();
//get current active sheet (first sheet)
$sheet = $spreadsheet->getActiveSheet();

//set default font
$spreadsheet->getDefaultStyle()
    ->getFont()
    ->setName('Arial')
    ->setSize(10);

//heading
$spreadsheet->getActiveSheet()
    ->setCellValue('A1',"MINISTERIO DE SALUD")
    ->setCellValue('A2',"HOSPITAL NACIONAL SANTA TERESA")
    ->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
    ->setCellValue('A4',"SOLICITUD DE MATERIALES");
//Tamaño de la letra
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(11);
$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(11);
$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(11);
$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setSize(11);

//Horientación
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);




//Unión de celdas
$spreadsheet->getActiveSheet()->mergeCells("A1:D1");
$spreadsheet->getActiveSheet()->mergeCells("A2:D2");
$spreadsheet->getActiveSheet()->mergeCells("A3:D3");
$spreadsheet->getActiveSheet()->mergeCells("A4:D4");



//setting column width
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(35);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(35);

//imagen
    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing->setName('Paid');
    $drawing->setDescription('Paid');
    $drawing->setPath($IMG); /* put your path and image here */
    $drawing->setCoordinates('A1');
    $drawing->setOffsetX(10);
    $drawing->setOffsetY(2);
    $drawing->setWidth(150);
    $drawing->getShadow()->setVisible(true);
    $drawing->setWorksheet($spreadsheet->getActiveSheet());
//imagen
$drawing1 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing1->setName('Paid');
    $drawing1->setDescription('Paid');
    $drawing1->setPath($IMG1); /* put your path and image here */
    $drawing1->setCoordinates('C1');
    $drawing1->setOffsetX(150);
    $drawing1->setOffsetY(10);
    $drawing1->setWidth(150);
    $drawing1->getShadow()->setVisible(true);
    $drawing1->getShadow()->setDirection(45);
    $drawing1->setWorksheet($spreadsheet->getActiveSheet());
//header text
$spreadsheet->getActiveSheet()
    ->setCellValue('B7',"No. Circulante")
    ->setCellValue('C7',"Fecha");

//set font style and background color
$spreadsheet->getActiveSheet()->getStyle('B7:C7')->applyFromArray($tableHead);
$fila=8; 
if (isset($_POST['circulante'])) {
    $sql = "SELECT * FROM tb_circulante";
$result = mysqli_query($conn, $sql);


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
$spreadsheet->getActiveSheet()->getStyle('B'. $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C'. $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('B' .$fila, $productos['codCirculante']);
        $sheet->setCellValue('C' .$fila, $productos['fecha_solicitud']);
        if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('B'.$fila.':C'.$fila)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('B'.$fila.':C'.$fila)->applyFromArray($oddRow);
    }
    //increment row
    $fila++;
        }
    }
    if (isset($_POST['circulante1'])) {$idusuario=$_POST['idusuario'];
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
$spreadsheet->getActiveSheet()->getStyle('B'. $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C'. $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $stock=number_format($precio, 2,".",",");
        $sheet->setCellValue('B' .$fila, $productos['codCirculante']);
        $sheet->setCellValue('C' .$fila, $productos['fecha_solicitud']);
        if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('B'.$fila.':C'.$fila)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('B'.$fila.':C'.$fila)->applyFromArray($oddRow);
    }
    //increment row
    $fila++;
        }
    }
    
    if (isset($_POST['Consultar'])) {$tipo=$_POST['tipo'];$columna=$_POST['columna'];
if ($tipo=="asc") {
    $tipo1= "Ordenado: Ascendente";
}
if ($tipo=="desc") {
    $tipo1= "Ordenado: Descendente";
}
    $sql = "SELECT * FROM tb_circulante Order by $columna $tipo";
$result = mysqli_query($conn, $sql);


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
$spreadsheet->getActiveSheet()->getStyle('B'. $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C'. $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('B' .$fila, $productos['codCirculante']);
        $sheet->setCellValue('C' .$fila, $productos['fecha_solicitud']);
        if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('B'.$fila.':C'.$fila)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('B'.$fila.':C'.$fila)->applyFromArray($oddRow);
    }
    //increment row
    $fila++;
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
        $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario' Order by $columna $tipo";
$result = mysqli_query($conn, $sql);

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
$spreadsheet->getActiveSheet()->getStyle('B'. $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C'. $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $stock=number_format($precio, 2,".",",");
        $sheet->setCellValue('B' .$fila, $productos['codCirculante']);
        $sheet->setCellValue('C' .$fila, $productos['fecha_solicitud']);
        if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('B'.$fila.':C'.$fila)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('B'.$fila.':C'.$fila)->applyFromArray($oddRow);
    }
    //increment row
    $fila++;
        }
    }
//autofilter
//define first row and last row
$firstRow=7;
$lastRow=$fila-1;
//set the autofilter
$spreadsheet->getActiveSheet()->setAutoFilter("B".$firstRow.":C".$lastRow);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Circulante.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();