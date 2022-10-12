<?php
include '../../../../Model/conexion.php';
require ' ../../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\MemoryDrawing;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$writer = new Xlsx($spreadsheet);
$IMG = '../../../../img/hospital1.png';
$IMG1 = '../../../../img/log_1.png';
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
        'size'=>9
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
    ->setCellValue('A4',"REPORTES INGRESOS DE CIRCULANTE");
//Tamaño de la letra
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(16);
$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(16);
$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setSize(16);

//Horientación
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);



//Unión de celdas
$spreadsheet->getActiveSheet()->mergeCells("A1:G1");
$spreadsheet->getActiveSheet()->mergeCells("A2:G2");
$spreadsheet->getActiveSheet()->mergeCells("A3:G3");
$spreadsheet->getActiveSheet()->mergeCells("A4:G4");



//setting column width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(13);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(45.15);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(9);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(17);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(10);


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
    $drawing1->setCoordinates('E1');
    $drawing1->setOffsetX(170);
    $drawing1->setOffsetY(10);
    $drawing1->setWidth(150);
    $drawing1->getShadow()->setVisible(true);
    $drawing1->getShadow()->setDirection(45);
    $drawing1->setWorksheet($spreadsheet->getActiveSheet());
//header text
$sheet->setCellValue('A7', 'N° Circulante');
$sheet->setCellValue('B7', 'Codigo');
$sheet->setCellValue('C7', 'Descriptión');
$sheet->setCellValue('D7', 'U/M');
$sheet->setCellValue('E7', 'Stock');
$sheet->setCellValue('F7', 'Costo Unitario');
$sheet->setCellValue('G7', 'Fecha');

$spreadsheet->getActiveSheet()->getStyle('A7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('G7')->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('A7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('A7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

//set font style and background color
$spreadsheet->getActiveSheet()->getStyle('A7:G7')->applyFromArray($tableHead);
$spreadsheet->getActiveSheet()->getPageSetup()
->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
$fila = 8;

if (isset($_POST['circulante'])) {

    $sql = "SELECT * FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante";
$result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
        $precio=$productos['precio'];
        $precio2=number_format($precio, 2,".",",");
        $stock1=$productos['stock'];
        $stock=number_format($stock1, 2,".",",");
        $spreadsheet->getActiveSheet()->getStyle('A7')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setWrapText(true);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    	$sheet->setCellValue('A' .$fila, $productos['codCirculante']);
        $sheet->setCellValue('B' .$fila, $productos['codigo']);
    	$sheet->setCellValue('C' .$fila, $productos['descripcion']);
    	$sheet->setCellValue('D' .$fila, $productos['unidad_medida']);
    	$sheet->setCellValue('E' .$fila, $stock);
    	$sheet->setCellValue('F' .$fila, $productos['precio']);
        $sheet->setCellValue('G' .$fila, $productos['fecha_solicitud']);
            if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':G'.$fila)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':G'.$fila)->applyFromArray($oddRow);
    }
    //increment row
    $fila++;
        }
    }
    if (isset($_POST['circulante1'])) {$idusuario=$_POST['idusuario'];
   $sql = "SELECT * FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE db.idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
        $precio=$productos['precio'];
        $precio2=number_format($precio, 2,".",",");
        $stock1=$productos['stock'];
        $stock=number_format($precio, 2,".",",");
        $stock=number_format($precio, 2,".",",");
        $spreadsheet->getActiveSheet()->getStyle('A7')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setWrapText(true);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        $sheet->setCellValue('A' .$fila, $productos['codCirculante']);
        $sheet->setCellValue('B' .$fila, $productos['codigo']);
        $sheet->setCellValue('C' .$fila, $productos['descripcion']);
        $sheet->setCellValue('D' .$fila, $productos['unidad_medida']);
        $sheet->setCellValue('E' .$fila, $stock);
        $sheet->setCellValue('F' .$fila, $productos['precio']);
        $sheet->setCellValue('G' .$fila, $productos['fecha_solicitud']);
            if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':G'.$fila)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':G'.$fila)->applyFromArray($oddRow);
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
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":G".$lastRow);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Ingresos Circulante.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();