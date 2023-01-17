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
$spreadsheet->getActiveSheet()->getStyle('C')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2);
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
$spreadsheet->getActiveSheet()->getStyle('H2:I2')->applyFromArray($tableHead);
$sheet->setCellValue('H2' , "VISTA PREVIA:");

$sheet->setCellValue('H3', "Entradas");
$sheet->setCellValue('I3', $final14);

$sheet->setCellValue('H4', "Salidas");
$sheet->setCellValue('I4', $final16);

$sheet->setCellValue('H5', "Resta de Entradas - Salidas:");
$sheet->setCellValue('I5', $final18);

$sheet->setCellValue('H6', "Saldo(Precio):");
$sheet->setCellValue('I6', $final20);

$sheet->setCellValue('H7', "SubTotal");
$sheet->setCellValue('I7', $final);

$spreadsheet->getActiveSheet()->getStyle('K2:L2')->applyFromArray($tableHead);
$sheet->setCellValue('K2' , "PERIODO DE MOVIMIENTO:");
$sheet->setCellValue('K3', "De");
$sheet->setCellValue('L3', $f1);
$sheet->setCellValue('K4', "AL");
$sheet->setCellValue('L4', $f1);
$sheet->setCellValue('K5', "Codigo del Productos");
$sheet->setCellValue('L5', $Comprovante);
$sheet->setCellValue('K6', "Descripción");
$sheet->setCellValue('L6', $descripcion);
$sheet->setCellValue('K7', "Unidad de Medida");
$sheet->setCellValue('L7', $um);
$spreadsheet->getActiveSheet()->mergeCells('K2:L2');

$spreadsheet->getActiveSheet()->getStyle('K3:L3')->applyFromArray($evenRow);
$spreadsheet->getActiveSheet()->getStyle('K4:L4')->applyFromArray($oddRow);
$spreadsheet->getActiveSheet()->getStyle('K5:L5')->applyFromArray($evenRow);
$spreadsheet->getActiveSheet()->getStyle('K6:L6')->applyFromArray($oddRow);
$spreadsheet->getActiveSheet()->getStyle('K7:L7')->applyFromArray($evenRow);


$spreadsheet->getActiveSheet()->getStyle('H3:I3')->applyFromArray($evenRow);
$spreadsheet->getActiveSheet()->getStyle('H4:I4')->applyFromArray($oddRow);
$spreadsheet->getActiveSheet()->getStyle('H5:I5')->applyFromArray($evenRow);
$spreadsheet->getActiveSheet()->getStyle('H6:I6')->applyFromArray($oddRow);
$spreadsheet->getActiveSheet()->getStyle('H7:I7')->applyFromArray($subtotal);

$spreadsheet->getActiveSheet()->getStyle('N2:O2')->applyFromArray($tableHead);
$sheet->setCellValue('N2' , "ENTRADAS POR MES:");
$sql1="SELECT SUM(Entradas),fecha_registro FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Mes;";
$result1 = mysqli_query($conn, $sql1);
while ($productos = mysqli_fetch_array($result1)){
    $mes=date("m",strtotime($productos['fecha_registro']));
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


    $sheet->setCellValue('N' .$fila1, $mes);
    $sheet->setCellValue('O' .$fila1, $cantidad);
    $spreadsheet->getActiveSheet()->mergeCells('N2:O2');

    if( $fila1 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('N'.$fila1.':O'.$fila1)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('N'.$fila1.':O'.$fila1)->applyFromArray($oddRow);
    }
    $fila1++;

}

$sheet->setCellValue('N' .$fila1, "SubTotal");
$sheet->setCellValue('O' .$fila1, $final8);
$spreadsheet->getActiveSheet()->getStyle('N'.$fila1.':O'.$fila1)->applyFromArray($subtotal);

$spreadsheet->getActiveSheet()->getStyle('Q2:R2')->applyFromArray($tableHead);

$sheet->setCellValue('Q2' , "SALIDAS POR MES:");
$sql2="SELECT SUM(Salidas),fecha_registro FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Mes;";
$result2 = mysqli_query($conn, $sql2);
while ($productos = mysqli_fetch_array($result2)){
    $mes=date("m",strtotime($productos['fecha_registro']));
    $cantidad=$productos['SUM(Salidas)'];
    $final9 += $cantidad;

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


    $sheet->setCellValue('Q' .$fila2, $mes);
    $sheet->setCellValue('R' .$fila2, $cantidad);
    $spreadsheet->getActiveSheet()->mergeCells('Q2:R2');

    if( $fila2 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('Q'.$fila2.':R'.$fila2)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('Q'.$fila2.':R'.$fila2)->applyFromArray($oddRow);
    }
    $fila2++;

}

$sheet->setCellValue('Q' .$fila2, "SubTotal");
$sheet->setCellValue('R' .$fila2, $final9);
$spreadsheet->getActiveSheet()->getStyle('Q'.$fila2.':R'.$fila2)->applyFromArray($subtotal);

$spreadsheet->getActiveSheet()->getStyle('T2:U2')->applyFromArray($tableHead);

$sheet->setCellValue('q2', "ENTRADAS POR AÑO:");
$sql2="SELECT SUM(Entradas),fecha_registro FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Año;";
$result2 = mysqli_query($conn, $sql2);
while ($productos = mysqli_fetch_array($result2)){
    $mes=date("Y",strtotime($productos['fecha_registro']));
    $cantidad=$productos['SUM(Entradas)'];
    $final9 += $cantidad;


    $sheet->setCellValue('T' .$fila3, $mes);
    $sheet->setCellValue('U' .$fila3, $cantidad);
    $spreadsheet->getActiveSheet()->mergeCells('T2:U2');

    if( $fila3 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('T'.$fila3.':U'.$fila3)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('T'.$fila3.':U'.$fila3)->applyFromArray($oddRow);
    }
    $fila3++;

}

$sheet->setCellValue('T' .$fila3, "SubTotal");
$sheet->setCellValue('U' .$fila3, $final9);
$spreadsheet->getActiveSheet()->getStyle('T'.$fila3.':U'.$fila3)->applyFromArray($subtotal);

$spreadsheet->getActiveSheet()->getStyle('W2:X2')->applyFromArray($tableHead);

$sheet->setCellValue('W2', "SALIDAS POR AÑO:");
$sql2="SELECT SUM(Salidas),fecha_registro FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Año;";
$result2 = mysqli_query($conn, $sql2);
while ($productos = mysqli_fetch_array($result2)){
    $mes=date("Y",strtotime($productos['fecha_registro']));
    $cantidad=$productos['SUM(Salidas)'];
    $final10 += $cantidad;


    $sheet->setCellValue('W' .$fila4, $mes);
    $sheet->setCellValue('X' .$fila4, $cantidad);
    $spreadsheet->getActiveSheet()->mergeCells('W2:X2');

    if( $fila4 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('W'.$fila4.':X'.$fila4)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('W'.$fila4.':X'.$fila4)->applyFromArray($oddRow);
    }
    $fila4++;

}

$sheet->setCellValue('W' .$fila4, "SubTotal");
$sheet->setCellValue('X' .$fila4, $final10);
$spreadsheet->getActiveSheet()->getStyle('W'.$fila4.':X'.$fila4)->applyFromArray($subtotal);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Historial de Productos.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();