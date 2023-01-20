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
        'size'=>9
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
$subtotal = [
    'font'=>[
        'color'=>[
            'rgb'=>'FFFFFF'

        ]
    ],
    'fill'=>[
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => '92D050'
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

$Aprobado = [
    'font'=>[
        'color'=>[
            'rgb'=>'FFFFFF'

        ]
    ],
    'fill'=>[
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => '0070C0'
        ]
    ]
];
$Rechazado = [
    'font'=>[
        'color'=>[
            'rgb'=>'FFFFFF'

        ]
    ],
    'fill'=>[
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => 'FF0000'
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
->setCellValue('A2',"MINISTERIO DE SALUD HOSPITAL NACIONAL SANTA TERESA")
->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
->setCellValue('A4',"UNIDAD DE MEDIDA");
//Tamaño de la letra
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(8);
$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(8);
$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(8);
$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setSize(8);

//Horientación



//Unión de celdas
$spreadsheet->getActiveSheet()->mergeCells("A1:C1");
$spreadsheet->getActiveSheet()->mergeCells("A2:C2");
$spreadsheet->getActiveSheet()->mergeCells("A3:C3");
$spreadsheet->getActiveSheet()->mergeCells("A4:C4");



//setting column width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30);

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
$drawing1->setOffsetX(50);
$drawing1->setOffsetY(10);
$drawing1->setWidth(150);
$drawing1->getShadow()->setVisible(true);
$drawing1->getShadow()->setDirection(45);
$drawing1->setWorksheet($spreadsheet->getActiveSheet());
//header text
$spreadsheet->getActiveSheet()
->setCellValue('A7',"ID")
->setCellValue('B7',"Departamento")
->setCellValue('C7',"Habilitado");

//set font style and background color
$spreadsheet->getActiveSheet()->getStyle('A7:C7')->applyFromArray($tableHead);
$spreadsheet->getActiveSheet()->getPageSetup()
->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_DEFAULT);
$spreadsheet->getActiveSheet()->getStyle('A:C')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('A:C')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('A:C')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getRowDimension(7)->setRowHeight(21.75, 'pt');
$spreadsheet->getActiveSheet()->getHeaderFooter()
->setOddFooter( '&RPágina &P al &N');
$fila=8;
$sql="SELECT * FROM  selects_departamento ";
$result = mysqli_query($conn, $sql);    
while ($productos = mysqli_fetch_array($result)){
    if($productos['Habilitado']=='Si') {
        $c='Departamento Disponible';
        $spreadsheet->getActiveSheet()->getStyle('C'.$fila)->applyFromArray($Aprobado);
    } elseif ($productos['Habilitado']  == 'No') {
        $c='Departamento no Disponible';
        $spreadsheet->getActiveSheet()->getStyle('C'.$fila)->applyFromArray($Rechazado);
    }


    $sheet->setCellValue('A' .$fila, $productos['id']);
    $sheet->setCellValue('B' .$fila, $productos['departamento']);
    $sheet->setCellValue('C' .$fila, $c);
    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':B'.$fila)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':B'.$fila)->applyFromArray($oddRow);
    }
    //increment row
    $fila++;
}



//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Departamento.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();