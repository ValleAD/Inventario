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
->setCellValue('A1',"MINISTERIO DE SALUD")
->setCellValue('A2',"HOSPITAL NACIONAL SANTA TERESA")
->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
->setCellValue('A4',"REPORTES INGRESOS DE BODEGA");
//Tamaño de la letra
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(11);
$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(11);
$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(11);
$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setSize(11);

//Horientación
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);



//Unión de celdas
$spreadsheet->getActiveSheet()->mergeCells("A1:J1");
$spreadsheet->getActiveSheet()->mergeCells("A2:J2");
$spreadsheet->getActiveSheet()->mergeCells("A3:J3");
$spreadsheet->getActiveSheet()->mergeCells("A4:J4");





//setting column width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(14);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(9);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(23.83);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(10);

$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(15.71);

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
$drawing1->setCoordinates('I1');
$drawing1->setOffsetX(-10);
$drawing1->setOffsetY(10);
$drawing1->setWidth(150);
$drawing1->getShadow()->setVisible(true);
$drawing1->getShadow()->setDirection(45);
$drawing1->setWorksheet($spreadsheet->getActiveSheet());
//header text
$sheet->setCellValue('A8', 'N° Bodega');
$sheet->setCellValue('B8', 'Departamento');
$sheet->setCellValue('C8', 'Encargado');
$sheet->setCellValue('D8', 'Código');
$sheet->setCellValue('E8', 'Descripción');
$sheet->setCellValue('F8', 'U/M');
$sheet->setCellValue('G8', 'Cantidad');
$sheet->setCellValue('H8', 'Costo Unitario');
$sheet->setCellValue('I8', 'Total');
$sheet->setCellValue('J8', 'Fecha Registro');
$spreadsheet->getActiveSheet()->getStyle('A:S')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('A:S')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('A:S')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('H:I')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);
$spreadsheet->getActiveSheet()->getStyle('L4:L5')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

$spreadsheet->getActiveSheet()->getStyle('G')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('L3')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('P')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('T')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
//set font style and background color
$spreadsheet->getActiveSheet()->getStyle('A8:J8')->applyFromArray($tableHead);
$spreadsheet->getActiveSheet()->getPageSetup()
->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

$spreadsheet->getActiveSheet()->getHeaderFooter()
->setOddFooter( '&RPágina &P al &N');
$fila = 9;
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
if (isset($_POST['bodega'])) {

    $sql = "SELECT codBodega, codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,odt_bodega,departamento,usuario,fecha_registro,Mes,Año  FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega  GROUP by codigo";
}
if (isset($_POST['bodega1'])) {$idusuario=$_POST['idusuario'];
$sql = "SELECT codBodega, codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,odt_bodega,departamento,usuario,fecha_registro,Mes,Año  FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE db.idusuario='$idusuario' GROUP by codigo";
}    $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){

 $precio   =    $productos['precio'];
 $precio2  =    number_format($precio, 2,".",",");  
 $cant_aprobada=$productos['SUM(stock)'];
 $cantidad_despachada=$productos['SUM(cantidad_despachada)'];
 $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

 $final2 += $cant_aprobada;
 $final4 += $cantidad_despachada;
 $final6 += ($cant_aprobada-$cantidad_despachada);
 $final8 += $precio;

 if ($productos['estado']="Pendiente") {  
    $total = $productos['SUM(stock)'] * $productos['precio'];
}if ($productos['estado']="Rechazado") {

    $total = $productos['SUM(stock)'] * $productos['precio'];
}if ($productos['estado']=="Aprobado") {

    $total = $productos['SUM(cantidad_despachada)'] * $productos['precio'];
}
$final += $total;


if ($productos['idusuario']==1) {
    $u='Administrador';
}
else {
    $u='Cliente';
}


$sheet->setCellValue('A' .$fila, $productos['codBodega']);
$sheet->setCellValue('B' .$fila, $productos['departamento']);
$sheet->setCellValue('C' .$fila, $productos['usuario']." "."(".$u.")");
$sheet->setCellValue('D' .$fila, $productos['codigo']);
$sheet->setCellValue('E' .$fila, $productos['descripcion']);
$sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
$sheet->setCellValue('G' .$fila, $cant_aprobada);
$sheet->setCellValue('H' .$fila, $precio2);
$sheet->setCellValue('I' .$fila, $total);
$sheet->setCellValue('J' .$fila, $productos['fecha_registro']);
if( $fila % 2 == 0 ){
        //even row
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':J'.$fila)->applyFromArray($evenRow);
}else{
        //odd row
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':J'.$fila)->applyFromArray($oddRow);
}
    //increment row
$fila++;
}
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 2 .':J'.$fila + 2)->applyFromArray($tableHead);
$sheet->setCellValue('A'.$fila +2 ,"VISTA PREVIA: ");
$sheet->setCellValue('A'.$fila +3 ,"Cant Solicitada: ");
$sheet->setCellValue('F'.$fila +3 ,$final2);
$sheet->setCellValue('A'.$fila +4 ,"Costo Unitario: ");
$sheet->setCellValue('F'.$fila +4 ,$final8);
$sheet->setCellValue('A'.$fila +5 ,"SubTotal: ");
$sheet->setCellValue('F'.$fila +5 ,$final);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':J'.$fila + 2);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':E'.$fila + 3);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 4 .':E'.$fila + 4);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 5 .':E'.$fila + 5);

$spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 3 .':J'.$fila + 3);
$spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 4 .':J'.$fila + 4);
$spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 5 .':J'.$fila + 5);

$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 3 .':J'.$fila + 3)->applyFromArray($oddRow);

$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 4 .':J'.$fila + 4)->applyFromArray($evenRow);

$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 5 .':J'.$fila + 5)->applyFromArray($subtotal);

$spreadsheet->getActiveSheet()->getStyle('F'.$fila + 3)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

$spreadsheet->getActiveSheet()->getStyle('F'.$fila + 4 .':F'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);


$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 7 .':J'.$fila + 7)->applyFromArray($tableHead);

$sheet->setCellValue('A'.$fila +7 , "STOCK POR MES:");
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 7 .':J'.$fila + 7);


if (isset($_POST['bodega'])) {

    $sql1="SELECT Mes,SUM(stock) FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega  GROUP by Mes";
}if (isset($_POST['bodega1'])) {

    $sql1="SELECT Mes,SUM(stock),idusuario FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE db.idusuario='$idusuario'  GROUP by Mes";
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
    $sheet->setCellValue('F'.$fila +8, $cantidad);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 8 .':E'.$fila + 8);

    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 8 .':J'.$fila + 8);
    $spreadsheet->getActiveSheet()->getStyle('F'.$fila + 8)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 8 .':J'.$fila + 8)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 8 .':J'.$fila + 8)->applyFromArray($oddRow);
    }
    $fila++;
}
$sheet->setCellValue('A'.$fila +8, "SubTotal");
$sheet->setCellValue('F'.$fila +8, $final10);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 8 .':E'.$fila + 8);

$spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 8 .':J'.$fila + 8);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 8 .':J'.$fila + 8)->applyFromArray($subtotal);
$spreadsheet->getActiveSheet()->getStyle('F'.$fila + 8)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 11 .':J'.$fila + 11)->applyFromArray($tableHead);
$sheet->setCellValue('A'.$fila +11 , "STOCK POR AÑO:");
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 11 .':J'.$fila + 11);

if (isset($_POST['bodega'])) {

    $sql2="SELECT Año,SUM(stock) FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega GROUP by Año;";
}if (isset($_POST['bodega1'])) {

    $sql2="SELECT Año,SUM(stock) FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE db.idusuario='$idusuario'  GROUP by Año";
}
$result1 = mysqli_query($conn, $sql2);
while ($productos1 = mysqli_fetch_array($result1)){
    $Año=$productos1['Año'];
    $cantidad=$productos1['SUM(stock)'];
    $final12 += $cantidad;

    $sheet->setCellValue('A'.$fila +12, $Año);
    $sheet->setCellValue('F'.$fila +12, $cantidad);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 12 .':E'.$fila + 12);

    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 12 .':J'.$fila + 12);
    $spreadsheet->getActiveSheet()->getStyle('F'.$fila + 12)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 12 .':J'.$fila + 12)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 12 .':J'.$fila + 12)->applyFromArray($oddRow);
    }
$fila++;
}
    $sheet->setCellValue('A'.$fila +12, "SubTotal");
    $sheet->setCellValue('F'.$fila +12, $final12);

$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 12 .':E'.$fila + 12);

$spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 12 .':J'.$fila + 12);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 12 .':J'.$fila + 12)->applyFromArray($subtotal);
$spreadsheet->getActiveSheet()->getStyle('F'.$fila + 12)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Egreso Bodega.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();