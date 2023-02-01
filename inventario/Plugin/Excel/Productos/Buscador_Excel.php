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
->setCellValue('A1',"MINISTERIO DE SALUD")
->setCellValue('A2',"HOSPITAL NACIONAL SANTA TERESA")
->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
->setCellValue('A4',"PRODUCTOS");
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
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(12);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(12);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30.57);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(13);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(17);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(13);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(13);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(13);

$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(15.71);

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
$sheet->setCellValue('A7', 'Codigo');
$sheet->setCellValue('B7', 'Catalogo');
$sheet->setCellValue('C7', 'Description');
$sheet->setCellValue('D7', 'U/M');
$sheet->setCellValue('E7', 'Stock');
$sheet->setCellValue('F7', 'Precio');
$sheet->setCellValue('G7', 'Fecha');
$sheet->setCellValue('H7', 'Categorias');

//set font style and background color
$spreadsheet->getActiveSheet()->getStyle('A7:H7')->applyFromArray($tableHead);

$spreadsheet->getActiveSheet()->getStyle('A:U')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('A:U')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('A:U')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('E')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('F:G')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

$spreadsheet->getActiveSheet()->getStyle('J')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('M')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('P')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

$spreadsheet->getActiveSheet()->getRowDimension(7)->setRowHeight(21.75, 'pt');

$Busqueda=$_POST['consulta'];
$sql="SELECT * FROM tb_productos WHERE  codProductos LIKE '%".$Busqueda."%' or descripcion LIKE '%".$Busqueda."%'";
$result = mysqli_query($conn, $sql);

$fila =8;
$fila1=3;
$fila2=3;
$fila3=3;

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

while ($productos = mysqli_fetch_array($result)){
    $cantidad=$productos['stock'];
    $precio=$productos['precio'];

    $final2 += $cantidad;
    $final8 += $precio;
    $total = $productos['stock'] * $productos['precio'];
    
    $final += $total;


    $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setWrapText(true);
    $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setWrapText(true);
    $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setWrapText(true);
    $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setWrapText(true);
    $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setWrapText(true);
    $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setWrapText(true);
    $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setWrapText(true);
    $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setWrapText(true);


    $sheet->setCellValue('A' .$fila, $productos['codProductos']);
    $sheet->setCellValue('B' .$fila, $productos['catalogo']);
    $sheet->setCellValue('C' .$fila, $productos['descripcion']);
    $sheet->setCellValue('D' .$fila, $productos['unidad_medida']);
    $sheet->setCellValue('E' .$fila, $productos['stock']);
    $sheet->setCellValue('F' .$fila, $productos['precio']);
    $sheet->setCellValue('G' .$fila, $productos['fecha_registro']);
    $sheet->setCellValue('H' .$fila, $productos['categoria']);
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
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila+2)->applyFromArray($tableHead);
    $spreadsheet->getActiveSheet()->getStyle('H'.$fila+2)->applyFromArray($tableHead);
    $sheet->setCellValue('A'.$fila +2 , "VISTA PREVIA:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':H'.$fila + 2);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':D'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 4 .':D'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 5 .':D'.$fila + 5);

    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 3 .':H'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 4 .':H'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 5 .':H'.$fila + 5);

    $sheet->setCellValue('A'.$fila +3 ,"Cant Solicitada: ");
    $sheet->setCellValue('E'.$fila +3 ,$final2);
    $sheet->setCellValue('A'.$fila +4 ,"Costo Unitario: ");
    $sheet->setCellValue('E'.$fila +4 ,$final8);
    $sheet->setCellValue('A'.$fila +5 ,"SubTotal: ");
    $sheet->setCellValue('E'.$fila +5 ,$final);
    
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila + 3)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila + 4 .':E'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 3 .':H'.$fila + 3)->applyFromArray($evenRow);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 4 .':H'.$fila + 4)->applyFromArray($oddRow);
    
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 5 .':H'.$fila + 5)->applyFromArray($subtotal);

$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 7 .':H'.$fila + 7)->applyFromArray($tableHead);

$sheet->setCellValue('A'.$fila +7, "STOCK POR MES:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 7 .':H'.$fila + 7);


$sql1="SELECT Mes,SUM(stock) FROM tb_productos  WHERE  codProductos LIKE '%".$Busqueda."%' or descripcion LIKE '%".$Busqueda."%' GROUP by Mes;";

$result1 = mysqli_query($conn, $sql1);
while ($productos1 = mysqli_fetch_array($result1)){
    $mes=$productos1['Mes'];
    $cantidad=$productos1['SUM(stock)'];
    $final10 += $cantidad;
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



    $sheet->setCellValue('A' .$fila +8, $mes);
    $sheet->setCellValue('E' .$fila +8, $cantidad);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 8 .':D'.$fila + 8);

    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 8 .':H'.$fila + 8);


    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 8 .':H'.$fila + 8)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 8 .':H'.$fila + 8)->applyFromArray($oddRow);
    }
    $fila++;

}

    $sheet->setCellValue('A' .$fila +8, "SubTotal");
    $sheet->setCellValue('E' .$fila +8, $final10);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 8 .':D'.$fila + 8);

    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 8 .':H'.$fila + 8);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 8 .':H'.$fila + 8)->applyFromArray($subtotal);



$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 10 .':H'.$fila + 10)->applyFromArray($tableHead);

$sheet->setCellValue('A'.$fila +10, "STOCK POR AÑO:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 10 .':H'.$fila + 10);

$sql2="SELECT Año,SUM(stock) FROM tb_productos WHERE  codProductos LIKE '%".$Busqueda."%' or descripcion LIKE '%".$Busqueda."%'  GROUP by Año;";

$result1 = mysqli_query($conn, $sql2);
while ($productos1 = mysqli_fetch_array($result1)){
    $Año=$productos1['Año'];
    $cantidad=$productos1['SUM(stock)'];
    $final12 += $cantidad;


    $sheet->setCellValue('A' .$fila +11, $Año);
    $sheet->setCellValue('E' .$fila +11, $cantidad);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 11 .':D'.$fila + 11);

    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 11 .':H'.$fila + 11);


    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 11 .':H'.$fila + 11)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 11 .':H'.$fila + 11)->applyFromArray($oddRow);
    }
    $fila++;

}

    $sheet->setCellValue('A' .$fila +11, "SubTotal");
    $sheet->setCellValue('E' .$fila +11, $final10);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 11 .':D'.$fila + 11);

    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 11 .':H'.$fila + 11);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 11 .':H'.$fila + 11)->applyFromArray($subtotal);


//set the header first, so the result will be treated as an xlsx file.
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
    header('Content-Disposition: attachment;filename="Productos.xlsx"');

//create IOFactory object
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
    $writer->save('php://output');
    exit();