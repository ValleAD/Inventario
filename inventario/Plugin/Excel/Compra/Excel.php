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
            'rgb' => '46466b'
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
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setSize(12);

//Horientación
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);



//Unión de celdas
$spreadsheet->getActiveSheet()->mergeCells("A1:H1");
$spreadsheet->getActiveSheet()->mergeCells("A2:H2");
$spreadsheet->getActiveSheet()->mergeCells("A3:H3");
$spreadsheet->getActiveSheet()->mergeCells("A4:H4");



//setting column width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(15);

$spreadsheet->getActiveSheet()->getPageSetup()
->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

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
    $drawing1->setCoordinates('G1');
    $drawing1->setOffsetX(20);
    $drawing1->setOffsetY(10);
    $drawing1->setWidth(150);
    $drawing1->getShadow()->setVisible(true);
    $drawing1->getShadow()->setDirection(45);
    $drawing1->setWorksheet($spreadsheet->getActiveSheet());
//header text
$spreadsheet->getActiveSheet()
    ->setCellValue('A7',"No.")
    ->setCellValue('B7',"Dependencia")
    ->setCellValue('C7',"Plazo y No. de Entregas")
    ->setCellValue('D7',"Unidad Técnica")
    ->setCellValue('E7',"Descripción")
    ->setCellValue('F7',"Encargado")
    ->setCellValue('G7',"Estado")
    ->setCellValue('H7',"Fecha");

//set font style and background color
$spreadsheet->getActiveSheet()->getStyle('A7:H7')->applyFromArray($tableHead);

$spreadsheet->getActiveSheet()->getStyle('A:S')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('A:S')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('A:S')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

$spreadsheet->getActiveSheet()->getHeaderFooter()
    ->setOddFooter( '&RPágina &P al &N');

$spreadsheet->getActiveSheet()->getRowDimension(7)->setRowHeight(30, 'pt');
$fila=8;
if (isset($_POST['compra'])) {
    $sql = "SELECT * FROM tb_compra";
$result = mysqli_query($conn, $sql);


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
        if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':H'.$fila)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':H'.$fila)->applyFromArray($oddRow);
    }
    //increment row
    $fila++;
        }
    }
    if (isset($_POST['compra1'])) {$idusuario=$_POST['idusuario'];
        $sql = "SELECT * FROM tb_compra WHERE idusuario='$idusuario' ";
$result = mysqli_query($conn, $sql);


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
            if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':H'.$fila)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':H'.$fila)->applyFromArray($oddRow);
    }
    //increment row
    $fila++;
        }
    }

    $sheet->setCellValue('A' .$fila + 3, "Solicita:");
    $sheet->setCellValue('D' .$fila + 7, "Autoriza:");
    $sheet->setCellValue('G' .$fila + 3, "Entrega:");
    $sheet->setCellValue('A' .$fila + 4, "F. ________________");

    $sheet->setCellValue('D' .$fila + 8, "F. ________________");

    $sheet->setCellValue('G' .$fila + 4, "F. ________________");


    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':B'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 4 .':B'.$fila + 4);

    $spreadsheet->getActiveSheet()->mergeCells('D'.$fila+ 7 .':E'.$fila + 7);
    $spreadsheet->getActiveSheet()->mergeCells('D'.$fila+ 8 .':E'.$fila + 8);

    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 3 .':H'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 4 .':H'.$fila + 4);



//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Solicitud Compra.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();