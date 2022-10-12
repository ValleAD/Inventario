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
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);
$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(16);
$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setSize(14);

//Horientación
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('B6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
$spreadsheet->getActiveSheet()->getStyle('B7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
$spreadsheet->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

$spreadsheet->getActiveSheet()->getStyle('G6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
$spreadsheet->getActiveSheet()->getStyle('G7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
$spreadsheet->getActiveSheet()->getStyle('G8')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

$spreadsheet->getActiveSheet()->getStyle('E6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
$spreadsheet->getActiveSheet()->getStyle('E7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
$spreadsheet->getActiveSheet()->getStyle('E8')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

$spreadsheet->getActiveSheet()->getStyle('I1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
$spreadsheet->getActiveSheet()->getStyle('I2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

//Unión de celdas
$spreadsheet->getActiveSheet()->mergeCells("A1:G1");
$spreadsheet->getActiveSheet()->mergeCells("A2:G2");
$spreadsheet->getActiveSheet()->mergeCells("A3:G3");
$spreadsheet->getActiveSheet()->mergeCells("A4:G4");



//setting column width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(12);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(33.15);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(12);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(17);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(17);
//imagen
    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing->setName('Paid');
    $drawing->setDescription('Paid');
    $drawing->setPath($IMG); /* put your path and image here */
    $drawing->setCoordinates('A1');
    $drawing->setOffsetX(50);
    $drawing->setOffsetY(2);
    $drawing->setWidth(150);
    $drawing->getShadow()->setVisible(true);
    $drawing->setWorksheet($spreadsheet->getActiveSheet());
//imagen
$drawing1 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing1->setName('Paid');
    $drawing1->setDescription('Paid');
    $drawing1->setPath($IMG1); /* put your path and image here */
    $drawing1->setCoordinates('F1');
    $drawing1->setOffsetX(50);
    $drawing1->setOffsetY(10);
    $drawing1->setWidth(150);
    $drawing1->getShadow()->setVisible(true);
    $drawing1->getShadow()->setDirection(45);
    $drawing1->setWorksheet($spreadsheet->getActiveSheet());


//header text
$spreadsheet->getActiveSheet()
    ->setCellValue('A11',"Código")
    ->setCellValue('B11',"Descripción")
    ->setCellValue('C11',"U/M")
    ->setCellValue('D11',"Cant. Solicitada")
    ->setCellValue('E11',"Cant. Depachada")
    ->setCellValue('F11',"Cost Unitario")
    ->setCellValue('G11',"Total")
    ->setCellValue('F10',"SubTotal");

//set font style and background color
$spreadsheet->getActiveSheet()->getStyle('A11:G11')->applyFromArray($tableHead);

$spreadsheet->getActiveSheet()->getPageSetup()
->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

$spreadsheet->getActiveSheet()->getStyle('A11')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B11')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C11')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D11')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E11')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F11')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('G11')->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('A11')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B11')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C11')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D11')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E11')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F11')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G11')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('A11')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B11')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C11')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D11')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E11')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F11')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G11')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$row=12;
if (isset($_POST['detalle'])) {
     $total = 0;
        $final = 0;
    $depto = $_POST['depto'];
    $jus=$_POST['jus'];
    $fech = $_POST['fech'];
    $encargado = $_POST['usuario'];
     $vale = $_POST['vale'];
     $estado=$_POST['estado'];
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


$spreadsheet->getActiveSheet()->getStyle('A' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        $sheet->setCellValue('A6' , "N° Vale");
        $sheet->setCellValue('A7' , "Departamento");
        $sheet->setCellValue('A8' , "Encargado");
        $sheet->setCellValue('F6' , "Fecha");
        $sheet->setCellValue('F7' , "Estado");

        $sheet->setCellValue('B6' , $vale);
        $sheet->setCellValue('B7' , $depto);
        $sheet->setCellValue('B8' , $encargado);
        $sheet->setCellValue('G6' , $fech);
        $sheet->setCellValue('G7' , $estado);

        $sheet->setCellValue('A' .$row, $codigo);
        $sheet->setCellValue('B' .$row, $des);
        $sheet->setCellValue('C' .$row, $um);
        $sheet->setCellValue('D' .$row, $cantidad);
        $sheet->setCellValue('E' .$row, $stock);
        $sheet->setCellValue('F' .$row, $cost);
        $sheet->setCellValue('G' .$row, $tot);
        $sheet->setCellValue('G10' , $tot_f);
        //Justificación
        $sheet->setCellValue('I1' , "Observaciones (En qué se ocupará el bien entregado)");
        $sheet->setCellValue('I2' , $jus);

        $sheet->setCellValue('I4' , "F. ______________________");
        $sheet->setCellValue('N6' , "F. ______________________");
        $sheet->setCellValue('R4' , "F. ______________________");
       
    //set row style
    if( $row % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($oddRow);
    }
    //increment row
    $row++;
}

//autofilter
//define first row and last row
$firstRow=11;
$lastRow=$row-1;
//set the autofilter
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":G".$lastRow);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Detalle Vale.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
}

if (isset($_POST['DT'])) {
     $total = 0;
        $final = 0;
    $depto = $_POST['depto'];
    $jus=$_POST['jus'];
    $fech = $_POST['fech'];
    $encargado = $_POST['usuario'];
     $vale = $_POST['vale'];
     $estado=$_POST['estado'];
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

$spreadsheet->getActiveSheet()->getStyle('A' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


        $sheet->setCellValue('A6' , "N° Vale");
        $sheet->setCellValue('A7' , "Departamento");
        $sheet->setCellValue('A8' , "Encargado");
        $sheet->setCellValue('F6' , "Fecha");
        $sheet->setCellValue('F7' , "Estado");

        $sheet->setCellValue('B6' , $vale);
        $sheet->setCellValue('B7' , $depto);
        $sheet->setCellValue('B8' , $encargado);
        $sheet->setCellValue('G6' , $fech);
        $sheet->setCellValue('G7' , $estado);

        $sheet->setCellValue('A' .$row, $codigo);
        $sheet->setCellValue('B' .$row, $des);
        $sheet->setCellValue('C' .$row, $um);
        $sheet->setCellValue('D' .$row, $cantidad);
        $sheet->setCellValue('E' .$row, $stock);
        $sheet->setCellValue('F' .$row, $cost);
        $sheet->setCellValue('G' .$row, $tot);
        $sheet->setCellValue('G10' , $tot_f);
        //Justificación
        $sheet->setCellValue('I1' , "Observaciones (En qué se ocupará el bien entregado)");
        $sheet->setCellValue('I2' , $jus);

        $sheet->setCellValue('I4' , "F. ______________________");
        $sheet->setCellValue('N6' , "F. ______________________");
        $sheet->setCellValue('R4' , "F. ______________________");
       
    //set row style
    if( $row % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($oddRow);
    }
    //increment row
    $row++;
}

//autofilter
//define first row and last row
$firstRow=11;
$lastRow=$row-1;
//set the autofilter
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":G".$lastRow);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="DT Vale.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
}

if (isset($_POST['detalle_bodega'])) {
     $total = 0;
        $final = 0;
    $depto = $_POST['depto'];
    $fech = $_POST['fech'];
    $encargado = $_POST['usuario'];
     $vale = $_POST['bodega'];
     $estado=$_POST['estado'];
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

$spreadsheet->getActiveSheet()->getStyle('A' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


        $sheet->setCellValue('A6' , "N° Vale");
        $sheet->setCellValue('A7' , "Departamento");
        $sheet->setCellValue('A8' , "Encargado");
        $sheet->setCellValue('F6' , "Fecha");
        $sheet->setCellValue('F7' , "Estado");

        $sheet->setCellValue('B6' , $vale);
        $sheet->setCellValue('B7' , $depto);
        $sheet->setCellValue('B8' , $encargado);
        $sheet->setCellValue('G6' , $fech);
        $sheet->setCellValue('G7' , $estado);

        $sheet->setCellValue('A' .$row, $codigo);
        $sheet->setCellValue('B' .$row, $des);
        $sheet->setCellValue('C' .$row, $um);
        $sheet->setCellValue('D' .$row, $cantidad);
        $sheet->setCellValue('E' .$row, $stock);
        $sheet->setCellValue('F' .$row, $cost);
        $sheet->setCellValue('G' .$row, $tot);
        $sheet->setCellValue('G10' , $tot_f);
       
    //set row style
    if( $row % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($oddRow);
    }
    //increment row
    $row++;
}

//autofilter
//define first row and last row
$firstRow=11;
$lastRow=$row-1;
//set the autofilter
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":G".$lastRow);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Detalle Bodega.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
}

if (isset($_POST['dt_bodega'])) {
     $total = 0;
        $final = 0;
    $depto = $_POST['depto'];
    $fech = $_POST['fech'];
    $encargado = $_POST['usuario'];
     $vale = $_POST['vale'];
     $estado=$_POST['estado'];
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

$spreadsheet->getActiveSheet()->getStyle('A' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        $sheet->setCellValue('A6' , "N° Vale");
        $sheet->setCellValue('A7' , "Departamento");
        $sheet->setCellValue('A8' , "Encargado");
        $sheet->setCellValue('F6' , "Fecha");
        $sheet->setCellValue('F7' , "Estado");

        $sheet->setCellValue('B6' , $vale);
        $sheet->setCellValue('B7' , $depto);
        $sheet->setCellValue('B8' , $encargado);
        $sheet->setCellValue('G6' , $fech);
        $sheet->setCellValue('G7' , $estado);

        $sheet->setCellValue('A' .$row, $codigo);
        $sheet->setCellValue('B' .$row, $des);
        $sheet->setCellValue('C' .$row, $um);
        $sheet->setCellValue('D' .$row, $cantidad);
        $sheet->setCellValue('E' .$row, $stock);
        $sheet->setCellValue('F' .$row, $cost);
        $sheet->setCellValue('G' .$row, $tot);
        $sheet->setCellValue('G10' , $tot_f);
       
    //set row style
    if( $row % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($oddRow);
    }
    //increment row
    $row++;
}

//autofilter
//define first row and last row
$firstRow=11;
$lastRow=$row-1;
//set the autofilter
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":G".$lastRow);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="DT Bodega.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
}

if (isset($_POST['detalle_compra'])) {
     $total = 0;
        $final = 0;
   $solicitud = $_POST['sol_compra'];
    $dependencia = $_POST['dependencia'];
    $plazo = $_POST['plazo'];
    $unidad = $_POST['unidad'];
    $suministro = $_POST['suministro'];
    $usuario = $_POST['usuario'];
    $fecha = $_POST['fech'];
    $fech_imp = $_POST['fech_imp'];
    $estado=$_POST['estado'];

      if ($_POST['jus']=="") {
    $jus = "Sin Justificación por el momento";
        
    }else{
    $jus = $_POST['jus'];
      }
      
    for($i = 0; $i < count($_POST['cod']); $i++)
    {
       
    $codigo = $_POST['cod'][$i];
    $des = $_POST['desc'][$i];
    $um = $_POST['um'][$i];
    $cantidad = $_POST['cant'][$i];
    $stock = $_POST['cantidad_despachada'][$i];
    $cost = $_POST['cost'][$i];
    $tot = $_POST['tot'][$i];

    $tot_f = $_POST['tot_f'];

$spreadsheet->getActiveSheet()->getStyle('A' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


        $sheet->setCellValue('A6' , "Solicitud No");
        $sheet->setCellValue('A7' , "Unidad");
        $sheet->setCellValue('A8' , "Estado");

        $sheet->setCellValue('C6' , "Depenencia Solicitante");
        $sheet->setCellValue('C7' , "Suministro Solicitado");
        $sheet->setCellValue('C8' , "Fecha De Creación");

        $sheet->setCellValue('F6' , "Plazo y No. de Entregas");
        $sheet->setCellValue('F7' , "Encargado");
        $sheet->setCellValue('F8' , "Fecha De Impreción");

        $sheet->setCellValue('B6' , $solicitud);
        $sheet->setCellValue('B7' , $dependencia);
        $sheet->setCellValue('B8' , $estado);

        $sheet->setCellValue('G6' , $plazo);
        $sheet->setCellValue('G7' , $usuario);
        $sheet->setCellValue('G8' , $fech_imp);

        $sheet->setCellValue('E6' , $dependencia);
        $sheet->setCellValue('E7' , $suministro);
        $sheet->setCellValue('E8' , $fecha);

        $sheet->setCellValue('A' .$row, $codigo);
        $sheet->setCellValue('B' .$row, $des);
        $sheet->setCellValue('C' .$row, $um);
        $sheet->setCellValue('D' .$row, $cantidad);
        $sheet->setCellValue('E' .$row, $stock);
        $sheet->setCellValue('F' .$row, $cost);
        $sheet->setCellValue('G' .$row, $tot);
        $sheet->setCellValue('G10' , $tot_f);

                //Justificación
        $sheet->setCellValue('I1' , "Observaciones (En qué se ocupará el bien entregado)");
        $sheet->setCellValue('I2' , $jus);

        $sheet->setCellValue('I4' , "F. ______________________");
        $sheet->setCellValue('N6' , "F. ______________________");
        $sheet->setCellValue('R4' , "F. ______________________");
       
    //set row style
    if( $row % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($oddRow);
    }
    //increment row
    $row++;
}

//autofilter
//define first row and last row
$firstRow=11;
$lastRow=$row-1;
//set the autofilter
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":G".$lastRow);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Detalle Compra.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
}

if (isset($_POST['dt_compra'])) {
    $total = 0;
        $final = 0;
   $solicitud = $_POST['sol_compra'];
    $dependencia = $_POST['dependencia'];
    $plazo = $_POST['plazo'];
    $unidad = $_POST['unidad'];
    $suministro = $_POST['suministro'];
    $usuario = $_POST['usuario'];
    $fecha = $_POST['fech'];
    $estado=$_POST['estado'];

      if ($_POST['jus']=="") {
    $jus = "Sin Justificación por el momento";
        
    }else{
    $jus = $_POST['jus'];
      }
      
    for($i = 0; $i < count($_POST['cod']); $i++)
    {
       
    $codigo = $_POST['cod'][$i];
    $des = $_POST['desc'][$i];
    $um = $_POST['um'][$i];
    $cantidad = $_POST['cant'][$i];
    $stock = $_POST['cantidad_despachada'][$i];
    $cost = $_POST['cost'][$i];
    $tot = $_POST['tot'][$i];

    $tot_f = $_POST['tot_f'];

$spreadsheet->getActiveSheet()->getStyle('A' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        $sheet->setCellValue('A6' , "Solicitud No");
        $sheet->setCellValue('A7' , "Unidad");
        $sheet->setCellValue('A8' , "Estado");

        $sheet->setCellValue('C6' , "Depenencia Solicitante");
        $sheet->setCellValue('C7' , "Suministro Solicitado");
        $sheet->setCellValue('C8' , "Fecha De Creación");

        $sheet->setCellValue('D6' , "Plazo y No. de Entregas");
        $sheet->setCellValue('D7' , "Encargado");
        $sheet->setCellValue('D8' , "Fecha De Impreción");

        $sheet->setCellValue('B6' , $solicitud);
        $sheet->setCellValue('B7' , $dependencia);
        $sheet->setCellValue('B8' , $plazo);
        $sheet->setCellValue('G6' , $unidad);
        $sheet->setCellValue('G7' , $suministro);
        $sheet->setCellValue('G8' , $usuario);
        $sheet->setCellValue('E7' , $fecha);
        $sheet->setCellValue('E7' , $estado);

        $sheet->setCellValue('A' .$row, $codigo);
        $sheet->setCellValue('B' .$row, $des);
        $sheet->setCellValue('C' .$row, $um);
        $sheet->setCellValue('D' .$row, $cantidad);
        $sheet->setCellValue('E' .$row, $stock);
        $sheet->setCellValue('F' .$row, $cost);
        $sheet->setCellValue('G' .$row, $tot);
        $sheet->setCellValue('G10' , $tot_f);

                //Justificación
        $sheet->setCellValue('I1' , "Observaciones (En qué se ocupará el bien entregado)");
        $sheet->setCellValue('I2' , $jus);

        $sheet->setCellValue('I4' , "F. ______________________");
        $sheet->setCellValue('N6' , "F. ______________________");
        $sheet->setCellValue('R4' , "F. ______________________");

    //set row style
    if( $row % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($oddRow);
    }
    //increment row
    $row++;
}

//autofilter
//define first row and last row
$firstRow=11;
$lastRow=$row-1;
//set the autofilter
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":G".$lastRow);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="DT Compra.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
}


if (isset($_POST['detalle_almacen'])) {
     $total = 0;
        $final = 0;
     $encargado = $_POST['encargado'];
    $depto = $_POST['depto'];
    $fech = $_POST['fech'];
     $vale = $_POST['num_sol'];
     $estado=$_POST['estado'];
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

$spreadsheet->getActiveSheet()->getStyle('A' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        $sheet->setCellValue('A6' , "N° Almacen");
        $sheet->setCellValue('A7' , "Departamento");
        $sheet->setCellValue('A8' , "Encargado");
        $sheet->setCellValue('F6' , "Fecha");
        $sheet->setCellValue('F7' , "Estado");

        $sheet->setCellValue('B6' , $vale);
        $sheet->setCellValue('B7' , $depto);
        $sheet->setCellValue('B8' , $encargado);
        $sheet->setCellValue('G6' , $fech);
        $sheet->setCellValue('G7' , $estado);

        $sheet->setCellValue('I1' , "DEPARTAMENTO QUE SOLICITA");
        $sheet->setCellValue('M1' , $depto);
        $sheet->setCellValue('I3' , "Fecha:");
        $sheet->setCellValue('J3' ,  $fech);
        $sheet->setCellValue('O3' , "F. ______________________");
        $sheet->setCellValue('T3' , "Sello");

        $sheet->setCellValue('A' .$row, $codigo);
        $sheet->setCellValue('B' .$row, $des);
        $sheet->setCellValue('C' .$row, $um);
        $sheet->setCellValue('D' .$row, $cantidad);
        $sheet->setCellValue('E' .$row, $stock);
        $sheet->setCellValue('F' .$row, $cost);
        $sheet->setCellValue('G' .$row, $tot);
        $sheet->setCellValue('G10' , $tot_f);
       
    //set row style
    if( $row % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($oddRow);
    }
    //increment row
    $row++;
}

//autofilter
//define first row and last row
$firstRow=11;
$lastRow=$row-1;
//set the autofilter
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":G".$lastRow);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Detalle Almacen.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
}

if (isset($_POST['dt_almacen'])) {
     $total = 0;
        $final = 0;
     $encargado = $_POST['encargado'];
    $depto = $_POST['depto'];
    $fech = $_POST['fech'];
     $vale = $_POST['num_sol'];
     $estado=$_POST['estado'];
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

$spreadsheet->getActiveSheet()->getStyle('A' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        $sheet->setCellValue('A6' , "N° Almacen");
        $sheet->setCellValue('A7' , "Departamento");
        $sheet->setCellValue('A8' , "Encargado");
        $sheet->setCellValue('F6' , "Fecha");
        $sheet->setCellValue('F7' , "Estado");

        $sheet->setCellValue('B6' , $vale);
        $sheet->setCellValue('B7' , $depto);
        $sheet->setCellValue('B8' , $encargado);
        $sheet->setCellValue('G6' , $fech);
        $sheet->setCellValue('G7' , $estado);

        $sheet->setCellValue('I1' , "DEPARTAMENTO QUE SOLICITA");
        $sheet->setCellValue('M1' , $depto);
        $sheet->setCellValue('I3' , "Fecha:");
        $sheet->setCellValue('J3' ,  $fech);
        $sheet->setCellValue('O3' , "F. ______________________");
        $sheet->setCellValue('T3' , "Sello");


        $sheet->setCellValue('A' .$row, $codigo);
        $sheet->setCellValue('B' .$row, $des);
        $sheet->setCellValue('C' .$row, $um);
        $sheet->setCellValue('D' .$row, $cantidad);
        $sheet->setCellValue('E' .$row, $stock);
        $sheet->setCellValue('F' .$row, $cost);
        $sheet->setCellValue('G' .$row, $tot);
        $sheet->setCellValue('G10' , $tot_f);
       
    //set row style
    if( $row % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($oddRow);
    }
    //increment row
    $row++;
}

//autofilter
//define first row and last row
$firstRow=11;
$lastRow=$row-1;
//set the autofilter
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":G".$lastRow);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="DT Almacen.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
}
if (isset($_POST['detalle_circulante'])) {
     $total = 0;
        $final = 0;
$depto = $_POST['num_sol'];
    $fech = $_POST['fech'];
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

        $spreadsheet->getActiveSheet()->getStyle('A' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('A8')->getFont()->setSize(9);
        $sheet->setCellValue('A6' , "Encargado del Fondo Circulante de Monto Fijo Recursos Propios");
        $sheet->setCellValue('A7' , 'Hospital Nacional "Santa Teresa" de Zacatecoluca');
        $sheet->setCellValue('A8' , "Atentamente solicito a usted la compra Urgente de los materiales y/o servicios que se detallan a continuación, a través del Fondo Circulante de Monto Fijo.");

        $sheet->setCellValue('A9' , "N° Circulante");
        $sheet->setCellValue('F9' , "Fecha");

        $sheet->setCellValue('B9' , $depto);
        $sheet->setCellValue('G9' , $fech);

        $sheet->setCellValue('I1' , "Todo lo anteriormente detallado, es indispensable para desarrollar nuestras funciones.");
        $sheet->setCellValue('I2' , "Sin más particular");
        $sheet->setCellValue('I3' , "Solicitar");


        $sheet->setCellValue('I1' .$row, $codigo);

        $sheet->setCellValue('A' .$row, $codigo);
        $sheet->setCellValue('B' .$row, $des);
        $sheet->setCellValue('C' .$row, $um);
        $sheet->setCellValue('D' .$row, $cantidad);
        $sheet->setCellValue('E' .$row, $stock);
        $sheet->setCellValue('F' .$row, $cost);
        $sheet->setCellValue('G' .$row, $tot);
        $sheet->setCellValue('G10' , $tot_f);
       
    //set row style
    if( $row % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($oddRow);
    }
    //increment row
    $row++;
}

//autofilter
//define first row and last row
$firstRow=11;
$lastRow=$row-1;
//set the autofilter
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":G".$lastRow);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Detalle Circulante.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
}

if (isset($_POST['dt_circulante'])) {
     $total = 0;
        $final = 0;
$depto = $_POST['num_sol'];
    $fech = $_POST['fech'];
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

$spreadsheet->getActiveSheet()->getStyle('A' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


$spreadsheet->getActiveSheet()->getStyle('A' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G' .$row)
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('A8')->getFont()->setSize(9);
        $sheet->setCellValue('A6' , "Encargado del Fondo Circulante de Monto Fijo Recursos Propios");
        $sheet->setCellValue('A7' , 'Hospital Nacional "Santa Teresa" de Zacatecoluca');
        $sheet->setCellValue('A8' , "Atentamente solicito a usted la compra Urgente de los materiales y/o servicios que se detallan a continuación, a través del Fondo Circulante de Monto Fijo.");

        $sheet->setCellValue('A9' , "N° Circulante");
        $sheet->setCellValue('F9' , "Fecha");

        $sheet->setCellValue('B9' , $depto);
        $sheet->setCellValue('G9' , $fech);

        $sheet->setCellValue('I1' , "Todo lo anteriormente detallado, es indispensable para desarrollar nuestras funciones.");
        $sheet->setCellValue('I2' , "Sin más particular");
        $sheet->setCellValue('I3' , "Solicita:");
        $sheet->setCellValue('M5' , "Autoriza:");
        $sheet->setCellValue('R3' , "Dá fe de no haber existencia:");

        $sheet->setCellValue('I4' , "F. ______________________");
        $sheet->setCellValue('I5' , "Ing. Ernesto González Choto");
        $sheet->setCellValue('I6' , "Jefe de Mantenimiento");

        $sheet->setCellValue('M6' , "F. ______________________");
        $sheet->setCellValue('M7' , "Dr. William Antonio Fernández Rodríguez");
        $sheet->setCellValue('M8' , 'Director del Hospital Nacional "Santa Teresa"');        

        $sheet->setCellValue('R4' , "F. ______________________");
        $sheet->setCellValue('R5' , "Sra. Isabel Romero");
        $sheet->setCellValue('R6' , 'Guarda Almacén"');


        $sheet->setCellValue('A' .$row, $codigo);
        $sheet->setCellValue('B' .$row, $des);
        $sheet->setCellValue('C' .$row, $um);
        $sheet->setCellValue('D' .$row, $cantidad);
        $sheet->setCellValue('E' .$row, $stock);
        $sheet->setCellValue('F' .$row, $cost);
        $sheet->setCellValue('G' .$row, $tot);
        $sheet->setCellValue('G10' , $tot_f);
       
    //set row style
    if( $row % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($oddRow);
    }
    //increment row
    $row++;
}

//autofilter
//define first row and last row
$firstRow=11;
$lastRow=$row-1;
//set the autofilter
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":G".$lastRow);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="DT Circulante.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
}