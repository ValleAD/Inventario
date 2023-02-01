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
    'font'=>[
        'color'=>[
            'rgb'=>'000000'

        ]
    ],
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
    'font'=>[
        'color'=>[
            'rgb'=>'000000'

        ]
    ],
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
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(19.86);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(14.29);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(16.71);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(16.14);

$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20.86);
$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(16.71);
$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('W')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('X')->setWidth(15.71);
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
$sheet->setCellValue('A8', 'Fecha');
$sheet->setCellValue('B8', 'Concepto');
$sheet->setCellValue('C8', 'No. Comprobante');
$sheet->setCellValue('D8', 'Entradas');
$sheet->setCellValue('E8', 'Salidas');
$sheet->setCellValue('F8', 'Saldo');
$sheet->setCellValue('G8', 'Total');

//set font style and background color
$spreadsheet->getActiveSheet()->getStyle('A8:G8')->applyFromArray($tableHead);

$spreadsheet->getActiveSheet()->getStyle('A:X')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('A:X')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('A:X')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('D:E')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('F:G')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);
$spreadsheet->getActiveSheet()->getStyle('I6:I7')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

$spreadsheet->getActiveSheet()->getStyle('J')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('O')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('L5')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2);
$spreadsheet->getActiveSheet()->getStyle('I3:I5')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('R')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('U')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('X')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


$spreadsheet->getActiveSheet()->getRowDimension(8)->setRowHeight(21.75, 'pt');

$f1=$_POST['f1'];
$f2=$_POST['f2'];
$Busqueda=$_POST['Busqueda'];


$fila = 9;
$fila1 = 3;
$fila2 = 3;
$fila3 = 3;
$fila4 = 3;
$total = "0.00";
$final = "0.00";
$final7 = "0.00";
$final8 = "0.00";
$final9 = "0.00";
$final10 = "0.00";
$final11 = "0.00";
$final14 = "0.00";
$final16 = "0.00";
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
    $final7 += $Entradas;

    $sheet->setCellValue('A' .$fila, $fecha);
    $sheet->setCellValue('B' .$fila, $Concepto);
    $sheet->setCellValue('C' .$fila, $Comprovante);
    $sheet->setCellValue('D' .$fila, $Entradas);
    $sheet->setCellValue('E' .$fila, $Salida);
    $sheet->setCellValue('F' .$fila, $precio);
    $sheet->setCellValue('G' .$fila, $total);
    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':G'.$fila)->applyFromArray($evenRow);
    }else{
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':G'.$fila)->applyFromArray($oddRow);
    }

    //increment row
    $fila++;
}
$spreadsheet->getActiveSheet()->getStyle('A'.$fila + 2 .':B'.$fila + 2)->applyFromArray($tableHead);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila + 2 .':B'.$fila + 2);

$sheet->setCellValue('A'.$fila + 2,  "VISTA PREVIA:");

$sheet->setCellValue('A'.$fila + 3,  "Entradas");
$sheet->setCellValue('B'.$fila + 3,  $final14);

$sheet->setCellValue('A'.$fila + 4,  "Salidas");
$sheet->setCellValue('B'.$fila + 4,  $final16);

$sheet->setCellValue('A'.$fila + 5,  "Resta de Entradas - Salidas:");
$sheet->setCellValue('B'.$fila + 5,  $final18);

$sheet->setCellValue('A'.$fila + 6,  "Saldo(Precio):");
$sheet->setCellValue('B'.$fila + 6,  $final20);

$sheet->setCellValue('A'.$fila + 7,  "SubTotal");
$sheet->setCellValue('B'.$fila + 7,  $final);

$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 2 .':G'.$fila + 2)->applyFromArray($tableHead);
$sheet->setCellValue('D'.$fila + 2, "PERIODO DE MOVIMIENTO:");
$sheet->setCellValue('D'.$fila + 3, "De");
$sheet->setCellValue('F'.$fila + 3, $f1);
$sheet->setCellValue('D'.$fila + 4, "AL");
$sheet->setCellValue('F'.$fila + 4, $f1);
$sheet->setCellValue('D'.$fila + 5, "Codigo del Productos");
$sheet->setCellValue('F'.$fila + 5, $Comprovante);
$sheet->setCellValue('D'.$fila + 6, "Descripción");
$sheet->setCellValue('F'.$fila + 6, $descripcion);
$sheet->setCellValue('D'.$fila + 7, "Unidad de Medida");
$sheet->setCellValue('F'.$fila + 7, $um);

$spreadsheet->getActiveSheet()->getStyle('F'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_GENERAL);

$spreadsheet->getActiveSheet()->getStyle('B'.$fila + 3 .':B'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

$spreadsheet->getActiveSheet()->getStyle('B'.$fila + 6 .':B'.$fila + 7)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);
$spreadsheet->getActiveSheet()->mergeCells('D'.$fila + 2 .':G'.$fila + 2);
$spreadsheet->getActiveSheet()->mergeCells('D'.$fila + 3 .':E'.$fila + 3);
$spreadsheet->getActiveSheet()->mergeCells('D'.$fila + 4 .':E'.$fila + 4);
$spreadsheet->getActiveSheet()->mergeCells('D'.$fila + 5 .':E'.$fila + 5);
$spreadsheet->getActiveSheet()->mergeCells('D'.$fila + 6 .':E'.$fila + 6);
$spreadsheet->getActiveSheet()->mergeCells('D'.$fila + 7 .':E'.$fila + 7);


$spreadsheet->getActiveSheet()->mergeCells('F'.$fila + 3 .':G'.$fila + 3);
$spreadsheet->getActiveSheet()->mergeCells('F'.$fila + 4 .':G'.$fila + 4);
$spreadsheet->getActiveSheet()->mergeCells('F'.$fila + 5 .':G'.$fila + 5);
$spreadsheet->getActiveSheet()->mergeCells('F'.$fila + 6 .':G'.$fila + 6);
$spreadsheet->getActiveSheet()->mergeCells('F'.$fila + 7 .':G'.$fila + 7);

$spreadsheet->getActiveSheet()->getStyle('A'.$fila + 3 .':B'.$fila + 3)->applyFromArray($evenRow);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila + 4 .':B'.$fila + 4)->applyFromArray($oddRow);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila + 5 .':B'.$fila + 5)->applyFromArray($evenRow);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila + 6 .':B'.$fila + 6)->applyFromArray($oddRow);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila + 7 .':B'.$fila + 7)->applyFromArray($subtotal);


$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 3 .':G'.$fila + 3)->applyFromArray($evenRow);
$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 4 .':G'.$fila + 4)->applyFromArray($oddRow);
$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 5 .':G'.$fila + 5)->applyFromArray($evenRow);
$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 6 .':G'.$fila + 6)->applyFromArray($oddRow);
$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 7 .':G'.$fila + 7)->applyFromArray($evenRow);

$spreadsheet->getActiveSheet()->getStyle('A'.$fila  + 9 .':G'.$fila + 9)->applyFromArray($tableHead);
$sheet->setCellValue('A'.$fila +9 , "ENTRADAS POR MES:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila + 9 .':G'.$fila + 9);
$sql1="SELECT SUM(Entradas),Mes FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Mes;";
$result1 = mysqli_query($conn, $sql1);
while ($productos = mysqli_fetch_array($result1)){
    $mes=$productos['Mes'];
    $cantidad=$productos['SUM(Entradas)'];
    $final8 += $cantidad;

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



    $sheet->setCellValue('A' .$fila +10, $mes);
    $sheet->setCellValue('D' .$fila +10, $cantidad);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila + 10 .':C'.$fila + 10);
     $spreadsheet->getActiveSheet()->mergeCells('D'.$fila + 10 .':G'.$fila + 10);

$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 10)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 10 .':G'.$fila + 10)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 10 .':G'.$fila + 10)->applyFromArray($oddRow);
    }
    $fila++;
}
    $sheet->setCellValue('A' .$fila +10, "SubTotal");
    $sheet->setCellValue('D' .$fila +10, $final8);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila + 10 .':C'.$fila + 10);
    $spreadsheet->getActiveSheet()->mergeCells('D'.$fila + 10 .':G'.$fila + 10);

$spreadsheet->getActiveSheet()->getStyle('A'.$fila + 10 .':G'.$fila + 10)->applyFromArray($subtotal);
$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 10)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


$spreadsheet->getActiveSheet()->getStyle('A'.$fila  + 12 .':G'.$fila + 12)->applyFromArray($tableHead);
$sheet->setCellValue('A'.$fila +12 , "SALIDAS POR MES:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila + 12 .':G'.$fila + 12);
$sql1="SELECT SUM(Salidas),Mes FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Mes;";
$result1 = mysqli_query($conn, $sql1);
while ($productos = mysqli_fetch_array($result1)){
    $mes=$productos['Mes'];
    $cantidad=$productos['SUM(Salidas)'];
    $final8 += $cantidad;

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



    $sheet->setCellValue('A' .$fila +13, $mes);
    $sheet->setCellValue('D' .$fila +13, $cantidad);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila + 13 .':C'.$fila + 13);
     $spreadsheet->getActiveSheet()->mergeCells('D'.$fila + 13 .':G'.$fila + 13);

$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 13)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 13 .':G'.$fila + 13)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 13 .':G'.$fila + 13)->applyFromArray($oddRow);
    }
    $fila++;
}
    $sheet->setCellValue('A' .$fila +13, "SubTotal");
    $sheet->setCellValue('D' .$fila +13, $final8);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila + 13 .':C'.$fila + 13);
    $spreadsheet->getActiveSheet()->mergeCells('D'.$fila + 13 .':G'.$fila + 13);

$spreadsheet->getActiveSheet()->getStyle('A'.$fila + 13 .':G'.$fila + 13)->applyFromArray($subtotal);
$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 13)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


    $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 15 .':G'.$fila+ 15)->applyFromArray($tableHead);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 15 .':G'.$fila+ 15);

$sheet->setCellValue('A'.$fila +15, "ENTRADAS POR AÑO:");
$sql2="SELECT SUM(Entradas),Año FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Año;";
$result2 = mysqli_query($conn, $sql2);
while ($productos = mysqli_fetch_array($result2)){
    $mes=$productos['Año'];
    $cantidad=$productos['SUM(Entradas)'];
    $final10 += $cantidad;


    $sheet->setCellValue('A'.$fila +16, $mes);
    $sheet->setCellValue('D'.$fila+16, $cantidad);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila + 16 .':C'.$fila + 16);
    $spreadsheet->getActiveSheet()->mergeCells('D'.$fila + 16 .':G'.$fila + 16);

    $spreadsheet->getActiveSheet()->getStyle('D'.$fila + 16)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 16 .':G'.$fila+ 16)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 16 .':G'.$fila+ 16)->applyFromArray($oddRow);
    }
    $fila++;

}

$sheet->setCellValue('A'.$fila+16, "SubTotal");
$sheet->setCellValue('D'.$fila+16, $final10);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila + 16 .':C'.$fila + 16);
    $spreadsheet->getActiveSheet()->mergeCells('D'.$fila + 16 .':G'.$fila + 16);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 16 .':G'.$fila+ 16)->applyFromArray($subtotal);
$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 16)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

 
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 18 .':G'.$fila+ 18)->applyFromArray($tableHead);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 18 .':G'.$fila+ 18);

$sheet->setCellValue('A'.$fila +18, "SALIDAS POR AÑO:");
$sql2="SELECT SUM(Salidas),Año FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Año;";
$result2 = mysqli_query($conn, $sql2);
while ($productos = mysqli_fetch_array($result2)){
    $mes=$productos['Año'];
    $cantidad=$productos['SUM(Salidas)'];
    $final10 += $cantidad;


    $sheet->setCellValue('A'.$fila +19, $mes);
    $sheet->setCellValue('D'.$fila+19, $cantidad);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila + 19 .':C'.$fila + 19);
    $spreadsheet->getActiveSheet()->mergeCells('D'.$fila + 19 .':G'.$fila + 19);

    $spreadsheet->getActiveSheet()->getStyle('D'.$fila + 19)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 19 .':G'.$fila+ 19)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 19 .':G'.$fila+ 19)->applyFromArray($oddRow);
    }
    $fila++;

}

$sheet->setCellValue('A'.$fila+19, "SubTotal");
$sheet->setCellValue('D'.$fila+19, $final10);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila + 19 .':C'.$fila + 19);
    $spreadsheet->getActiveSheet()->mergeCells('D'.$fila + 19 .':G'.$fila + 19);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 19 .':G'.$fila+ 19)->applyFromArray($subtotal);
$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 19)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Historial de Productos.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();