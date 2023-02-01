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
$Pendiente = [
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

if (isset($_POST['vale'])) {
    $spreadsheet->getActiveSheet()
    ->setCellValue('A1',"MINISTERIO DE SALUD")
    ->setCellValue('A2',"HOSPITAL NACIONAL SANTA TERESA")
    ->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
    ->setCellValue('A4',"REPORTES DE DETALLES DE VALE");
}
if (isset($_POST['bodega'])) {
    $spreadsheet->getActiveSheet()
    ->setCellValue('A1',"MINISTERIO DE SALUD")
    ->setCellValue('A2',"HOSPITAL NACIONAL SANTA TERESA")
    ->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
    ->setCellValue('A4',"REPORTES DE DETALLES DE BODEGA");
}
if (isset($_POST['circulante'])) {
    $spreadsheet->getActiveSheet()
    ->setCellValue('A1',"MINISTERIO DE SALUD")
    ->setCellValue('A2',"HOSPITAL NACIONAL SANTA TERESA")
    ->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
    ->setCellValue('A4',"REPORTES DE DETALLES DE CIRCULANTE");
}
if (isset($_POST['compra'])) {
    $spreadsheet->getActiveSheet()
    ->setCellValue('A1',"MINISTERIO DE SALUD")
    ->setCellValue('A2',"HOSPITAL NACIONAL SANTA TERESA")
    ->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
    ->setCellValue('A4',"REPORTES DE DETALLES DE COMPRA");
}if (isset($_POST['almacen'])) {
    $spreadsheet->getActiveSheet()
    ->setCellValue('A1',"MINISTERIO DE SALUD")
    ->setCellValue('A2',"HOSPITAL NACIONAL SANTA TERESA")
    ->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
    ->setCellValue('A4',"REPORTES DE DETALLES DE ALMACEN");
}if (isset($_POST['vale1'])) {
    $spreadsheet->getActiveSheet()
    ->setCellValue('A1',"MINISTERIO DE SALUD")
    ->setCellValue('A2',"HOSPITAL NACIONAL SANTA TERESA")
    ->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
    ->setCellValue('A4',"REPORTES DE DT VALE");
}
if (isset($_POST['bodega1'])) {
    $spreadsheet->getActiveSheet()
    ->setCellValue('A1',"MINISTERIO DE SALUD")
    ->setCellValue('A2',"HOSPITAL NACIONAL SANTA TERESA")
    ->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
    ->setCellValue('A4',"REPORTES DE DT BODEGA");
}
if (isset($_POST['circulante1'])) {
    $spreadsheet->getActiveSheet()
    ->setCellValue('A1',"MINISTERIO DE SALUD")
    ->setCellValue('A2',"HOSPITAL NACIONAL SANTA TERESA")
    ->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
    ->setCellValue('A4',"REPORTES DE DT CIRCULANTE");
}
if (isset($_POST['compra1'])) {
    $spreadsheet->getActiveSheet()
    ->setCellValue('A1',"MINISTERIO DE SALUD")
    ->setCellValue('A2',"HOSPITAL NACIONAL SANTA TERESA")
    ->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
    ->setCellValue('A4',"REPORTES DE DT COMPRA");
}if (isset($_POST['almacen1'])) {
    $spreadsheet->getActiveSheet()
    ->setCellValue('A1',"MINISTERIO DE SALUD")
    ->setCellValue('A2',"HOSPITAL NACIONAL SANTA TERESA")
    ->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
    ->setCellValue('A4',"REPORTES DE DT ALMACEN");
}
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
$spreadsheet->getActiveSheet()->getHeaderFooter()
->setOddFooter( '&RPágina &P al &N');

if (isset($_POST['vale']) || 
    isset($_POST['bodega']) || 
    isset($_POST['compra']) || 
    isset($_POST['almacen']) ||
    isset($_POST['vale1']) || 
    isset($_POST['bodega1']) || 
    isset($_POST['compra1']) || 
    isset($_POST['almacen1'])) {
//Unión de celdas
    $spreadsheet->getActiveSheet()->mergeCells("A1:J1");
$spreadsheet->getActiveSheet()->mergeCells("A2:J2");
$spreadsheet->getActiveSheet()->mergeCells("A3:J3");
$spreadsheet->getActiveSheet()->mergeCells("A4:J4");

//setting column width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10.57);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15.29);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(13.57);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(9);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(23.83);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(10);

$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(20.57);
$spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(15.71);
$spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(17.43);

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
}
if (isset($_POST['circulante']) || isset($_POST['circulante1'])) {

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
   $spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(20.57);
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
}
//header text
if (isset($_POST['vale']) || isset($_POST['vale1'])) {
    $sheet->setCellValue('A7', 'N° Vale');
    $sheet->setCellValue('B7', 'Departamento');
    $sheet->setCellValue('C7', 'Encargado');
    $sheet->setCellValue('D7', 'Código');
    $sheet->setCellValue('E7', 'Descripción');
    $sheet->setCellValue('F7', 'U/M');
    $sheet->setCellValue('G7', 'Cantidad');
    $sheet->setCellValue('H7', 'Costo Unitario');
    $sheet->setCellValue('I7', 'Total');
    $sheet->setCellValue('J7', 'Fecha Registro');
}
if (isset($_POST['bodega']) || isset($_POST['bodega1'])) {
    $sheet->setCellValue('A7', 'N° Bodega');
    $sheet->setCellValue('B7', 'Departamento');
    $sheet->setCellValue('C7', 'Encargado');
    $sheet->setCellValue('D7', 'Código');
    $sheet->setCellValue('E7', 'Descripción');
    $sheet->setCellValue('F7', 'U/M');
    $sheet->setCellValue('G7', 'Cantidad');
    $sheet->setCellValue('H7', 'Costo Unitario');
    $sheet->setCellValue('I7', 'Total');
    $sheet->setCellValue('J7', 'Fecha Registro');
}
if (isset($_POST['compra']) || isset($_POST['compra1'])) {
    $sheet->setCellValue('A7', 'N° de Solicitud');
    $sheet->setCellValue('B7', 'Dependencia');
    $sheet->setCellValue('C7', 'Encargado');
    $sheet->setCellValue('D7', 'Código');
    $sheet->setCellValue('E7', 'Descripción');
    $sheet->setCellValue('F7', 'U/M');
    $sheet->setCellValue('G7', 'Cantidad');
    $sheet->setCellValue('H7', 'Costo Unitario');
    $sheet->setCellValue('I7', 'Total');
    $sheet->setCellValue('J7', 'Fecha Registro');
}
if (isset($_POST['almacen']) || isset($_POST['almacen1'])) {
    $sheet->setCellValue('A7', 'N° Almacen');
    $sheet->setCellValue('B7', 'Departamento');
    $sheet->setCellValue('C7', 'Encargado');
    $sheet->setCellValue('D7', 'Código');
    $sheet->setCellValue('E7', 'Descripción');
    $sheet->setCellValue('F7', 'U/M');
    $sheet->setCellValue('G7', 'Cantidad');
    $sheet->setCellValue('H7', 'Costo Unitario');
    $sheet->setCellValue('I7', 'Total');
    $sheet->setCellValue('J7', 'Fecha Registro');
}
if (isset($_POST['circulante']) || isset($_POST['circulante1'])) {
    $sheet->setCellValue('A7', 'N° Circulante');
    $sheet->setCellValue('B7', 'Código');
    $sheet->setCellValue('C7', 'Descripción');
    $sheet->setCellValue('D7', 'U/M');
    $sheet->setCellValue('E7', 'Cantidad');
    $sheet->setCellValue('F7', 'Costo Unitario');
    $sheet->setCellValue('G7', 'Total');
    $sheet->setCellValue('H7', 'Fecha Registro');
}

$spreadsheet->getActiveSheet()->getStyle('A:S')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('A:S')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('A:S')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('H:I')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

$spreadsheet->getActiveSheet()->getStyle('G')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

$spreadsheet->getActiveSheet()->getRowDimension(7)->setRowHeight(30, 'pt');

//set font style and background color
if (isset($_POST['vale']) || 
    isset($_POST['bodega']) || 
    isset($_POST['compra']) || 
    isset($_POST['almacen']) ||
    isset($_POST['vale1']) || 
    isset($_POST['bodega1']) || 
    isset($_POST['compra1']) || 
    isset($_POST['almacen1'])) {
    $spreadsheet->getActiveSheet()->getStyle('A7:J7')->applyFromArray($tableHead);
}
if (isset($_POST['circulante']) || isset($_POST['circulante1'])) {
    $spreadsheet->getActiveSheet()->getStyle('A7:H7')->applyFromArray($tableHead);
}
$spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

$fila=8; 
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
if (isset($_POST['vale'])) {
    $vale = $_POST['vale'];
    $jus=$_POST['jus'];
    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE numero_vale = $vale";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

     $precio   =    $productos['precio'];
     $precio2  =    number_format($precio, 2,".",",");  
     $cant_aprobada=$productos['stock'];
     $cantidad_despachada=$productos['cantidad_despachada'];
     $stock=number_format($cant_aprobada, 2,".",",");
     $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

     $final2 += $cant_aprobada;
     $final3   =    number_format($final2, 2, ".",",");

     $final4 += $cantidad_despachada;
     $final5   =    number_format($final4, 2, ".",",");

     $final6 += ($cant_aprobada-$cantidad_despachada);
     $final7   =    number_format($final6, 2, ".",",");

     $final8 += $precio;
     $final9   =    number_format($final8, 2, ".",",");
     if ($productos['estado']="Pendiente") {  
        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']="Rechazado") {

        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']=="Aprobado") {

        $total = $productos['cantidad_despachada'] * $productos['precio'];
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

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila+2)->applyFromArray($tableHead);
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila+2)->applyFromArray($tableHead);
    $sheet->setCellValue('A'.$fila +2 , "VISTA PREVIA:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':C'.$fila + 2);

    $sheet->setCellValue('A'.$fila +3 ,"Cant Solicitada: ");
    $sheet->setCellValue('C'.$fila +3 ,$final3);
    $sheet->setCellValue('A'.$fila +4 ,"Costo Unitario: ");
    $sheet->setCellValue('C'.$fila +4 ,$final9);
    $sheet->setCellValue('A'.$fila +5 ,"SubTotal: ");
    $sheet->setCellValue('C'.$fila +5 ,$final1);
    
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila + 3)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    $spreadsheet->getActiveSheet()->getStyle('B'.$fila + 4 .':C'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 3 .':C'.$fila + 3)->applyFromArray($evenRow);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 4 .':C'.$fila + 4)->applyFromArray($oddRow);
    
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 5 .':C'.$fila + 5)->applyFromArray($subtotal);


    $sheet->setCellValue('A' .$fila, $productos['codVale']);
    $sheet->setCellValue('B' .$fila, $productos['departamento']);
    $sheet->setCellValue('C' .$fila, $productos['usuario']." "."(".$u.")");
    $sheet->setCellValue('D' .$fila, $productos['codigo']);
    $sheet->setCellValue('E' .$fila, $productos['descripcion']);
    $sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
    $sheet->setCellValue('G' .$fila, $stock);
    $sheet->setCellValue('H' .$fila, $precio2);
    $sheet->setCellValue('I' .$fila, $total1);
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
$spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 1 .':J'.$fila + 1)->applyFromArray($tableHead);
$sheet->setCellValue('E'.$fila +1 , "VISTA PREVIA:");
$spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 1 .':J'.$fila + 1);

$sql1="SELECT * FROM tb_vale WHERE codVale=$vale";
$result1 = mysqli_query($conn, $sql1);
while ($productos1 = mysqli_fetch_array($result1)){
    $title="Departamento";
    $title1="N° Vale";
    $title2="Encargado";
    $title3="Fecha";
    $title4="Estado";
    $body=$productos1['departamento'];
    $body1=$productos1['codVale'];
    $body2=$productos1['usuario'];
    $body3=$productos1['fecha_registro'];
    $body4=$productos1['estado'];
    $sheet->setCellValue('E'.$fila+2, $title);
    $sheet->setCellValue('E'.$fila+3, $title1);
    $sheet->setCellValue('E'.$fila+4, $title2);
    $sheet->setCellValue('E'.$fila+5, $title3);
    $sheet->setCellValue('E'.$fila+6, $title4);
    $sheet->setCellValue('F'.$fila+2, $body);
    $sheet->setCellValue('F'.$fila+3, $body1);
    $sheet->setCellValue('F'.$fila+4, $body2);
    $sheet->setCellValue('F'.$fila+5, $body3);
    $sheet->setCellValue('F'.$fila+6, $body4);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':B'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':B'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 4 .':B'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 5 .':B'.$fila + 5);

    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 2 .':J'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 3 .':J'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 4 .':J'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 5 .':J'.$fila + 5);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 6 .':J'.$fila + 6);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 2 .':F'.$fila + 2)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 3 .':F'.$fila + 3)->applyFromArray($oddRow);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 4 .':F'.$fila + 4)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 5 .':F'.$fila + 5)->applyFromArray($oddRow); 
    if ($body4=="Pendiente") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Pendiente);
    }if ($body4=="Aprobado") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Aprobado);
    }if ($body4=="Rechazado") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Rechazado);
    }
}
$sheet->setCellValue('A'.$fila+8, "Observaciones (En qué se ocupará el bien entregado)");
$sheet->setCellValue('A'.$fila+9, $jus);
$spreadsheet->getActiveSheet()->getRowDimension($fila +8)->setRowHeight(25, 'pt');
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 8 .':J'.$fila + 8);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 9 .':J'.$fila + 9);

$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 9)->getAlignment()->setWrapText(true);


$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 8 .':J'.$fila + 8)->applyFromArray($tableHead);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 9 .':J'.$fila + 9)->applyFromArray($oddRow);
  
    $sheet->setCellValue('A' .$fila + 11, "Solicita:");
    $sheet->setCellValue('C' .$fila + 15, "Autoriza:");
    $sheet->setCellValue('H' .$fila + 11, "Entrega:");
    $sheet->setCellValue('A' .$fila + 12, "F. ________________");

    $sheet->setCellValue('C' .$fila + 16, "F. ________________");

    $sheet->setCellValue('H' .$fila + 12, "F. ________________");


    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 11 .':B'.$fila + 11);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 12 .':B'.$fila + 12);

    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 15 .':F'.$fila + 15);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 16 .':F'.$fila + 16);

    $spreadsheet->getActiveSheet()->mergeCells('H'.$fila+ 11 .':J'.$fila + 11);
    $spreadsheet->getActiveSheet()->mergeCells('H'.$fila+ 12 .':J'.$fila + 12);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +11)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +12)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +8)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +9)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +8)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +9)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +15)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +16)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +15)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +16)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +11)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +12)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +11)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +12)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


}
if (isset($_POST['bodega'])) {
    $vale = $_POST['bodega'];
    $sql = "SELECT * FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega WHERE odt_bodega = $vale";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

     $precio   =    $productos['precio'];
     $precio2  =    number_format($precio, 2,".",",");  
     $cant_aprobada=$productos['stock'];
     $cantidad_despachada=$productos['cantidad_despachada'];
     $stock=number_format($cant_aprobada, 2,".",",");
     $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

     $final2 += $cant_aprobada;
     $final3   =    number_format($final2, 2, ".",",");

     $final4 += $cantidad_despachada;
     $final5   =    number_format($final4, 2, ".",",");

     $final6 += ($cant_aprobada-$cantidad_despachada);
     $final7   =    number_format($final6, 2, ".",",");

     $final8 += $precio;
     $final9   =    number_format($final8, 2, ".",",");
     if ($productos['estado']="Pendiente") {  
        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']="Rechazado") {

        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']=="Aprobado") {

        $total = $productos['cantidad_despachada'] * $productos['precio'];
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
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila+2)->applyFromArray($tableHead);
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila+2)->applyFromArray($tableHead);
    $sheet->setCellValue('A'.$fila +2 , "VISTA PREVIA:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':C'.$fila + 2);

    $sheet->setCellValue('A'.$fila +3 ,"Cant Solicitada: ");
    $sheet->setCellValue('C'.$fila +3 ,$final3);
    $sheet->setCellValue('A'.$fila +4 ,"Costo Unitario: ");
    $sheet->setCellValue('C'.$fila +4 ,$final9);
    $sheet->setCellValue('A'.$fila +5 ,"SubTotal: ");
    $sheet->setCellValue('C'.$fila +5 ,$final1);
    
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila + 3)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    $spreadsheet->getActiveSheet()->getStyle('B'.$fila + 4 .':C'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 3 .':C'.$fila + 3)->applyFromArray($evenRow);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 4 .':C'.$fila + 4)->applyFromArray($oddRow);
    
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 5 .':C'.$fila + 5)->applyFromArray($subtotal);


    $sheet->setCellValue('A' .$fila, $productos['codBodega']);
    $sheet->setCellValue('B' .$fila, $productos['departamento']);
    $sheet->setCellValue('C' .$fila, $productos['usuario']." "."(".$u.")");
    $sheet->setCellValue('D' .$fila, $productos['codigo']);
    $sheet->setCellValue('E' .$fila, $productos['descripcion']);
    $sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
    $sheet->setCellValue('G' .$fila, $stock);
    $sheet->setCellValue('H' .$fila, $precio2);
    $sheet->setCellValue('I' .$fila, $total1);
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
$spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 1 .':J'.$fila + 1)->applyFromArray($tableHead);
$sheet->setCellValue('E'.$fila +1 , "VISTA PREVIA:");
$spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 1 .':J'.$fila + 1);

$sql1="SELECT * FROM tb_bodega WHERE codBodega=$vale";
$result1 = mysqli_query($conn, $sql1);
while ($productos1 = mysqli_fetch_array($result1)){
    $title="Departamento";
    $title1="O. de T. No.";
    $title2="Encargado";
    $title3="Fecha";
    $title4="Estado";
    $body=$productos1['departamento'];
    $body1=$productos1['codBodega'];
    $body2=$productos1['usuario'];
    $body3=$productos1['fecha_registro'];
    $body4=$productos1['estado'];
    $sheet->setCellValue('E'.$fila+2, $title);
    $sheet->setCellValue('E'.$fila+3, $title1);
    $sheet->setCellValue('E'.$fila+4, $title2);
    $sheet->setCellValue('E'.$fila+5, $title3);
    $sheet->setCellValue('E'.$fila+6, $title4);
    $sheet->setCellValue('F'.$fila+2, $body);
    $sheet->setCellValue('F'.$fila+3, $body1);
    $sheet->setCellValue('F'.$fila+4, $body2);
    $sheet->setCellValue('F'.$fila+5, $body3);
    $sheet->setCellValue('F'.$fila+6, $body4);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':B'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':B'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 4 .':B'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 5 .':B'.$fila + 5);

    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 2 .':J'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 3 .':J'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 4 .':J'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 5 .':J'.$fila + 5);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 6 .':J'.$fila + 6);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 2 .':F'.$fila + 2)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 3 .':F'.$fila + 3)->applyFromArray($oddRow);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 4 .':F'.$fila + 4)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 5 .':F'.$fila + 5)->applyFromArray($oddRow); 
    if ($body4=="Pendiente") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Pendiente);
    }if ($body4=="Aprobado") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Aprobado);
    }if ($body4=="Rechazado") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Rechazado);
    }
}
}
if (isset($_POST['vale1'])) {
    $vale = $_POST['vale1'];
    $jus=$_POST['jus'];
    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE numero_vale = $vale";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

     $precio   =    $productos['precio'];
     $precio2  =    number_format($precio, 2,".",",");  
     $cant_aprobada=$productos['stock'];
     $cantidad_despachada=$productos['cantidad_despachada'];
     $stock=number_format($cant_aprobada, 2,".",",");
     $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

     $final2 += $cant_aprobada;
     $final3   =    number_format($final2, 2, ".",",");

     $final4 += $cantidad_despachada;
     $final5   =    number_format($final4, 2, ".",",");

     $final6 += ($cant_aprobada-$cantidad_despachada);
     $final7   =    number_format($final6, 2, ".",",");

     $final8 += $precio;
     $final9   =    number_format($final8, 2, ".",",");
     if ($productos['estado']="Pendiente") {  
        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']="Rechazado") {

        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']=="Aprobado") {

        $total = $productos['cantidad_despachada'] * $productos['precio'];
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

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila+2)->applyFromArray($tableHead);
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila+2)->applyFromArray($tableHead);
    $sheet->setCellValue('A'.$fila +2 , "VISTA PREVIA:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':C'.$fila + 2);

    $sheet->setCellValue('A'.$fila +3 ,"Cant Solicitada: ");
    $sheet->setCellValue('C'.$fila +3 ,$final3);
    $sheet->setCellValue('A'.$fila +4 ,"Costo Unitario: ");
    $sheet->setCellValue('C'.$fila +4 ,$final9);
    $sheet->setCellValue('A'.$fila +5 ,"SubTotal: ");
    $sheet->setCellValue('C'.$fila +5 ,$final1);
    
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila + 3)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    $spreadsheet->getActiveSheet()->getStyle('B'.$fila + 4 .':C'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 3 .':C'.$fila + 3)->applyFromArray($evenRow);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 4 .':C'.$fila + 4)->applyFromArray($oddRow);
    
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 5 .':C'.$fila + 5)->applyFromArray($subtotal);


    $sheet->setCellValue('A' .$fila, $productos['codVale']);
    $sheet->setCellValue('B' .$fila, $productos['departamento']);
    $sheet->setCellValue('C' .$fila, $productos['usuario']." "."(".$u.")");
    $sheet->setCellValue('D' .$fila, $productos['codigo']);
    $sheet->setCellValue('E' .$fila, $productos['descripcion']);
    $sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
    $sheet->setCellValue('G' .$fila, $stock);
    $sheet->setCellValue('H' .$fila, $precio2);
    $sheet->setCellValue('I' .$fila, $total1);
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
$spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 1 .':J'.$fila + 1)->applyFromArray($tableHead);
$sheet->setCellValue('E'.$fila +1 , "VISTA PREVIA:");
$spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 1 .':J'.$fila + 1);

$sql1="SELECT * FROM tb_vale WHERE codVale=$vale";
$result1 = mysqli_query($conn, $sql1);
while ($productos1 = mysqli_fetch_array($result1)){
    $title="Departamento";
    $title1="N° Vale";
    $title2="Encargado";
    $title3="Fecha";
    $title4="Estado";
    $body=$productos1['departamento'];
    $body1=$productos1['codVale'];
    $body2=$productos1['usuario'];
    $body3=$productos1['fecha_registro'];
    $body4=$productos1['estado'];
    $sheet->setCellValue('E'.$fila+2, $title);
    $sheet->setCellValue('E'.$fila+3, $title1);
    $sheet->setCellValue('E'.$fila+4, $title2);
    $sheet->setCellValue('E'.$fila+5, $title3);
    $sheet->setCellValue('E'.$fila+6, $title4);
    $sheet->setCellValue('F'.$fila+2, $body);
    $sheet->setCellValue('F'.$fila+3, $body1);
    $sheet->setCellValue('F'.$fila+4, $body2);
    $sheet->setCellValue('F'.$fila+5, $body3);
    $sheet->setCellValue('F'.$fila+6, $body4);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':B'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':B'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 4 .':B'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 5 .':B'.$fila + 5);

    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 2 .':J'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 3 .':J'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 4 .':J'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 5 .':J'.$fila + 5);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 6 .':J'.$fila + 6);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 2 .':F'.$fila + 2)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 3 .':F'.$fila + 3)->applyFromArray($oddRow);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 4 .':F'.$fila + 4)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 5 .':F'.$fila + 5)->applyFromArray($oddRow); 
    if ($body4=="Pendiente") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Pendiente);
    }if ($body4=="Aprobado") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Aprobado);
    }if ($body4=="Rechazado") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Rechazado);
    }
}
$sheet->setCellValue('A'.$fila+8, "Observaciones (En qué se ocupará el bien entregado)");
$sheet->setCellValue('A'.$fila+9, $jus);

$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 8 .':J'.$fila + 8);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 9 .':J'.$fila + 9);

$spreadsheet->getActiveSheet()->getRowDimension($fila +8)->setRowHeight(25, 'pt');
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 8 .':J'.$fila + 8)->applyFromArray($tableHead);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 9 .':J'.$fila + 9)->applyFromArray($oddRow);
  
    $sheet->setCellValue('A' .$fila + 11, "Solicita:");
    $sheet->setCellValue('C' .$fila + 15, "Autoriza:");
    $sheet->setCellValue('H' .$fila + 11, "Entrega:");
    $sheet->setCellValue('A' .$fila + 12, "F. ________________");

    $sheet->setCellValue('C' .$fila + 16, "F. ________________");

    $sheet->setCellValue('H' .$fila + 12, "F. ________________");


    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 11 .':B'.$fila + 11);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 12 .':B'.$fila + 12);

    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 15 .':F'.$fila + 15);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 16 .':F'.$fila + 16);

    $spreadsheet->getActiveSheet()->mergeCells('H'.$fila+ 11 .':J'.$fila + 11);
    $spreadsheet->getActiveSheet()->mergeCells('H'.$fila+ 12 .':J'.$fila + 12);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +11)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +12)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +8)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +9)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +8)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +9)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +15)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +16)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +15)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +16)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +11)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +12)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +11)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +12)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

}


if (isset($_POST['bodega1'])) {
    $vale = $_POST['bodega1'];
    $sql = "SELECT * FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega WHERE odt_bodega = $vale";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

     $precio   =    $productos['precio'];
     $precio2  =    number_format($precio, 2,".",",");  
     $cant_aprobada=$productos['stock'];
     $cantidad_despachada=$productos['cantidad_despachada'];
     $stock=number_format($cant_aprobada, 2,".",",");
     $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

     $final2 += $cant_aprobada;
     $final3   =    number_format($final2, 2, ".",",");

     $final4 += $cantidad_despachada;
     $final5   =    number_format($final4, 2, ".",",");

     $final6 += ($cant_aprobada-$cantidad_despachada);
     $final7   =    number_format($final6, 2, ".",",");

     $final8 += $precio;
     $final9   =    number_format($final8, 2, ".",",");
     if ($productos['estado']="Pendiente") {  
        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']="Rechazado") {

        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']=="Aprobado") {

        $total = $productos['cantidad_despachada'] * $productos['precio'];
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
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila+2)->applyFromArray($tableHead);
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila+2)->applyFromArray($tableHead);
    $sheet->setCellValue('A'.$fila +2 , "VISTA PREVIA:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':C'.$fila + 2);

    $sheet->setCellValue('A'.$fila +3 ,"Cant Solicitada: ");
    $sheet->setCellValue('C'.$fila +3 ,$final3);
    $sheet->setCellValue('A'.$fila +4 ,"Costo Unitario: ");
    $sheet->setCellValue('C'.$fila +4 ,$final9);
    $sheet->setCellValue('A'.$fila +5 ,"SubTotal: ");
    $sheet->setCellValue('C'.$fila +5 ,$final1);
    
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila + 3)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    $spreadsheet->getActiveSheet()->getStyle('B'.$fila + 4 .':C'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 3 .':C'.$fila + 3)->applyFromArray($evenRow);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 4 .':C'.$fila + 4)->applyFromArray($oddRow);
    
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 5 .':C'.$fila + 5)->applyFromArray($subtotal);


    $sheet->setCellValue('A' .$fila, $productos['codBodega']);
    $sheet->setCellValue('B' .$fila, $productos['departamento']);
    $sheet->setCellValue('C' .$fila, $productos['usuario']." "."(".$u.")");
    $sheet->setCellValue('D' .$fila, $productos['codigo']);
    $sheet->setCellValue('E' .$fila, $productos['descripcion']);
    $sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
    $sheet->setCellValue('G' .$fila, $stock);
    $sheet->setCellValue('H' .$fila, $precio2);
    $sheet->setCellValue('I' .$fila, $total1);
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
$spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 1 .':J'.$fila + 1)->applyFromArray($tableHead);
$sheet->setCellValue('E'.$fila +1 , "VISTA PREVIA:");
$spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 1 .':J'.$fila + 1);

$sql1="SELECT * FROM tb_bodega WHERE codBodega=$vale";
$result1 = mysqli_query($conn, $sql1);
while ($productos1 = mysqli_fetch_array($result1)){
    $title="Departamento";
    $title1="O. de T. No.";
    $title2="Encargado";
    $title3="Fecha";
    $title4="Estado";
    $body=$productos1['departamento'];
    $body1=$productos1['codBodega'];
    $body2=$productos1['usuario'];
    $body3=$productos1['fecha_registro'];
    $body4=$productos1['estado'];
    $sheet->setCellValue('E'.$fila+2, $title);
    $sheet->setCellValue('E'.$fila+3, $title1);
    $sheet->setCellValue('E'.$fila+4, $title2);
    $sheet->setCellValue('E'.$fila+5, $title3);
    $sheet->setCellValue('E'.$fila+6, $title4);
    $sheet->setCellValue('F'.$fila+2, $body);
    $sheet->setCellValue('F'.$fila+3, $body1);
    $sheet->setCellValue('F'.$fila+4, $body2);
    $sheet->setCellValue('F'.$fila+5, $body3);
    $sheet->setCellValue('F'.$fila+6, $body4);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':B'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':B'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 4 .':B'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 5 .':B'.$fila + 5);

    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 2 .':J'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 3 .':J'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 4 .':J'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 5 .':J'.$fila + 5);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 6 .':J'.$fila + 6);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 2 .':F'.$fila + 2)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 3 .':F'.$fila + 3)->applyFromArray($oddRow);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 4 .':F'.$fila + 4)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 5 .':F'.$fila + 5)->applyFromArray($oddRow); 
    if ($body4=="Pendiente") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Pendiente);
    }if ($body4=="Aprobado") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Aprobado);
    }if ($body4=="Rechazado") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Rechazado);
    }
}
}

if (isset($_POST['compra'])) {
    $vale = $_POST['compra'];
    $jus=$_POST['jus'];
    $sql = "SELECT * FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra WHERE solicitud_compra='$vale'";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

     $precio   =    $productos['precio'];
     $precio2  =    number_format($precio, 2,".",",");  
     $cant_aprobada=$productos['stock'];
     $cantidad_despachada=$productos['cantidad_despachada'];
     $stock=number_format($cant_aprobada, 2,".",",");
     $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

     $final2 += $cant_aprobada;
     $final3   =    number_format($final2, 2, ".",",");

     $final4 += $cantidad_despachada;
     $final5   =    number_format($final4, 2, ".",",");

     $final6 += ($cant_aprobada-$cantidad_despachada);
     $final7   =    number_format($final6, 2, ".",",");

     $final8 += $precio;
     $final9   =    number_format($final8, 2, ".",",");
     if ($productos['estado']="Pendiente") {  
        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']="Rechazado") {

        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']=="Aprobado") {

        $total = $productos['cantidad_despachada'] * $productos['precio'];
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
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila+2)->applyFromArray($tableHead);
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila+2)->applyFromArray($tableHead);
    $sheet->setCellValue('A'.$fila +2 , "VISTA PREVIA:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':C'.$fila + 2);

    $sheet->setCellValue('A'.$fila +3 ,"Cant Solicitada: ");
    $sheet->setCellValue('C'.$fila +3 ,$final2);
    $sheet->setCellValue('A'.$fila +4 ,"Costo Unitario: ");
    $sheet->setCellValue('C'.$fila +4 ,$final8);
    $sheet->setCellValue('A'.$fila +5 ,"SubTotal: ");
    $sheet->setCellValue('C'.$fila +5 ,$final);
    
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila + 3)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    $spreadsheet->getActiveSheet()->getStyle('B'.$fila + 4 .':C'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 3 .':C'.$fila + 3)->applyFromArray($evenRow);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 4 .':C'.$fila + 4)->applyFromArray($oddRow);
    
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 5 .':C'.$fila + 5)->applyFromArray($subtotal);


    $sheet->setCellValue('A' .$fila, $productos['nSolicitud']);
    $sheet->setCellValue('B' .$fila, $productos['dependencia']);
    $sheet->setCellValue('C' .$fila, $productos['usuario']." "."(".$u.")");
    $sheet->setCellValue('D' .$fila, $productos['codigo']);
    $sheet->setCellValue('E' .$fila, $productos['descripcion']);
    $sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
    $sheet->setCellValue('G' .$fila, $stock);
    $sheet->setCellValue('H' .$fila, $precio);
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
$spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 1 .':J'.$fila + 1)->applyFromArray($tableHead);
$sheet->setCellValue('E'.$fila +1 , "VISTA PREVIA:");
$spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 1 .':J'.$fila + 1);

$sql1="SELECT * FROM tb_compra WHERE nSolicitud=$vale";
$result1 = mysqli_query($conn, $sql1);
while ($productos1 = mysqli_fetch_array($result1)){
    $title="Departamento";
    $title1="nSolicitud";
    $title2="Encargado";
    $title3="Fecha";
    $title4="Estado";
    $body=$productos1['dependencia'];
    $body1=$productos1['nSolicitud'];
    $body2=$productos1['usuario'];
    $body3=$productos1['fecha_registro'];
    $body4=$productos1['estado'];
    $sheet->setCellValue('E'.$fila+2, $title);
    $sheet->setCellValue('E'.$fila+3, $title1);
    $sheet->setCellValue('E'.$fila+4, $title2);
    $sheet->setCellValue('E'.$fila+5, $title3);
    $sheet->setCellValue('E'.$fila+6, $title4);
    $sheet->setCellValue('F'.$fila+2, $body);
    $sheet->setCellValue('F'.$fila+3, $body1);
    $sheet->setCellValue('F'.$fila+4, $body2);
    $sheet->setCellValue('F'.$fila+5, $body3);
    $sheet->setCellValue('F'.$fila+6, $body4);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':B'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':B'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 4 .':B'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 5 .':B'.$fila + 5);

    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 2 .':J'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 3 .':J'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 4 .':J'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 5 .':J'.$fila + 5);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 6 .':J'.$fila + 6);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 2 .':F'.$fila + 2)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 3 .':F'.$fila + 3)->applyFromArray($oddRow);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 4 .':F'.$fila + 4)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 5 .':F'.$fila + 5)->applyFromArray($oddRow); 
    if ($body4=="Comprado") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Aprobado);
    }
}
$sheet->setCellValue('A'.$fila+8, "Observaciones (En qué se ocupará el bien entregado)");
$sheet->setCellValue('A'.$fila + 9, $jus);

$spreadsheet->getActiveSheet()->getRowDimension($fila +8)->setRowHeight(25, 'pt');
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 9 .':J'.$fila + 9)->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 8 .':J'.$fila + 8);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 9 .':J'.$fila + 9);


$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 8 .':J'.$fila + 8)->applyFromArray($tableHead);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 9 .':J'.$fila + 9)->applyFromArray($oddRow);
  
    $sheet->setCellValue('A' .$fila + 11, "Solicita:");
    $sheet->setCellValue('C' .$fila + 15, "Autoriza:");
    $sheet->setCellValue('H' .$fila + 11, "Entrega:");
    $sheet->setCellValue('A' .$fila + 12, "F. ________________");

    $sheet->setCellValue('C' .$fila + 16, "F. ________________");

    $sheet->setCellValue('H' .$fila + 12, "F. ________________");


    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 11 .':B'.$fila + 11);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 12 .':B'.$fila + 12);

    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 15 .':F'.$fila + 15);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 16 .':F'.$fila + 16);

    $spreadsheet->getActiveSheet()->mergeCells('H'.$fila+ 11 .':J'.$fila + 11);
    $spreadsheet->getActiveSheet()->mergeCells('H'.$fila+ 12 .':J'.$fila + 12);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +11)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +12)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +8)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +9)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +8)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +9)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +15)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +16)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +15)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +16)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +11)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +12)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +11)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +12)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

}
if (isset($_POST['compra1'])) {
    $vale = $_POST['compra1'];
    $jus=$_POST['jus'];
    $sql = "SELECT * FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra WHERE solicitud_compra='$vale'";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

     $precio   =    $productos['precio'];
     $precio2  =    number_format($precio, 2,".",",");  
     $cant_aprobada=$productos['stock'];
     $cantidad_despachada=$productos['cantidad_despachada'];
     $stock=number_format($cant_aprobada, 2,".",",");
     $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

     $final2 += $cant_aprobada;
     $final3   =    number_format($final2, 2, ".",",");

     $final4 += $cantidad_despachada;
     $final5   =    number_format($final4, 2, ".",",");

     $final6 += ($cant_aprobada-$cantidad_despachada);
     $final7   =    number_format($final6, 2, ".",",");

     $final8 += $precio;
     $final9   =    number_format($final8, 2, ".",",");
     if ($productos['estado']="Pendiente") {  
        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']="Rechazado") {

        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']=="Aprobado") {

        $total = $productos['cantidad_despachada'] * $productos['precio'];
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
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila+2)->applyFromArray($tableHead);
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila+2)->applyFromArray($tableHead);
    $sheet->setCellValue('A'.$fila +2 , "VISTA PREVIA:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':C'.$fila + 2);

    $sheet->setCellValue('A'.$fila +3 ,"Cant Solicitada: ");
    $sheet->setCellValue('C'.$fila +3 ,$final3);
    $sheet->setCellValue('A'.$fila +4 ,"Costo Unitario: ");
    $sheet->setCellValue('C'.$fila +4 ,$final9);
    $sheet->setCellValue('A'.$fila +5 ,"SubTotal: ");
    $sheet->setCellValue('C'.$fila +5 ,$final1);
    
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila + 3)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    $spreadsheet->getActiveSheet()->getStyle('B'.$fila + 4 .':C'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 3 .':C'.$fila + 3)->applyFromArray($evenRow);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 4 .':C'.$fila + 4)->applyFromArray($oddRow);
    
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 5 .':C'.$fila + 5)->applyFromArray($subtotal);


    $sheet->setCellValue('A' .$fila, $productos['nSolicitud']);
    $sheet->setCellValue('B' .$fila, $productos['dependencia']);
    $sheet->setCellValue('C' .$fila, $productos['usuario']." "."(".$u.")");
    $sheet->setCellValue('D' .$fila, $productos['codigo']);
    $sheet->setCellValue('E' .$fila, $productos['descripcion']);
    $sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
    $sheet->setCellValue('G' .$fila, $cant_aprobada);
    $sheet->setCellValue('H' .$fila, $precio);
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
$spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 1 .':J'.$fila + 1)->applyFromArray($tableHead);
$sheet->setCellValue('E'.$fila +1 , "VISTA PREVIA:");
$spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 1 .':J'.$fila + 1);

$sql1="SELECT * FROM tb_compra WHERE nSolicitud=$vale";
$result1 = mysqli_query($conn, $sql1);
while ($productos1 = mysqli_fetch_array($result1)){
    $title="Departamento";
    $title1="nSolicitud";
    $title2="Encargado";
    $title3="Fecha";
    $title4="Estado";
    $body=$productos1['dependencia'];
    $body1=$productos1['nSolicitud'];
    $body2=$productos1['usuario'];
    $body3=$productos1['fecha_registro'];
    $body4=$productos1['estado'];
    $sheet->setCellValue('E'.$fila+2, $title);
    $sheet->setCellValue('E'.$fila+3, $title1);
    $sheet->setCellValue('E'.$fila+4, $title2);
    $sheet->setCellValue('E'.$fila+5, $title3);
    $sheet->setCellValue('E'.$fila+6, $title4);
    $sheet->setCellValue('F'.$fila+2, $body);
    $sheet->setCellValue('F'.$fila+3, $body1);
    $sheet->setCellValue('F'.$fila+4, $body2);
    $sheet->setCellValue('F'.$fila+5, $body3);
    $sheet->setCellValue('F'.$fila+6, $body4);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':B'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':B'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 4 .':B'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 5 .':B'.$fila + 5);

    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 2 .':J'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 3 .':J'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 4 .':J'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 5 .':J'.$fila + 5);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 6 .':J'.$fila + 6);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 2 .':F'.$fila + 2)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 3 .':F'.$fila + 3)->applyFromArray($oddRow);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 4 .':F'.$fila + 4)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 5 .':F'.$fila + 5)->applyFromArray($oddRow); 
    if ($body4=="Comprado") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Aprobado);
    }
}
$sheet->setCellValue('A'.$fila+8, "Observaciones (En qué se ocupará el bien entregado)");
$sheet->setCellValue('A'.$fila+9, $jus);

$spreadsheet->getActiveSheet()->getRowDimension($fila +8)->setRowHeight(25, 'pt');

$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 8 .':J'.$fila + 8);
$spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 9 .':J'.$fila + 9);


$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 8 .':J'.$fila + 8)->applyFromArray($tableHead);
$spreadsheet->getActiveSheet()->getStyle('A'.$fila+ 9 .':J'.$fila + 9)->applyFromArray($oddRow);
  
    $sheet->setCellValue('A' .$fila + 11, "Solicita:");
    $sheet->setCellValue('C' .$fila + 15, "Autoriza:");
    $sheet->setCellValue('H' .$fila + 11, "Entrega:");
    $sheet->setCellValue('A' .$fila + 12, "F. ________________");

    $sheet->setCellValue('C' .$fila + 16, "F. ________________");

    $sheet->setCellValue('H' .$fila + 12, "F. ________________");


    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 11 .':B'.$fila + 11);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 12 .':B'.$fila + 12);

    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 15 .':F'.$fila + 15);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 16 .':F'.$fila + 16);

    $spreadsheet->getActiveSheet()->mergeCells('H'.$fila+ 11 .':J'.$fila + 11);
    $spreadsheet->getActiveSheet()->mergeCells('H'.$fila+ 12 .':J'.$fila + 12);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +11)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +12)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +8)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +9)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +8)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +9)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +15)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +16)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +15)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +16)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +11)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +12)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +11)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('H'. $fila +12)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

}
if (isset($_POST['almacen'])) {
    $vale = $_POST['almacen'];
    $sql = "SELECT * FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen WHERE tb_almacen='$vale'";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

     $precio   =    $productos['precio'];
     $precio2  =    number_format($precio, 2,".",",");  
     $cant_aprobada=$productos['cantidad_solicitada'];
     $cantidad_despachada=$productos['cantidad_despachada'];
     $stock=number_format($cant_aprobada, 2,".",",");
     $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

     $final2 += $cant_aprobada;
     $final3   =    number_format($final2, 2, ".",",");

     $final4 += $cantidad_despachada;
     $final5   =    number_format($final4, 2, ".",",");

     $final6 += ($cant_aprobada-$cantidad_despachada);
     $final7   =    number_format($final6, 2, ".",",");

     $final8 += $precio;
     $final9   =    number_format($final8, 2, ".",",");
     if ($productos['estado']="Pendiente") {  
        $total = $productos['cantidad_solicitada'] * $productos['precio'];
    }if ($productos['estado']="Rechazado") {

        $total = $productos['cantidad_solicitada'] * $productos['precio'];
    }if ($productos['estado']=="Aprobado") {

        $total = $productos['cantidad_despachada'] * $productos['precio'];
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
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila+2)->applyFromArray($tableHead);
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila+2)->applyFromArray($tableHead);
    $sheet->setCellValue('A'.$fila +2 , "VISTA PREVIA:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':C'.$fila + 2);

    $sheet->setCellValue('A'.$fila +3 ,"Cant Solicitada: ");
    $sheet->setCellValue('C'.$fila +3 ,$final2);
    $sheet->setCellValue('A'.$fila +4 ,"Costo Unitario: ");
    $sheet->setCellValue('C'.$fila +4 ,$final);
    $sheet->setCellValue('A'.$fila +5 ,"SubTotal: ");
    $sheet->setCellValue('C'.$fila +5 ,$final);
    
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila + 3)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    $spreadsheet->getActiveSheet()->getStyle('B'.$fila + 4 .':C'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 3 .':C'.$fila + 3)->applyFromArray($evenRow);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 4 .':C'.$fila + 4)->applyFromArray($oddRow);
    
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 5 .':C'.$fila + 5)->applyFromArray($subtotal);


    $sheet->setCellValue('A' .$fila, $productos['codAlmacen']);
    $sheet->setCellValue('B' .$fila, $productos['departamento']);
    $sheet->setCellValue('C' .$fila, $productos['encargado']." "."(".$u.")");
    $sheet->setCellValue('D' .$fila, $productos['codigo']);
    $sheet->setCellValue('E' .$fila, $productos['nombre']);
    $sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
    $sheet->setCellValue('G' .$fila, $stock);
    $sheet->setCellValue('H' .$fila, $precio2);
    $sheet->setCellValue('I' .$fila, $total1);
    $sheet->setCellValue('J' .$fila, $productos['fecha_solicitud']);
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
$spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 1 .':J'.$fila + 1)->applyFromArray($tableHead);
$sheet->setCellValue('E'.$fila +1 , "VISTA PREVIA:");
$spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 1 .':J'.$fila + 1);

$sql1="SELECT * FROM tb_almacen WHERE codAlmacen=$vale";
$result1 = mysqli_query($conn, $sql1);
while ($productos1 = mysqli_fetch_array($result1)){
    $title="Departamento";
    $title1="N° Vale";
    $title2="Encargado";
    $title3="Fecha";
    $title4="Estado";
    $body=$productos1['departamento'];
    $body1=$productos1['codAlmacen'];
    $body2=$productos1['encargado'];
    $body3=$productos1['fecha_solicitud'];
    $body4=$productos1['estado'];
    $sheet->setCellValue('E'.$fila+2, $title);
    $sheet->setCellValue('E'.$fila+3, $title1);
    $sheet->setCellValue('E'.$fila+4, $title2);
    $sheet->setCellValue('E'.$fila+5, $title3);
    $sheet->setCellValue('E'.$fila+6, $title4);
    $sheet->setCellValue('F'.$fila+2, $body);
    $sheet->setCellValue('F'.$fila+3, $body1);
    $sheet->setCellValue('F'.$fila+4, $body2);
    $sheet->setCellValue('F'.$fila+5, $body3);
    $sheet->setCellValue('F'.$fila+6, $body4);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':B'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':B'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 4 .':B'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 5 .':B'.$fila + 5);

    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 2 .':J'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 3 .':J'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 4 .':J'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 5 .':J'.$fila + 5);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 6 .':J'.$fila + 6);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 2 .':F'.$fila + 2)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 3 .':F'.$fila + 3)->applyFromArray($oddRow);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 4 .':F'.$fila + 4)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 5 .':F'.$fila + 5)->applyFromArray($oddRow); 
    if ($body4=="Pendiente") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Pendiente);
    }if ($body4=="Aprobado") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Aprobado);
    }if ($body4=="Rechazado") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Rechazado);
    }
}
}if (isset($_POST['almacen1'])) {
    $vale = $_POST['almacen1'];
    $sql = "SELECT * FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen WHERE tb_almacen='$vale'";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

     $precio   =    $productos['precio'];
     $precio2  =    number_format($precio, 2,".",",");  
     $cant_aprobada=$productos['cantidad_solicitada'];
     $cantidad_despachada=$productos['cantidad_despachada'];
     $stock=number_format($cant_aprobada, 2,".",",");
     $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

     $final2 += $cant_aprobada;
     $final3   =    number_format($final2, 2, ".",",");

     $final4 += $cantidad_despachada;
     $final5   =    number_format($final4, 2, ".",",");

     $final6 += ($cant_aprobada-$cantidad_despachada);
     $final7   =    number_format($final6, 2, ".",",");

     $final8 += $precio;
     $final9   =    number_format($final8, 2, ".",",");
     if ($productos['estado']="Pendiente") {  
        $total = $productos['cantidad_solicitada'] * $productos['precio'];
    }if ($productos['estado']="Rechazado") {

        $total = $productos['cantidad_solicitada'] * $productos['precio'];
    }if ($productos['estado']=="Aprobado") {

        $total = $productos['cantidad_despachada'] * $productos['precio'];
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
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila+2)->applyFromArray($tableHead);
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila+2)->applyFromArray($tableHead);
    $sheet->setCellValue('A'.$fila +2 , "VISTA PREVIA:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':C'.$fila + 2);

    $sheet->setCellValue('A'.$fila +3 ,"Cant Solicitada: ");
    $sheet->setCellValue('C'.$fila +3 ,$final2);
    $sheet->setCellValue('A'.$fila +4 ,"Costo Unitario: ");
    $sheet->setCellValue('C'.$fila +4 ,$final8);
    $sheet->setCellValue('A'.$fila +5 ,"SubTotal: ");
    $sheet->setCellValue('C'.$fila +5 ,$final);
    
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila + 3)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    $spreadsheet->getActiveSheet()->getStyle('B'.$fila + 4 .':C'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 3 .':C'.$fila + 3)->applyFromArray($evenRow);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 4 .':C'.$fila + 4)->applyFromArray($oddRow);
    
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 5 .':C'.$fila + 5)->applyFromArray($subtotal);


    $sheet->setCellValue('A' .$fila, $productos['codAlmacen']);
    $sheet->setCellValue('B' .$fila, $productos['departamento']);
    $sheet->setCellValue('C' .$fila, $productos['encargado']." "."(".$u.")");
    $sheet->setCellValue('D' .$fila, $productos['codigo']);
    $sheet->setCellValue('E' .$fila, $productos['nombre']);
    $sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
    $sheet->setCellValue('G' .$fila, $stock);
    $sheet->setCellValue('H' .$fila, $precio2);
    $sheet->setCellValue('I' .$fila, $total1);
    $sheet->setCellValue('J' .$fila, $productos['fecha_solicitud']);
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
$spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 1 .':J'.$fila + 1)->applyFromArray($tableHead);
$sheet->setCellValue('E'.$fila +1 , "VISTA PREVIA:");
$spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 1 .':J'.$fila + 1);

$sql1="SELECT * FROM tb_almacen WHERE codAlmacen=$vale";
$result1 = mysqli_query($conn, $sql1);
while ($productos1 = mysqli_fetch_array($result1)){
    $title="Departamento";
    $title1="N° Vale";
    $title2="Encargado";
    $title3="Fecha";
    $title4="Estado";
    $body=$productos1['departamento'];
    $body1=$productos1['codAlmacen'];
    $body2=$productos1['encargado'];
    $body3=$productos1['fecha_solicitud'];
    $body4=$productos1['estado'];
    $sheet->setCellValue('E'.$fila+2, $title);
    $sheet->setCellValue('E'.$fila+3, $title1);
    $sheet->setCellValue('E'.$fila+4, $title2);
    $sheet->setCellValue('E'.$fila+5, $title3);
    $sheet->setCellValue('E'.$fila+6, $title4);
    $sheet->setCellValue('F'.$fila+2, $body);
    $sheet->setCellValue('F'.$fila+3, $body1);
    $sheet->setCellValue('F'.$fila+4, $body2);
    $sheet->setCellValue('F'.$fila+5, $body3);
    $sheet->setCellValue('F'.$fila+6, $body4);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':B'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':B'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 4 .':B'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 5 .':B'.$fila + 5);

    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 2 .':J'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 3 .':J'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 4 .':J'.$fila + 4);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 5 .':J'.$fila + 5);
    $spreadsheet->getActiveSheet()->mergeCells('F'.$fila+ 6 .':J'.$fila + 6);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 2 .':F'.$fila + 2)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 3 .':F'.$fila + 3)->applyFromArray($oddRow);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 4 .':F'.$fila + 4)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 5 .':F'.$fila + 5)->applyFromArray($oddRow); 
    if ($body4=="Pendiente") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Pendiente);
    }if ($body4=="Aprobado") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Aprobado);
    }if ($body4=="Rechazado") {
        $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 6 .':F'.$fila + 6)->applyFromArray($Rechazado);
    }
}
}if (isset($_POST['circulante'])) {
    $vale = $_POST['circulante'];
    $sql = "SELECT * FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE tb_circulante='$vale'";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

     $precio   =    $productos['precio'];
     $precio2  =    number_format($precio, 2,".",",");  
     $cant_aprobada=$productos['stock'];
     $cantidad_despachada=$productos['cantidad_despachada'];
     $stock=number_format($cant_aprobada, 2,".",",");
     $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

     $final2 += $cant_aprobada;
     $final3   =    number_format($final2, 2, ".",",");

     $final4 += $cantidad_despachada;
     $final5   =    number_format($final4, 2, ".",",");

     $final6 += ($cant_aprobada-$cantidad_despachada);
     $final7   =    number_format($final6, 2, ".",",");

     $final8 += $precio;
     $final9   =    number_format($final8, 2, ".",",");
     if ($productos['estado']="Pendiente") {  
        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']="Rechazado") {

        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']=="Aprobado") {

        $total = $productos['cantidad_despachada'] * $productos['precio'];
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
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila+2)->applyFromArray($tableHead);
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila+2)->applyFromArray($tableHead);
    $sheet->setCellValue('A'.$fila +2 , "VISTA PREVIA:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':C'.$fila + 2);

    $sheet->setCellValue('A'.$fila +3 ,"Cant Solicitada: ");
    $sheet->setCellValue('C'.$fila +3 ,$final2);
    $sheet->setCellValue('A'.$fila +4 ,"Costo Unitario: ");
    $sheet->setCellValue('C'.$fila +4 ,$final8);
    $sheet->setCellValue('A'.$fila +5 ,"SubTotal: ");
    $sheet->setCellValue('C'.$fila +5 ,$final);
    
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila + 3)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    $spreadsheet->getActiveSheet()->getStyle('B'.$fila + 4 .':C'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 3 .':C'.$fila + 3)->applyFromArray($evenRow);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 4 .':C'.$fila + 4)->applyFromArray($oddRow);
    
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 5 .':C'.$fila + 5)->applyFromArray($subtotal);


    $sheet->setCellValue('A' .$fila, $productos['codCirculante']);
    $sheet->setCellValue('B' .$fila, $productos['codigo']);
    $sheet->setCellValue('C' .$fila, $productos['descripcion']);
    $sheet->setCellValue('D' .$fila, $productos['unidad_medida']);
    $sheet->setCellValue('E' .$fila, $stock);
    $sheet->setCellValue('F' .$fila, $precio2);
    $sheet->setCellValue('G' .$fila, $total1);
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
$spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 1 .':H'.$fila + 1)->applyFromArray($tableHead);
$sheet->setCellValue('E'.$fila +1 , "VISTA PREVIA:");
$spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 1 .':H'.$fila + 1);

$sql1="SELECT * FROM tb_circulante WHERE codCirculante=$vale";
$result1 = mysqli_query($conn, $sql1);
while ($productos1 = mysqli_fetch_array($result1)){

    $title="N° Circulante";
    $title1="Fecha";
    $body=$productos1['codCirculante'];
    $body1=$productos1['fecha_solicitud'];

    $sheet->setCellValue('E'.$fila+2, $title);
    $sheet->setCellValue('E'.$fila+3, $title1);

    $sheet->setCellValue('G'.$fila+2, $body);
    $sheet->setCellValue('G'.$fila+3, $body1);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':B'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':B'.$fila + 3);

    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 2 .':F'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 2 .':F'.$fila + 2);    

    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 3 .':F'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 3 .':F'.$fila + 3);

    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 2 .':H'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 2 .':H'.$fila + 2);

    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 3 .':H'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 3 .':H'.$fila + 3);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 2 .':H'.$fila + 2)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 3 .':H'.$fila + 3)->applyFromArray($oddRow);

    $sheet->setCellValue('A' .$fila + 6, "Todo lo anteriormente detallado, es indispensable para desarrollar nuestras funciones.");
    $sheet->setCellValue('A' .$fila + 8, "Sin más particular");
    $sheet->setCellValue('A' .$fila + 9, "Solicita:");
    $sheet->setCellValue('C' .$fila + 13, "Autoriza:");
    $sheet->setCellValue('G' .$fila + 9, "Dá fe de no haber existencia:");
    $sheet->setCellValue('A' .$fila + 11, "F. ________________");
    $sheet->setCellValue('A' .$fila + 12, "Ing. Ernesto González Choto");
    $sheet->setCellValue('A' .$fila + 13, "Jefe de Mantenimiento");

    $sheet->setCellValue('C' .$fila + 14, "F. ________________");
    $sheet->setCellValue('C' .$fila + 15, "Dr. William Antonio Fernández Rodríguez");
    $sheet->setCellValue('C' .$fila + 16, 'Director del Hospital Nacional " Santa Teresa"');

    $sheet->setCellValue('G' .$fila + 11, "F. ________________");
    $sheet->setCellValue('G' .$fila + 12, "Sra. Isabel Romero");
    $sheet->setCellValue('G' .$fila + 13, "Guarda Almacén");

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 6 .':I'.$fila + 6);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 8 .':B'.$fila + 8);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 11 .':B'.$fila + 11);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 12 .':B'.$fila + 12);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 13 .':B'.$fila + 13);

    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 13 .':F'.$fila + 13);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 14 .':F'.$fila + 14);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 15 .':F'.$fila + 15);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 16 .':F'.$fila + 16);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 17 .':F'.$fila + 17);

    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 9 .':H'.$fila + 9);
    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 11 .':H'.$fila + 11);
    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 12 .':H'.$fila + 12);
    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 13 .':H'.$fila + 13);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +6)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +8)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +9)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +11)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +13)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +14)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +11)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +13)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +14)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +11)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +12)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +13)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +11)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +12)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +13)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
}
}
if (isset($_POST['circulante1'])) {
    $vale = $_POST['circulante1'];
    $sql = "SELECT * FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE tb_circulante='$vale'";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

     $precio   =    $productos['precio'];
     $precio2  =    number_format($precio, 2,".",",");  
     $cant_aprobada=$productos['stock'];
     $cantidad_despachada=$productos['cantidad_despachada'];
     $stock=number_format($cant_aprobada, 2,".",",");
     $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

     $final2 += $cant_aprobada;
     $final3   =    number_format($final2, 2, ".",",");

     $final4 += $cantidad_despachada;
     $final5   =    number_format($final4, 2, ".",",");

     $final6 += ($cant_aprobada-$cantidad_despachada);
     $final7   =    number_format($final6, 2, ".",",");

     $final8 += $precio;
     $final9   =    number_format($final8, 2, ".",",");
     if ($productos['estado']="Pendiente") {  
        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']="Rechazado") {

        $total = $productos['stock'] * $productos['precio'];
    }if ($productos['estado']=="Aprobado") {

        $total = $productos['cantidad_despachada'] * $productos['precio'];
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
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila+2)->applyFromArray($tableHead);
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila+2)->applyFromArray($tableHead);
    $sheet->setCellValue('A'.$fila +2 , "VISTA PREVIA:");
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':C'.$fila + 2);

    $sheet->setCellValue('A'.$fila +3 ,"Cant Solicitada: ");
    $sheet->setCellValue('C'.$fila +3 ,$final2);
    $sheet->setCellValue('A'.$fila +4 ,"Costo Unitario: ");
    $sheet->setCellValue('C'.$fila +4 ,$final8);
    $sheet->setCellValue('A'.$fila +5 ,"SubTotal: ");
    $sheet->setCellValue('C'.$fila +5 ,$final);
    
    $spreadsheet->getActiveSheet()->getStyle('C'.$fila + 3)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    $spreadsheet->getActiveSheet()->getStyle('B'.$fila + 4 .':C'.$fila + 5)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 3 .':C'.$fila + 3)->applyFromArray($evenRow);

    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 4 .':C'.$fila + 4)->applyFromArray($oddRow);
    
    $spreadsheet->getActiveSheet()->getStyle('A'.$fila + 5 .':C'.$fila + 5)->applyFromArray($subtotal);


    $sheet->setCellValue('A' .$fila, $productos['codCirculante']);
    $sheet->setCellValue('B' .$fila, $productos['codigo']);
    $sheet->setCellValue('C' .$fila, $productos['descripcion']);
    $sheet->setCellValue('D' .$fila, $productos['unidad_medida']);
    $sheet->setCellValue('E' .$fila, $stock);
    $sheet->setCellValue('F' .$fila, $precio2);
    $sheet->setCellValue('G' .$fila, $total1);
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
$spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 1 .':H'.$fila + 1)->applyFromArray($tableHead);
$sheet->setCellValue('E'.$fila +1 , "VISTA PREVIA:");
$spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 1 .':H'.$fila + 1);

$sql1="SELECT * FROM tb_circulante WHERE codCirculante=$vale";
$result1 = mysqli_query($conn, $sql1);
while ($productos1 = mysqli_fetch_array($result1)){

    $title="N° Circulante";
    $title1="Fecha";
    $body=$productos1['codCirculante'];
    $body1=$productos1['fecha_solicitud'];

    $sheet->setCellValue('E'.$fila+2, $title);
    $sheet->setCellValue('E'.$fila+3, $title1);

    $sheet->setCellValue('G'.$fila+2, $body);
    $sheet->setCellValue('G'.$fila+3, $body1);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 2 .':B'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 3 .':B'.$fila + 3);

    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 2 .':F'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 2 .':F'.$fila + 2);    

    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 3 .':F'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('E'.$fila+ 3 .':F'.$fila + 3);

    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 2 .':H'.$fila + 2);
    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 2 .':H'.$fila + 2);

    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 3 .':H'.$fila + 3);
    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 3 .':H'.$fila + 3);

    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 2 .':H'.$fila + 2)->applyFromArray($evenRow);
    $spreadsheet->getActiveSheet()->getStyle('E'.$fila+ 3 .':H'.$fila + 3)->applyFromArray($oddRow);

    $sheet->setCellValue('A' .$fila + 6, "Todo lo anteriormente detallado, es indispensable para desarrollar nuestras funciones.");
    $sheet->setCellValue('A' .$fila + 8, "Sin más particular");
    $sheet->setCellValue('A' .$fila + 9, "Solicita:");
    $sheet->setCellValue('C' .$fila + 13, "Autoriza:");
    $sheet->setCellValue('G' .$fila + 9, "Dá fe de no haber existencia:");
    $sheet->setCellValue('A' .$fila + 11, "F. ________________");
    $sheet->setCellValue('A' .$fila + 12, "Ing. Ernesto González Choto");
    $sheet->setCellValue('A' .$fila + 13, "Jefe de Mantenimiento");

    $sheet->setCellValue('C' .$fila + 14, "F. ________________");
    $sheet->setCellValue('C' .$fila + 15, "Dr. William Antonio Fernández Rodríguez");
    $sheet->setCellValue('C' .$fila + 16, 'Director del Hospital Nacional " Santa Teresa"');

    $sheet->setCellValue('G' .$fila + 11, "F. ________________");
    $sheet->setCellValue('G' .$fila + 12, "Sra. Isabel Romero");
    $sheet->setCellValue('G' .$fila + 13, "Guarda Almacén");

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 6 .':I'.$fila + 6);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 8 .':B'.$fila + 8);

    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 11 .':B'.$fila + 11);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 12 .':B'.$fila + 12);
    $spreadsheet->getActiveSheet()->mergeCells('A'.$fila+ 13 .':B'.$fila + 13);

    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 13 .':F'.$fila + 13);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 14 .':F'.$fila + 14);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 15 .':F'.$fila + 15);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 16 .':F'.$fila + 16);
    $spreadsheet->getActiveSheet()->mergeCells('C'.$fila+ 17 .':F'.$fila + 17);

    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 9 .':H'.$fila + 9);
    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 11 .':H'.$fila + 11);
    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 12 .':H'.$fila + 12);
    $spreadsheet->getActiveSheet()->mergeCells('G'.$fila+ 13 .':H'.$fila + 13);

    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +6)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +8)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('A'. $fila +9)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +11)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +13)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +14)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +11)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +13)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('C'. $fila +14)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +11)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +12)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +13)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +11)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +12)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('G'. $fila +13)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

}
}

//autofilter
//define first row and last row


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
if (isset($_POST['vale'])) {        header('Content-Disposition: attachment;filename="Detalles Vale.xlsx"');}
if (isset($_POST['bodega'])) {      header('Content-Disposition: attachment;filename="Detalles Bodega.xlsx"');}
if (isset($_POST['circulante'])) {  header('Content-Disposition: attachment;filename="Detalles Circulante.xlsx"');}
if (isset($_POST['compra'])) {      header('Content-Disposition: attachment;filename="Detalles Compra.xlsx"');}
if (isset($_POST['almacen'])) {     header('Content-Disposition: attachment;filename="Detalles Almacen.xlsx"');}

if (isset($_POST['vale1'])) {       header('Content-Disposition: attachment;filename="DT Vale.xlsx"');}
if (isset($_POST['bodega1'])) {     header('Content-Disposition: attachment;filename="DT Bodega.xlsx"');}
if (isset($_POST['circulante1'])) { header('Content-Disposition: attachment;filename="DT Circulante.xlsx"');}
if (isset($_POST['compra1'])) {     header('Content-Disposition: attachment;filename="DT Compra.xlsx"');}
if (isset($_POST['almacen1'])) {    header('Content-Disposition: attachment;filename="DT Almacen.xlsx"');}

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();