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
->setCellValue('A4',"HISTORIAL DE PRODUCTOS");
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
$spreadsheet->getActiveSheet()->getStyle('A12:F12')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A12:F12')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);



//Unión de celdas
$spreadsheet->getActiveSheet()->mergeCells("A1:F1");
$spreadsheet->getActiveSheet()->mergeCells("A2:F2");
$spreadsheet->getActiveSheet()->mergeCells("A3:F3");
$spreadsheet->getActiveSheet()->mergeCells("A4:F4");



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
$sheet->setCellValue('A7', 'Fecha');
$sheet->setCellValue('B7', 'Concepto');
$sheet->setCellValue('C7', 'No. Comprobante');
$sheet->setCellValue('D7', 'Entradas');
$sheet->setCellValue('E7', 'Salidas');
$sheet->setCellValue('F7', 'Saldo');

//set font style and background color
$spreadsheet->getActiveSheet()->getStyle('A7:F7')->applyFromArray($tableHead);

$spreadsheet->getActiveSheet()->getStyle('A:U')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('A:U')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('A:U')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('D:E')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('F:G')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

$spreadsheet->getActiveSheet()->getStyle('J')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('M')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('P')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


$spreadsheet->getActiveSheet()->getRowDimension(7)->setRowHeight(21.75, 'pt');

$f1=$_POST['f1'];
$f2=$_POST['f2'];
$Busqueda=$_POST['Busqueda'];


$fila = 8;
$total = "0.00";
$final = "0.00";
$final1 = "0.00";
$final2 = "0.00";
$final3 = "0.00";
$final4 = "0.00";
$final5 = "0.00";
$final6 = "0.00";
$final7 = "0.00";
$final8 = "0.00";
$final9 = "0.00";
$final10 = "0.00";
$final11 = "0.00";
$final12 = "0.00";
$final13 = "0.00";
$final14 = "0.00";
$final15 = "0.00";
$final16 = "0.00";
$final17 = "0.00";
$final18 = "0.00";
$final19 = "0.00";
$final20 = "0.00";
$sql = "SELECT * FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'";

$result = mysqli_query($conn, $sql);


while ($productos = mysqli_fetch_array($result)){
    $total = $productos['Entradas'] * $productos['Saldo'];
    $final += $total;

    $Concepto=$productos['Concepto'];
    $Comprovante= $productos['No_Comprovante'];
    $precio= $productos['Saldo'];
    $descripcion=$productos['descripcion'];
    $Entradas=$productos['Entradas'];
    $Salida=$productos['Salidas'];
    $um=$productos['unidad_medida']; 
    $fecha=date('d-m-Y',strtotime($productos['fecha_registro']));
    $final14 += $Entradas;
    $final16 += $Salida;
    $final18 += $Entradas-$Salida;
    $final20 += $precio;
    



    $sheet->setCellValue('A' .$fila, $fecha);
    $sheet->setCellValue('B' .$fila, $Concepto);
    $sheet->setCellValue('C' .$fila, $Comprovante);
    $sheet->setCellValue('D' .$fila, $Entradas);
    $sheet->setCellValue('E' .$fila, $Salida);
    $sheet->setCellValue('F' .$fila, $precio);
    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':F'.$fila)->applyFromArray($evenRow);
    }else{
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':F'.$fila)->applyFromArray($oddRow);
    }
    //increment row
    $fila++;
}
$spreadsheet->getActiveSheet()->getStyle('L2:M2')->applyFromArray($tableHead);

$sheet->setCellValue('L2' , "STOCK POR MES:");

$sql="SELECT SUM(Entradas),fecha_registro FROM historial WHERE No_Comprovante LIKE '%".$Busqueda."%'  GROUP BY fecha_registro;";
$result1 = mysqli_query($conn, $sql1);
while ($productos = mysqli_fetch_array($result1)){
    $mes=date("m",strtotime($productos['fecha_registro']));
    $cantidad=$productos['SUM(Entradas)'];
    $stock=number_format($cantidad, 2,".",",");
    $final8 += $cantidad;
    $final9   =    number_format($final8, 2, ".",",");
    if ($mes==1)  { $mes="Enero";}
    if ($mes==2)  { $mes="Febrero";}
    if ($mes==3)  { $mes="Marzo";}
    if ($mes==4)  { $mes="Abril";}
    if ($mes==5)  { $mes="Mayo";}
    if ($mes==6)  { $mes="Junio";}
    if ($mes==7)  { $mes="Junio";}
    if ($mes==8)  { $mes="Agosto";}
    if ($mes==9)  { $mes="Septiembre";}
    if ($mes==10) { $mes="Octubre";}
    if ($mes==11) { $mes="Noviembre";}
    if ($mes==12) { $mes="Diciembre";}

    
    $sheet->setCellValue('L' .$fila1, $mes);
    $sheet->setCellValue('M' .$fila1, $cantidad);
    $spreadsheet->getActiveSheet()->mergeCells('L2:M2');

    if( $fila1 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('L'.$fila1.':M'.$fila1)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('L'.$fila1.':M'.$fila1)->applyFromArray($oddRow);
    }
    $fila1++;

}

$sheet->setCellValue('L' .$fila1, "SubTotal");
$sheet->setCellValue('M' .$fila1, $final10);
$spreadsheet->getActiveSheet()->getStyle('L'.$fila1.':M'.$fila1)->applyFromArray($subtotal);
$sheet->setCellValue('O2' , "STOCK POR AÑO:");

//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Historial de Productos.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();