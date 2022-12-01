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
];$tableHead1 = [
    'font'=>[
        
        'bold'=>true,
        'size'=>11
]
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
    ->setCellValue('A4',"HISTORIAL DE PRODUCTOS");
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
$spreadsheet->getActiveSheet()->getStyle('A12:F12')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A12:F12')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);



//Unión de celdas
$spreadsheet->getActiveSheet()->mergeCells("A1:F1");
$spreadsheet->getActiveSheet()->mergeCells("A2:F2");
$spreadsheet->getActiveSheet()->mergeCells("A3:F3");
$spreadsheet->getActiveSheet()->mergeCells("A4:F4");
$spreadsheet->getActiveSheet()->mergeCells("B8:F8");



//setting column width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(13.86);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(35);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(19.86);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(14.29);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(16.71);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(16.14);

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
    $drawing1->setCoordinates('E1');
    $drawing1->setOffsetX(100);
    $drawing1->setOffsetY(10);
    $drawing1->setWidth(150);
    $drawing1->getShadow()->setVisible(true);
    $drawing1->getShadow()->setDirection(45);
    $drawing1->setWorksheet($spreadsheet->getActiveSheet());
//header text
$sheet->setCellValue('A11', 'Fecha');
$sheet->setCellValue('B11', 'Concepto');
$sheet->setCellValue('C11', 'No. Comprobante');
$sheet->setCellValue('D11', 'Entradas');
$sheet->setCellValue('E11', 'Salidas');
$sheet->setCellValue('F11', 'Saldo');

//set font style and background color
$spreadsheet->getActiveSheet()->getStyle('A11:F11')->applyFromArray($tableHead);
$spreadsheet->getActiveSheet()->getStyle('A6:A9')->applyFromArray($tableHead1);
$spreadsheet->getActiveSheet()->getStyle('E6')->applyFromArray($tableHead1);

$spreadsheet->getActiveSheet()->getStyle('A7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E7')->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('F7')->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('B6')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
$spreadsheet->getActiveSheet()->getStyle('F6')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
$spreadsheet->getActiveSheet()->getStyle('F7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
$spreadsheet->getActiveSheet()->getStyle('F8')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
$spreadsheet->getActiveSheet()->getStyle('F9')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);


$spreadsheet->getActiveSheet()->getStyle('F6')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F8')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F9')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


$spreadsheet->getActiveSheet()->getStyle('A6')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B6')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A8')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A9')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


$spreadsheet->getActiveSheet()->getPageSetup()
->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

$fecha=$_POST['fecha'];
$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];
$descripcion=$_POST['descripcion'];
$cod=$_POST['cod'];
$um=$_POST['um'];
$precio=$_POST['precio'];

        $sheet->setCellValue('A6' ,"DE:");
        $sheet->setCellValue('A7' ,"Codigo del Producto:");
        $sheet->setCellValue('A8' ,"Descripción:");
        $sheet->setCellValue('A9' ,"Unidad de Medida:");        

        $sheet->setCellValue('B6' ,$fecha1);
        $sheet->setCellValue('E6' ,"AL:");
        $sheet->setCellValue('F6' ,$fecha1);
        $sheet->setCellValue('F7' ,$cod);
        $sheet->setCellValue('B8' ,$descripcion);
        $sheet->setCellValue('F9' ,$um);
$fila = 13;
$sql1 = "SELECT fecha_registro,codProductos, precio,SUM(stock) FROM tb_productos WHERE  codProductos = '$cod' GROUP BY codProductos";
$result = mysqli_query($conn, $sql1);
    while ($productos1 = mysqli_fetch_array($result)){
 $stock= $productos1['SUM(stock)'] ;
        $sheet->setCellValue('A12' ,$fecha2);
        $sheet->setCellValue('B12' ,'Inventario Físico');
        $sheet->setCellValue('C12' ,$cod);
        $sheet->setCellValue('D12' ,$stock);
        $sheet->setCellValue('E12' ,'0.00');
        $sheet->setCellValue('F12' ,$precio);
       } 
   $sql = "SELECT fecha_registro,Concepto,No_Comprovante, SUM(Entradas), SUM(Salidas),Saldo FROM historial  WHERE No_Comprovante='$cod' GROUP BY Concepto";

$result = mysqli_query($conn, $sql);


    while ($productos = mysqli_fetch_array($result)){
        $Comprovante= $productos['No_Comprovante'];
        $Concepto= $productos['Concepto'];
        $Entradas=$productos['SUM(Entradas)'];
        $Salida=$productos['SUM(Salidas)'];
        $Saldo=$productos['Saldo'];
       
$spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setWrapText(true);



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



        $sheet->setCellValue('A' .$fila, $fecha);
        $sheet->setCellValue('B' .$fila, $Concepto);
        $sheet->setCellValue('C' .$fila, $Comprovante);
        $sheet->setCellValue('D' .$fila, $Entradas);
        $sheet->setCellValue('E' .$fila, $Salida);
        $sheet->setCellValue('F' .$fila, $Saldo);
       if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A12:F12')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':F'.$fila)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A12:F12')->applyFromArray($oddRow);
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':F'.$fila)->applyFromArray($oddRow);
    }
    //increment row
    $fila++;
        }
    
//autofilter
//define first row and last row
$firstRow=11;
$lastRow=$fila-1;
//set the autofilter
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":F".$lastRow);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Historial de Productos.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();