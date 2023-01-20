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
$spreadsheet->getActiveSheet()->mergeCells("A1:I1");
$spreadsheet->getActiveSheet()->mergeCells("A2:I2");
$spreadsheet->getActiveSheet()->mergeCells("A3:I3");
$spreadsheet->getActiveSheet()->mergeCells("A4:I4");



//setting column width
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(17);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(30);

//imagen
$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Paid');
$drawing->setDescription('Paid');
$drawing->setPath($IMG); /* put your path and image here */
$drawing->setCoordinates('A1');
$drawing->setOffsetX(5);
$drawing->setOffsetY(2);
$drawing->setWidth(150);
$drawing->getShadow()->setVisible(true);
$drawing->setWorksheet($spreadsheet->getActiveSheet());
//imagen
$drawing1 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing1->setName('Paid');
$drawing1->setDescription('Paid');
$drawing1->setPath($IMG1); /* put your path and image here */
$drawing1->setCoordinates('H1');
$drawing1->setOffsetX(-25);
$drawing1->setOffsetY(10);
$drawing1->setWidth(150);
$drawing1->getShadow()->setVisible(true);
$drawing1->getShadow()->setDirection(45);
$drawing1->setWorksheet($spreadsheet->getActiveSheet());
//header text
$spreadsheet->getActiveSheet()
->setCellValue('B13',"No. Circulante")
->setCellValue('D13',"Fecha");

$spreadsheet->getActiveSheet()->getHeaderFooter()
->setOddFooter( '&RPágina &P al &N');

$spreadsheet->getActiveSheet()->getRowDimension(7)->setRowHeight(21.75, 'pt');

//set font style and background color
$spreadsheet->getActiveSheet()->getStyle('B13:I13')->applyFromArray($tableHead);
$spreadsheet->getActiveSheet()->getStyle('B:I')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B:I')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
$fila=14;
$sheet->setCellValue('A7' ,"Encargado del Fondo Circulante de Monto Fijo Recursos Propios");
$sheet->setCellValue('A9' ,'Hospital Nacional "Santa Teresa" de Zacatecoluca');
$sheet->setCellValue('A10' ,"Atentamente solicito a usted la compra Urgente de los materiales y/o servicios que se detallan a continuación,Fondo Circulante de Monto");
$sheet->setCellValue('A11' ,"Fijo.");

$spreadsheet->getActiveSheet()->mergeCells("D13:I13");
$spreadsheet->getActiveSheet()->mergeCells("B13:C13");

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
    $sheet->setCellValue('D' .$fila, $productos['fecha_solicitud']);

    $spreadsheet->getActiveSheet()->mergeCells('D'.$fila.':I'.$fila);
    $spreadsheet->getActiveSheet()->mergeCells('B'.$fila.':C'.$fila);

    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('B'.$fila.':I'.$fila)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('B'.$fila.':I'.$fila)->applyFromArray($oddRow);
    }
    //increment row
    $fila++;
}
}
if (isset($_POST['circulante1'])) {$idusuario=$_POST['idusuario'];
$sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario'";
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
$sheet->setCellValue('D' .$fila, $productos['fecha_solicitud']);

$spreadsheet->getActiveSheet()->mergeCells('D'.$fila.':I'.$fila);
$spreadsheet->getActiveSheet()->mergeCells('B'.$fila.':C'.$fila);

if( $fila % 2 == 0 ){
        //even row
    $spreadsheet->getActiveSheet()->getStyle('B'.$fila.':I'.$fila)->applyFromArray($evenRow);
}else{
        //odd row
    $spreadsheet->getActiveSheet()->getStyle('B'.$fila.':I'.$fila)->applyFromArray($oddRow);
}
    //increment row
$fila++;
}
}

    $sheet->setCellValue('A' .$fila + 1, "Todo lo anteriormente detallado, es indispensable para desarrollar nuestras funciones.");
    $sheet->setCellValue('A' .$fila + 3, "Sin más particular");
    $sheet->setCellValue('A' .$fila + 5, "Solicita:");
    $sheet->setCellValue('C' .$fila + 10, "Autoriza:");
    $sheet->setCellValue('G' .$fila + 6, "Dá fe de no haber existencia:");
    $sheet->setCellValue('A' .$fila + 7, "F. ________________");
    $sheet->setCellValue('A' .$fila + 8, "Ing. Ernesto González Choto");
    $sheet->setCellValue('A' .$fila + 9, "Jefe de Mantenimiento");

    $sheet->setCellValue('C' .$fila + 11, "F. ________________");
    $sheet->setCellValue('C' .$fila + 12, "Dr. William Antonio Fernández Rodríguez");
    $sheet->setCellValue('C' .$fila + 13, 'Director del Hospital Nacional " Santa Teresa"');

    $sheet->setCellValue('G' .$fila + 7, "F. ________________");
    $sheet->setCellValue('G' .$fila + 8, "Sra. Isabel Romero");
    $sheet->setCellValue('G' .$fila + 9, "Guarda Almacén");

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 1 .':I'.$fila + 1);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':B'.$fila + 3);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 7 .':B'.$fila + 7);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 8 .':B'.$fila + 8);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 9 .':B'.$fila + 9);

    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 10 .':F'.$fila + 10);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 11 .':F'.$fila + 11);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 12 .':F'.$fila + 12);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 13 .':F'.$fila + 13);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 14 .':F'.$fila + 14);

    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 6 .':I'.$fila + 6);
    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 7 .':I'.$fila + 7);
    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 8 .':I'.$fila + 8);
    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 9 .':I'.$fila + 9);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +1)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +3)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +5)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +10)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +11)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +12)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +13)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +14)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +10)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +11)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +12)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +13)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +14)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +7)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +8)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +9)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +7)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +8)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +9)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Circulante.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();