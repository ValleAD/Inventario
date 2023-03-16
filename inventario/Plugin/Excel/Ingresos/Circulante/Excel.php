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
->setCellValue('A4',"REPORTES INGRESOS DE CIRCULANTE");
//Tamaño de la letra
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(10);
$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(10);
$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(10);
$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setSize(10);

//Horientación



//Unión de celdas
$spreadsheet->getActiveSheet()->mergeCells("A1:H1");
$spreadsheet->getActiveSheet()->mergeCells("A2:H2");
$spreadsheet->getActiveSheet()->mergeCells("A3:H3");
$spreadsheet->getActiveSheet()->mergeCells("A4:H4");

//setting column width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(12.71);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(13);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(36.57);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(13.14);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(16);

$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(13);
$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(15.71);

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
$drawing1->setCoordinates('F1');
$drawing1->setOffsetX(50);
$drawing1->setOffsetY(10);
$drawing1->setWidth(150);
$drawing1->getShadow()->setVisible(true);
$drawing1->getShadow()->setDirection(45);
$drawing1->setWorksheet($spreadsheet->getActiveSheet());
//header text
$sheet->setCellValue('A7', 'N° Circulante');
$sheet->setCellValue('B7', 'Código');
$sheet->setCellValue('C7', 'Descripción');
$sheet->setCellValue('D7', 'U/M');
$sheet->setCellValue('E7', 'Cantidad');
$sheet->setCellValue('F7', 'Costo Unitario');
$sheet->setCellValue('G7', 'Total');
$sheet->setCellValue('H7', 'Fecha Registro');

$spreadsheet->getActiveSheet()->getStyle('A:S')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('A:S')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('A:S')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F:G')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);
$spreadsheet->getActiveSheet()->getStyle('H4:H5')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

$spreadsheet->getActiveSheet()->getStyle('H')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('J3')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('P')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('T')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getHeaderFooter()
->setOddFooter( '&RPage &P al &N');

$spreadsheet->getActiveSheet()->getRowDimension(7)->setRowHeight(21.75, 'pt');

//set font style and background color
$spreadsheet->getActiveSheet()->getStyle('A7:H7')->applyFromArray($tableHead);
$spreadsheet->getActiveSheet()->getPageSetup()
->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
$fila = 8;
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
if (isset($_POST['circulante'])) {
      
   $sql = "SELECT codCirculante, codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,tb_circulante,fecha_solicitud,estado FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante  ";
  }
if (isset($_POST['circulante1'])) {$idusuario=$_POST['idusuario'];
    
      $sql = "SELECT codCirculante, codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,tb_circulante,fecha_solicitud,estado FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE idusuario='$idusuario'  ";
}
   $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){

   $precio   =    $productos['precio'];  
   $cant_aprobada=$productos['SUM(stock)'];
   $final2 += $cant_aprobada;
   $final8 += $precio;

   if ($productos['estado']="Pendiente") {  
    $total = $productos['SUM(stock)'] * $productos['precio'];
}if ($productos['estado']="Rechazado") {

    $total = $productos['SUM(stock)'] * $productos['precio'];
}if ($productos['estado']=="Aprobado") {

    $total = $productos['SUM(cantidad_despachada)'] * $productos['precio'];
}
$final += $total;
$total1= number_format($total, 2, ".",",");
$final1=number_format($final, 2, ".",","); 

if ($productos['idusuario']==1) {
    $u='Administrador';
}
else {
    $u='Cliente';
}



$sheet->setCellValue('A' .$fila, $productos['codCirculante']);
$sheet->setCellValue('B' .$fila, $productos['codigo']);
$sheet->setCellValue('C' .$fila, $productos['descripcion']);
$sheet->setCellValue('D' .$fila, $productos['unidad_medida']);
$sheet->setCellValue('E' .$fila, $cant_aprobada);
$sheet->setCellValue('F' .$fila, $precio);
$sheet->setCellValue('G' .$fila, $total);
$sheet->setCellValue('H' .$fila, $productos['fecha_solicitud']);
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
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 2 .':H'.$fila + 2)->applyFromArray($tableHead);
$sheet->setCellValue('A'.$fila +2 ,"VISTA PREVIA: ");
$sheet->setCellValue('A'.$fila +3 ,"Cant Solicitada: ");
$sheet->setCellValue('D'.$fila +3 ,$final2);
$sheet->setCellValue('A'.$fila +4 ,"Costo Unitario: ");
$sheet->setCellValue('D'.$fila +4 ,$final8);
$sheet->setCellValue('A'.$fila +5 ,"SubTotal: ");
$sheet->setCellValue('D'.$fila +5 ,$final);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':H'.$fila + 2);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':C'.$fila + 3);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 4 .':C'.$fila + 4);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 5 .':C'.$fila + 5);

$spreadsheet->getActiveSheet()->mergeCells('D'.$fila+ 3 .':H'.$fila + 3);
$spreadsheet->getActiveSheet()->mergeCells('D'.$fila+ 4 .':H'.$fila + 4);
$spreadsheet->getActiveSheet()->mergeCells('D'.$fila+ 5 .':H'.$fila + 5);

$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 3 .':H'.$fila + 3)->applyFromArray($oddRow);

$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 4 .':H'.$fila + 4)->applyFromArray($evenRow);

$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 5 .':H'.$fila + 5)->applyFromArray($subtotal);

$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 3)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 4 .':F'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);


$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 7 .':H'.$fila + 7)->applyFromArray($tableHead);

$sheet->setCellValue('A'.$fila +7 , "STOCK POR MES:");
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 7 .':H'.$fila + 7);


if (isset($_POST['circulante'])) {

    $sql1="SELECT Mes,SUM(stock) FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante  GROUP by Mes";
}if (isset($_POST['circulante1'])) {

    $sql1="SELECT Mes,SUM(stock),idusuario FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE db.idusuario='$idusuario'  GROUP by Mes";
}
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



    $sheet->setCellValue('A'.$fila +8, $mes);
    $sheet->setCellValue('D'.$fila +8, $cantidad);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 8 .':C'.$fila + 8);

    $spreadsheet->getActiveSheet()->mergeCells('D'.$fila+ 8 .':H'.$fila + 8);
    $spreadsheet->getActiveSheet()->getStyle('D'.$fila + 8)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 8 .':H'.$fila + 8)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 8 .':H'.$fila + 8)->applyFromArray($oddRow);
    }
    $fila++;
}
$sheet->setCellValue('A'.$fila +8, "SubTotal");
$sheet->setCellValue('D'.$fila +8, $final10);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 8 .':C'.$fila + 8);

$spreadsheet->getActiveSheet()->mergeCells('D'.$fila+ 8 .':H'.$fila + 8);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 8 .':H'.$fila + 8)->applyFromArray($subtotal);
$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 8)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 11 .':H'.$fila + 11)->applyFromArray($tableHead);
$sheet->setCellValue('A'.$fila +11 , "STOCK POR AÑO:");
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 11 .':H'.$fila + 11);

if (isset($_POST['circulante'])) {

    $sql2="SELECT Año,SUM(stock) FROM `detalle_circulante` D JOIN `tb_circulante` V ON D.tb_circulante=V.codCirculante GROUP by Año;";
}if (isset($_POST['circulante1'])) {

    $sql2="SELECT Año,SUM(stock) FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE db.idusuario='$idusuario'  GROUP by Año";
}
$result1 = mysqli_query($conn, $sql2);
while ($productos1 = mysqli_fetch_array($result1)){
    $Año=$productos1['Año'];
    $cantidad=$productos1['SUM(stock)'];
    $final12 += $cantidad;

    $sheet->setCellValue('A'.$fila +12, $Año);
    $sheet->setCellValue('D'.$fila +12, $cantidad);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 12 .':C'.$fila + 12);

    $spreadsheet->getActiveSheet()->mergeCells('D'.$fila+ 12 .':H'.$fila + 12);
    $spreadsheet->getActiveSheet()->getStyle('D'.$fila + 12)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 12 .':H'.$fila + 12)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 12 .':H'.$fila + 12)->applyFromArray($oddRow);
    }
$fila++;
}
    $sheet->setCellValue('A'.$fila +12, "SubTotal");
    $sheet->setCellValue('D'.$fila +12, $final12);

$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 12 .':C'.$fila + 12);

$spreadsheet->getActiveSheet()->mergeCells('D'.$fila+ 12 .':H'.$fila + 12);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 12 .':H'.$fila + 12)->applyFromArray($subtotal);
$spreadsheet->getActiveSheet()->getStyle('D'.$fila + 12)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Ingresos Circulante.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();