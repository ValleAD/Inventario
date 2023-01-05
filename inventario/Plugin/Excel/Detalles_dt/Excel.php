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

$spreadsheet->getActiveSheet()->getStyle('A7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('B7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('C7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('D7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('E7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('F7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('G7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('H7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('I7')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('J7')->getAlignment()->setWrapText(true);

$spreadsheet->getActiveSheet()->getStyle('A7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('H7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('I7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('K3:K5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('L3:L5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

$spreadsheet->getActiveSheet()->getStyle('A7')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B7')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C7')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D7')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E7')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F7')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G7')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('H7')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('I7')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('K3:M5')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('M')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $spreadsheet->getActiveSheet()->getStyle('O')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('Q')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);        

        $spreadsheet->getActiveSheet()->getStyle('S')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('T')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $spreadsheet->getActiveSheet()->getStyle('P')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        $spreadsheet->getActiveSheet()->getStyle('K')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('M')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('O')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('Q')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);        

        $spreadsheet->getActiveSheet()->getStyle('S')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('T')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('P')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

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
        
        $spreadsheet->getActiveSheet()->getStyle('K2:M2')->applyFromArray($tableHead);
        $sheet->setCellValue('K2' ,"VISTA PREVIA: ");
        $sheet->setCellValue('K3' ,"Cant Solicitada: ");
        $sheet->setCellValue('L3' ,$final3);
        $sheet->setCellValue('K4' ,"Costo Unitario: ");
        $sheet->setCellValue('L4' ,$final9);
        $sheet->setCellValue('K5' ,"SubTotal: ");
        $sheet->setCellValue('L5' ,$final1);
        $spreadsheet->getActiveSheet()->mergeCells('K2:M2');
        $spreadsheet->getActiveSheet()->mergeCells('L3:M3');
        $spreadsheet->getActiveSheet()->mergeCells('L4:M4');
        $spreadsheet->getActiveSheet()->mergeCells('L5:M5');
$fila3++;
                    if( $fila3 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('k3:M5')->applyFromArray($oddRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('k4:M5')->applyFromArray($oddRow);
    }
        $spreadsheet->getActiveSheet()->getStyle('k5:M5')->applyFromArray($subtotal);


        $spreadsheet->getActiveSheet()->getStyle('A6:J6')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A8:J8')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('M')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $spreadsheet->getActiveSheet()->getStyle('O')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('Q')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);        

        $spreadsheet->getActiveSheet()->getStyle('S')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('T')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        $spreadsheet->getActiveSheet()->getStyle('K')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('M')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('O')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('Q')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);        

        $spreadsheet->getActiveSheet()->getStyle('S')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('T')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

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
        $spreadsheet->getActiveSheet()->getStyle('O2:Q2')->applyFromArray($tableHead);
        $sheet->setCellValue('O2' , "VISTA PREVIA:");

        $sql1="SELECT * FROM tb_vale WHERE codVale=$vale";
        $result1 = mysqli_query($conn, $sql1);
    while ($productos1 = mysqli_fetch_array($result1)){
        $title="Departamento";
        $title1="O. de T. No.";
        $title2="Encargado";
        $title3="Fecha";
        $title4="Estado";
        $body=$productos1['departamento'];
        $body1=$productos1['codVale'];
        $body2=$productos1['usuario'];
        $body3=$productos1['fecha_registro'];
        $body4=$productos1['estado'];
$sheet->setCellValue('O3', $title);
$sheet->setCellValue('O4', $title1);
$sheet->setCellValue('O5', $title2);
$sheet->setCellValue('O6', $title3);
$sheet->setCellValue('O7', $title4);
$sheet->setCellValue('P3', $body);
$sheet->setCellValue('P4', $body1);
$sheet->setCellValue('P5', $body2);
$sheet->setCellValue('P6', $body3);
$sheet->setCellValue('P7', $body4);
$spreadsheet->getActiveSheet()->mergeCells('O2:Q2');
$spreadsheet->getActiveSheet()->mergeCells('P3:Q3');
$spreadsheet->getActiveSheet()->mergeCells('P4:Q4');
$spreadsheet->getActiveSheet()->mergeCells('P5:Q5');
$spreadsheet->getActiveSheet()->mergeCells('P6:Q6');
$spreadsheet->getActiveSheet()->mergeCells('P7:Q7');

        $spreadsheet->getActiveSheet()->getStyle('O3:Q3')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O4:Q4')->applyFromArray($oddRow);

        $spreadsheet->getActiveSheet()->getStyle('O5:Q5')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O6:Q6')->applyFromArray($oddRow); 
if ($body4=="Pendiente") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Pendiente);
}if ($body4=="Aprobado") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Aprobado);
}if ($body4=="Rechazado") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Rechazado);
}
    }
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
                $spreadsheet->getActiveSheet()->getStyle('K2:M2')->applyFromArray($tableHead);
        $sheet->setCellValue('K2' ,"VISTA PREVIA: ");
        $sheet->setCellValue('K3' ,"Cant Solicitada: ");
        $sheet->setCellValue('L3' ,$final3);
        $sheet->setCellValue('K4' ,"Costo Unitario: ");
        $sheet->setCellValue('L4' ,$final9);
        $sheet->setCellValue('K5' ,"SubTotal: ");
        $sheet->setCellValue('L5' ,$final1);
        $spreadsheet->getActiveSheet()->mergeCells('K2:M2');
        $spreadsheet->getActiveSheet()->mergeCells('L3:M3');
        $spreadsheet->getActiveSheet()->mergeCells('L4:M4');
        $spreadsheet->getActiveSheet()->mergeCells('L5:M5');
$fila3++;
                    if( $fila3 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('k3:M5')->applyFromArray($oddRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('k4:M5')->applyFromArray($oddRow);
    }
        $spreadsheet->getActiveSheet()->getStyle('k5:M5')->applyFromArray($subtotal);


        $spreadsheet->getActiveSheet()->getStyle('A6:J6')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A8:J8')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('P')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


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
        $spreadsheet->getActiveSheet()->getStyle('O2:Q2')->applyFromArray($tableHead);

$sheet->setCellValue('O2' , "VISTA PREVIA:");

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
$sheet->setCellValue('O3', $title);
$sheet->setCellValue('O4', $title1);
$sheet->setCellValue('O5', $title2);
$sheet->setCellValue('O6', $title3);
$sheet->setCellValue('O7', $title4);
$sheet->setCellValue('P3', $body);
$sheet->setCellValue('P4', $body1);
$sheet->setCellValue('P5', $body2);
$sheet->setCellValue('P6', $body3);
$sheet->setCellValue('P7', $body4);
$spreadsheet->getActiveSheet()->mergeCells('O2:Q2');
$spreadsheet->getActiveSheet()->mergeCells('P3:Q3');
$spreadsheet->getActiveSheet()->mergeCells('P4:Q4');
$spreadsheet->getActiveSheet()->mergeCells('P5:Q5');
$spreadsheet->getActiveSheet()->mergeCells('P6:Q6');
$spreadsheet->getActiveSheet()->mergeCells('P7:Q7');

        $spreadsheet->getActiveSheet()->getStyle('O3:Q3')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O4:Q4')->applyFromArray($oddRow);

        $spreadsheet->getActiveSheet()->getStyle('O5:Q5')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O6:Q6')->applyFromArray($oddRow); 
if ($body4=="Pendiente") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Pendiente);
}if ($body4=="Aprobado") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Aprobado);
}if ($body4=="Rechazado") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Rechazado);
}
    }
    }
if (isset($_POST['vale1'])) {
$vale = $_POST['vale1'];
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
        
        $spreadsheet->getActiveSheet()->getStyle('K2:M2')->applyFromArray($tableHead);
        $sheet->setCellValue('K2' ,"VISTA PREVIA: ");
        $sheet->setCellValue('K3' ,"Cant Solicitada: ");
        $sheet->setCellValue('L3' ,$final3);
        $sheet->setCellValue('K4' ,"Costo Unitario: ");
        $sheet->setCellValue('L4' ,$final9);
        $sheet->setCellValue('K5' ,"SubTotal: ");
        $sheet->setCellValue('L5' ,$final1);
        $spreadsheet->getActiveSheet()->mergeCells('K2:M2');
        $spreadsheet->getActiveSheet()->mergeCells('L3:M3');
        $spreadsheet->getActiveSheet()->mergeCells('L4:M4');
        $spreadsheet->getActiveSheet()->mergeCells('L5:M5');
$fila3++;
                    if( $fila3 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('k3:M5')->applyFromArray($oddRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('k4:M5')->applyFromArray($oddRow);
    }
        $spreadsheet->getActiveSheet()->getStyle('k5:M5')->applyFromArray($subtotal);


        $spreadsheet->getActiveSheet()->getStyle('A6:J6')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A8:J8')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('M')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $spreadsheet->getActiveSheet()->getStyle('O')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('Q')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);        

        $spreadsheet->getActiveSheet()->getStyle('S')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('T')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        $spreadsheet->getActiveSheet()->getStyle('K')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('M')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('O')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('Q')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);        

        $spreadsheet->getActiveSheet()->getStyle('S')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('T')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

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
$spreadsheet->getActiveSheet()->getStyle('O2:Q2')->applyFromArray($tableHead);
        $sheet->setCellValue('O2' , "VISTA PREVIA:");

        $sql1="SELECT * FROM tb_vale WHERE codVale=$vale";
        $result1 = mysqli_query($conn, $sql1);
    while ($productos1 = mysqli_fetch_array($result1)){
        $title="Departamento";
        $title1="O. de T. No.";
        $title2="Encargado";
        $title3="Fecha";
        $title4="Estado";
        $body=$productos1['departamento'];
        $body1=$productos1['codVale'];
        $body2=$productos1['usuario'];
        $body3=$productos1['fecha_registro'];
        $body4=$productos1['estado'];
$sheet->setCellValue('O3', $title);
$sheet->setCellValue('O4', $title1);
$sheet->setCellValue('O5', $title2);
$sheet->setCellValue('O6', $title3);
$sheet->setCellValue('O7', $title4);
$sheet->setCellValue('P3', $body);
$sheet->setCellValue('P4', $body1);
$sheet->setCellValue('P5', $body2);
$sheet->setCellValue('P6', $body3);
$sheet->setCellValue('P7', $body4);
$spreadsheet->getActiveSheet()->mergeCells('O2:Q2');
$spreadsheet->getActiveSheet()->mergeCells('P3:Q3');
$spreadsheet->getActiveSheet()->mergeCells('P4:Q4');
$spreadsheet->getActiveSheet()->mergeCells('P5:Q5');
$spreadsheet->getActiveSheet()->mergeCells('P6:Q6');
$spreadsheet->getActiveSheet()->mergeCells('P7:Q7');

        $spreadsheet->getActiveSheet()->getStyle('O3:Q3')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O4:Q4')->applyFromArray($oddRow);

        $spreadsheet->getActiveSheet()->getStyle('O5:Q5')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O6:Q6')->applyFromArray($oddRow); 
if ($body4=="Pendiente") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Pendiente);
}if ($body4=="Aprobado") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Aprobado);
}if ($body4=="Rechazado") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Rechazado);
}
    }
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
                $spreadsheet->getActiveSheet()->getStyle('K2:M2')->applyFromArray($tableHead);
        $sheet->setCellValue('K2' ,"VISTA PREVIA: ");
        $sheet->setCellValue('K3' ,"Cant Solicitada: ");
        $sheet->setCellValue('L3' ,$final3);
        $sheet->setCellValue('K4' ,"Costo Unitario: ");
        $sheet->setCellValue('L4' ,$final9);
        $sheet->setCellValue('K5' ,"SubTotal: ");
        $sheet->setCellValue('L5' ,$final1);
        $spreadsheet->getActiveSheet()->mergeCells('K2:M2');
        $spreadsheet->getActiveSheet()->mergeCells('L3:M3');
        $spreadsheet->getActiveSheet()->mergeCells('L4:M4');
        $spreadsheet->getActiveSheet()->mergeCells('L5:M5');
$fila3++;
                    if( $fila3 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('k3:M5')->applyFromArray($oddRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('k4:M5')->applyFromArray($oddRow);
    }
        $spreadsheet->getActiveSheet()->getStyle('k5:M5')->applyFromArray($subtotal);


        $spreadsheet->getActiveSheet()->getStyle('A6:J6')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A8:J8')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('P')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


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
        $spreadsheet->getActiveSheet()->getStyle('O2:Q2')->applyFromArray($tableHead);

$sheet->setCellValue('O2' , "VISTA PREVIA:");

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
$sheet->setCellValue('O3', $title);
$sheet->setCellValue('O4', $title1);
$sheet->setCellValue('O5', $title2);
$sheet->setCellValue('O6', $title3);
$sheet->setCellValue('O7', $title4);
$sheet->setCellValue('P3', $body);
$sheet->setCellValue('P4', $body1);
$sheet->setCellValue('P5', $body2);
$sheet->setCellValue('P6', $body3);
$sheet->setCellValue('P7', $body4);
$spreadsheet->getActiveSheet()->mergeCells('O2:Q2');
$spreadsheet->getActiveSheet()->mergeCells('P3:Q3');
$spreadsheet->getActiveSheet()->mergeCells('P4:Q4');
$spreadsheet->getActiveSheet()->mergeCells('P5:Q5');
$spreadsheet->getActiveSheet()->mergeCells('P6:Q6');
$spreadsheet->getActiveSheet()->mergeCells('P7:Q7');

        $spreadsheet->getActiveSheet()->getStyle('O3:Q3')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O4:Q4')->applyFromArray($oddRow);

        $spreadsheet->getActiveSheet()->getStyle('O5:Q5')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O6:Q6')->applyFromArray($oddRow); 
if ($body4=="Pendiente") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Pendiente);
}if ($body4=="Aprobado") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Aprobado);
}if ($body4=="Rechazado") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Rechazado);
}
    }
    }

if (isset($_POST['compra'])) {
$vale = $_POST['compra'];
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
                $spreadsheet->getActiveSheet()->getStyle('K2:M2')->applyFromArray($tableHead);
        $sheet->setCellValue('K2' ,"VISTA PREVIA: ");
        $sheet->setCellValue('K3' ,"Cant Solicitada: ");
        $sheet->setCellValue('L3' ,$final3);
        $sheet->setCellValue('K4' ,"Costo Unitario: ");
        $sheet->setCellValue('L4' ,$final9);
        $sheet->setCellValue('K5' ,"SubTotal: ");
        $sheet->setCellValue('L5' ,$final1);
        $spreadsheet->getActiveSheet()->mergeCells('K2:M2');
        $spreadsheet->getActiveSheet()->mergeCells('L3:M3');
        $spreadsheet->getActiveSheet()->mergeCells('L4:M4');
        $spreadsheet->getActiveSheet()->mergeCells('L5:M5');
$fila3++;
                    if( $fila3 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('k3:M5')->applyFromArray($oddRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('k4:M5')->applyFromArray($oddRow);
    }
        $spreadsheet->getActiveSheet()->getStyle('k5:M5')->applyFromArray($subtotal);


        $spreadsheet->getActiveSheet()->getStyle('A6:J6')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A8:J8')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('P')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


        $sheet->setCellValue('A' .$fila, $productos['nSolicitud']);
        $sheet->setCellValue('B' .$fila, $productos['dependencia']);
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
        $spreadsheet->getActiveSheet()->getStyle('O2:Q2')->applyFromArray($tableHead);

$sheet->setCellValue('O2' , "VISTA PREVIA:");

        $sql1="SELECT * FROM tb_compra WHERE nSolicitud=$vale";
        $result1 = mysqli_query($conn, $sql1);
    while ($productos1 = mysqli_fetch_array($result1)){
        $title="Departamento";
        $title1="Solicitud No.";
        $title2="Plazo y No. de Entregas";
        $title3="Unidad Técnica";
        $title4="Suministro Solicitado";
        $title5="Encargado";
        $title6="Fecha";
        $title7="Estado";
        $body=$productos1['dependencia'];
        $body1=$productos1['nSolicitud'];
        $body2=$productos1['plazo'];
        $body3=$productos1['unidad_tecnica'];
        $body4=$productos1['descripcion_solicitud'];
        $body5=$productos1['usuario'];
        $body6=$productos1['fecha_registro'];
        $body7=$productos1['estado'];

$sheet->setCellValue('O3', $title);
$sheet->setCellValue('O4', $title1);
$sheet->setCellValue('O5', $title2);
$sheet->setCellValue('O6', $title3);
$sheet->setCellValue('O7', $title4);
$sheet->setCellValue('O8', $title5);
$sheet->setCellValue('O9', $title6);
$sheet->setCellValue('O10', $title7);

$sheet->setCellValue('P3', $body);
$sheet->setCellValue('P4', $body1);
$sheet->setCellValue('P5', $body2);
$sheet->setCellValue('P6', $body3);
$sheet->setCellValue('P7', $body4);
$sheet->setCellValue('P8', $body5);
$sheet->setCellValue('P9', $body6);
$sheet->setCellValue('P10', $body7);

$spreadsheet->getActiveSheet()->mergeCells('O2:Q2');
$spreadsheet->getActiveSheet()->mergeCells('P3:Q3');
$spreadsheet->getActiveSheet()->mergeCells('P4:Q4');
$spreadsheet->getActiveSheet()->mergeCells('P5:Q5');
$spreadsheet->getActiveSheet()->mergeCells('P6:Q6');
$spreadsheet->getActiveSheet()->mergeCells('P7:Q7');
$spreadsheet->getActiveSheet()->mergeCells('P8:Q8');
$spreadsheet->getActiveSheet()->mergeCells('P9:Q9');
$spreadsheet->getActiveSheet()->mergeCells('P10:Q10');

        $spreadsheet->getActiveSheet()->getStyle('O3:Q3')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O4:Q4')->applyFromArray($oddRow);

        $spreadsheet->getActiveSheet()->getStyle('O5:Q5')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O6:Q6')->applyFromArray($oddRow);

        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O8:Q8')->applyFromArray($oddRow);

        $spreadsheet->getActiveSheet()->getStyle('O9:Q9')->applyFromArray($evenRow);
if ($body7=="Comprado") {
        $spreadsheet->getActiveSheet()->getStyle('O10:Q10')->applyFromArray($Aprobado);
}
    }
    }
if (isset($_POST['compra1'])) {
$vale = $_POST['compra1'];
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
                $spreadsheet->getActiveSheet()->getStyle('K2:M2')->applyFromArray($tableHead);
        $sheet->setCellValue('K2' ,"VISTA PREVIA: ");
        $sheet->setCellValue('K3' ,"Cant Solicitada: ");
        $sheet->setCellValue('L3' ,$final3);
        $sheet->setCellValue('K4' ,"Costo Unitario: ");
        $sheet->setCellValue('L4' ,$final9);
        $sheet->setCellValue('K5' ,"SubTotal: ");
        $sheet->setCellValue('L5' ,$final1);
        $spreadsheet->getActiveSheet()->mergeCells('K2:M2');
        $spreadsheet->getActiveSheet()->mergeCells('L3:M3');
        $spreadsheet->getActiveSheet()->mergeCells('L4:M4');
        $spreadsheet->getActiveSheet()->mergeCells('L5:M5');
$fila3++;
                    if( $fila3 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('k3:M5')->applyFromArray($oddRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('k4:M5')->applyFromArray($oddRow);
    }
        $spreadsheet->getActiveSheet()->getStyle('k5:M5')->applyFromArray($subtotal);


        $spreadsheet->getActiveSheet()->getStyle('A6:J6')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A8:J8')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('P')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


        $sheet->setCellValue('A' .$fila, $productos['nSolicitud']);
        $sheet->setCellValue('B' .$fila, $productos['dependencia']);
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
        $spreadsheet->getActiveSheet()->getStyle('O2:Q2')->applyFromArray($tableHead);

$sheet->setCellValue('O2' , "VISTA PREVIA:");

        $sql1="SELECT * FROM tb_compra WHERE nSolicitud=$vale";
        $result1 = mysqli_query($conn, $sql1);
    while ($productos1 = mysqli_fetch_array($result1)){
        $title="Departamento";
        $title1="Solicitud No.";
        $title2="Plazo y No. de Entregas";
        $title3="Unidad Técnica";
        $title4="Suministro Solicitado";
        $title5="Encargado";
        $title6="Fecha";
        $title7="Estado";
        $body=$productos1['dependencia'];
        $body1=$productos1['nSolicitud'];
        $body2=$productos1['plazo'];
        $body3=$productos1['unidad_tecnica'];
        $body4=$productos1['descripcion_solicitud'];
        $body5=$productos1['usuario'];
        $body6=$productos1['fecha_registro'];
        $body7=$productos1['estado'];

$sheet->setCellValue('O3', $title);
$sheet->setCellValue('O4', $title1);
$sheet->setCellValue('O5', $title2);
$sheet->setCellValue('O6', $title3);
$sheet->setCellValue('O7', $title4);
$sheet->setCellValue('O8', $title5);
$sheet->setCellValue('O9', $title6);
$sheet->setCellValue('O10', $title7);

$sheet->setCellValue('P3', $body);
$sheet->setCellValue('P4', $body1);
$sheet->setCellValue('P5', $body2);
$sheet->setCellValue('P6', $body3);
$sheet->setCellValue('P7', $body4);
$sheet->setCellValue('P8', $body5);
$sheet->setCellValue('P9', $body6);
$sheet->setCellValue('P10', $body7);

$spreadsheet->getActiveSheet()->mergeCells('O2:Q2');
$spreadsheet->getActiveSheet()->mergeCells('P3:Q3');
$spreadsheet->getActiveSheet()->mergeCells('P4:Q4');
$spreadsheet->getActiveSheet()->mergeCells('P5:Q5');
$spreadsheet->getActiveSheet()->mergeCells('P6:Q6');
$spreadsheet->getActiveSheet()->mergeCells('P7:Q7');
$spreadsheet->getActiveSheet()->mergeCells('P8:Q8');
$spreadsheet->getActiveSheet()->mergeCells('P9:Q9');
$spreadsheet->getActiveSheet()->mergeCells('P10:Q10');

        $spreadsheet->getActiveSheet()->getStyle('O3:Q3')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O4:Q4')->applyFromArray($oddRow);

        $spreadsheet->getActiveSheet()->getStyle('O5:Q5')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O6:Q6')->applyFromArray($oddRow);

        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O8:Q8')->applyFromArray($oddRow);

        $spreadsheet->getActiveSheet()->getStyle('O9:Q9')->applyFromArray($evenRow);
if ($body7=="Comprado") {
        $spreadsheet->getActiveSheet()->getStyle('O10:Q10')->applyFromArray($Aprobado);
}
    }
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
                $spreadsheet->getActiveSheet()->getStyle('K2:M2')->applyFromArray($tableHead);
        $sheet->setCellValue('K2' ,"VISTA PREVIA: ");
        $sheet->setCellValue('K3' ,"Cant Solicitada: ");
        $sheet->setCellValue('L3' ,$final3);
        $sheet->setCellValue('K4' ,"Costo Unitario: ");
        $sheet->setCellValue('L4' ,$final9);
        $sheet->setCellValue('K5' ,"SubTotal: ");
        $sheet->setCellValue('L5' ,$final1);
        $spreadsheet->getActiveSheet()->mergeCells('K2:M2');
        $spreadsheet->getActiveSheet()->mergeCells('L3:M3');
        $spreadsheet->getActiveSheet()->mergeCells('L4:M4');
        $spreadsheet->getActiveSheet()->mergeCells('L5:M5');
$fila3++;
                    if( $fila3 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('k3:M5')->applyFromArray($oddRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('k4:M5')->applyFromArray($oddRow);
    }
        $spreadsheet->getActiveSheet()->getStyle('k5:M5')->applyFromArray($subtotal);


        $spreadsheet->getActiveSheet()->getStyle('A6:J6')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A8:J8')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('P')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


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
        $spreadsheet->getActiveSheet()->getStyle('O2:Q2')->applyFromArray($tableHead);

$sheet->setCellValue('O2' , "VISTA PREVIA:");

        $sql1="SELECT * FROM tb_almacen WHERE codAlmacen=$vale";
        $result1 = mysqli_query($conn, $sql1);
    while ($productos1 = mysqli_fetch_array($result1)){
        $title="Departamento";
        $title1="O. de T. No.";
        $title2="Encargado";
        $title3="Fecha";
        $title4="Estado";
        $body=$productos1['departamento'];
        $body1=$productos1['codAlmacen'];
        $body2=$productos1['encargado'];
        $body3=$productos1['fecha_solicitud'];
        $body4=$productos1['estado'];
$sheet->setCellValue('O3', $title);
$sheet->setCellValue('O4', $title1);
$sheet->setCellValue('O5', $title2);
$sheet->setCellValue('O6', $title3);
$sheet->setCellValue('O7', $title4);
$sheet->setCellValue('P3', $body);
$sheet->setCellValue('P4', $body1);
$sheet->setCellValue('P5', $body2);
$sheet->setCellValue('P6', $body3);
$sheet->setCellValue('P7', $body4);
$spreadsheet->getActiveSheet()->mergeCells('O2:Q2');
$spreadsheet->getActiveSheet()->mergeCells('P3:Q3');
$spreadsheet->getActiveSheet()->mergeCells('P4:Q4');
$spreadsheet->getActiveSheet()->mergeCells('P5:Q5');
$spreadsheet->getActiveSheet()->mergeCells('P6:Q6');
$spreadsheet->getActiveSheet()->mergeCells('P7:Q7');

        $spreadsheet->getActiveSheet()->getStyle('O3:Q3')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O4:Q4')->applyFromArray($oddRow);

        $spreadsheet->getActiveSheet()->getStyle('O5:Q5')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O6:Q6')->applyFromArray($oddRow); 
if ($body4=="Pendiente") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Pendiente);
}if ($body4=="Aprobado") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Aprobado);
}if ($body4=="Rechazado") {
        $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Rechazado);
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
                $spreadsheet->getActiveSheet()->getStyle('K2:M2')->applyFromArray($tableHead);
        $sheet->setCellValue('K2' ,"VISTA PREVIA: ");
        $sheet->setCellValue('K3' ,"Cant Solicitada: ");
        $sheet->setCellValue('L3' ,$final3);
        $sheet->setCellValue('K4' ,"Costo Unitario: ");
        $sheet->setCellValue('L4' ,$final9);
        $sheet->setCellValue('K5' ,"SubTotal: ");
        $sheet->setCellValue('L5' ,$final1);
        $spreadsheet->getActiveSheet()->mergeCells('K2:M2');
        $spreadsheet->getActiveSheet()->mergeCells('L3:M3');
        $spreadsheet->getActiveSheet()->mergeCells('L4:M4');
        $spreadsheet->getActiveSheet()->mergeCells('L5:M5');
$fila3++;
                    if( $fila3 % 2 == 0 ){$spreadsheet->getActiveSheet()->getStyle('k3:M5')->applyFromArray($oddRow);}
        else{$spreadsheet->getActiveSheet()->getStyle('k4:M5')->applyFromArray($oddRow);}
        $spreadsheet->getActiveSheet()->getStyle('k5:M5')->applyFromArray($subtotal);

        $spreadsheet->getActiveSheet()->getStyle('A6:J6')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A8:J8')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('P')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


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
        $spreadsheet->getActiveSheet()->getStyle('O2:Q2')->applyFromArray($tableHead);

$sheet->setCellValue('O2' , "VISTA PREVIA:");

        $sql1="SELECT * FROM tb_almacen WHERE codAlmacen=$vale";
        $result1 = mysqli_query($conn, $sql1);
    while ($productos1 = mysqli_fetch_array($result1)){
        $title="Departamento";
        $title1="O. de T. No.";
        $title2="Encargado";
        $title3="Fecha";
        $title4="Estado";
        $body=$productos1['departamento'];
        $body1=$productos1['codAlmacen'];
        $body2=$productos1['encargado'];
        $body3=$productos1['fecha_solicitud'];
        $body4=$productos1['estado'];
$sheet->setCellValue('O3', $title);
$sheet->setCellValue('O4', $title1);
$sheet->setCellValue('O5', $title2);
$sheet->setCellValue('O6', $title3);
$sheet->setCellValue('O7', $title4);
$sheet->setCellValue('P3', $body);
$sheet->setCellValue('P4', $body1);
$sheet->setCellValue('P5', $body2);
$sheet->setCellValue('P6', $body3);
$sheet->setCellValue('P7', $body4);
$spreadsheet->getActiveSheet()->mergeCells('O2:Q2');
$spreadsheet->getActiveSheet()->mergeCells('P3:Q3');
$spreadsheet->getActiveSheet()->mergeCells('P4:Q4');
$spreadsheet->getActiveSheet()->mergeCells('P5:Q5');
$spreadsheet->getActiveSheet()->mergeCells('P6:Q6');
$spreadsheet->getActiveSheet()->mergeCells('P7:Q7');

        $spreadsheet->getActiveSheet()->getStyle('O3:Q3')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O4:Q4')->applyFromArray($oddRow);

        $spreadsheet->getActiveSheet()->getStyle('O5:Q5')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O6:Q6')->applyFromArray($oddRow); 
if ($body4=="Pendiente") {  $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Pendiente);}
if ($body4=="Aprobado")  {  $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Aprobado);}
if ($body4=="Rechazado") {  $spreadsheet->getActiveSheet()->getStyle('O7:Q7')->applyFromArray($Rechazado);}
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
      $spreadsheet->getActiveSheet()->getStyle('I2:K2')->applyFromArray($tableHead);
        $sheet->setCellValue('I2' ,"VISTA PREVIA: ");
        $sheet->setCellValue('I3' ,"Cant Solicitada: ");
        $sheet->setCellValue('J3' ,$final3);
        $sheet->setCellValue('I4' ,"Costo Unitario: ");
        $sheet->setCellValue('J4' ,$final9);
        $sheet->setCellValue('I5' ,"SubTotal: ");
        $sheet->setCellValue('J5' ,$final1);
        $spreadsheet->getActiveSheet()->mergeCells('I2:K2');
        $spreadsheet->getActiveSheet()->mergeCells('J3:K3');
        $spreadsheet->getActiveSheet()->mergeCells('J4:K4');
        $spreadsheet->getActiveSheet()->mergeCells('J5:K5');
$fila3++;

        $spreadsheet->getActiveSheet()->getStyle('I3:k5')->applyFromArray($evenRow);
  
        $spreadsheet->getActiveSheet()->getStyle('I4:k5')->applyFromArray($oddRow);
  
        $spreadsheet->getActiveSheet()->getStyle('I5:K5')->applyFromArray($subtotal);

        $spreadsheet->getActiveSheet()->getStyle('A6:J6')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A8:J8')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('P')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


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
        $spreadsheet->getActiveSheet()->getStyle('O2:Q2')->applyFromArray($tableHead);

$sheet->setCellValue('O2' , "VISTA PREVIA:");

        $sql1="SELECT * FROM tb_circulante WHERE codCirculante=$vale";
        $result1 = mysqli_query($conn, $sql1);
    while ($productos1 = mysqli_fetch_array($result1)){
        $title1="N° de Solicitud:";
        $title2="Fecha";
        $body1=$productos1['codCirculante'];
        $body2=$productos1['fecha_solicitud'];
$sheet->setCellValue('O3', $title1);
$sheet->setCellValue('O4', $title2);
$sheet->setCellValue('P3', $body1);
$sheet->setCellValue('P4', $body2);
$spreadsheet->getActiveSheet()->mergeCells('O2:Q2');
$spreadsheet->getActiveSheet()->mergeCells('P3:Q3');
$spreadsheet->getActiveSheet()->mergeCells('P4:Q4');

        $spreadsheet->getActiveSheet()->getStyle('O3:Q3')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O4:Q4')->applyFromArray($oddRow);

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
      $spreadsheet->getActiveSheet()->getStyle('I2:K2')->applyFromArray($tableHead);
        $sheet->setCellValue('I2' ,"VISTA PREVIA: ");
        $sheet->setCellValue('I3' ,"Cant Solicitada: ");
        $sheet->setCellValue('J3' ,$final3);
        $sheet->setCellValue('I4' ,"Costo Unitario: ");
        $sheet->setCellValue('J4' ,$final9);
        $sheet->setCellValue('I5' ,"SubTotal: ");
        $sheet->setCellValue('J5' ,$final1);
        $spreadsheet->getActiveSheet()->mergeCells('I2:K2');
        $spreadsheet->getActiveSheet()->mergeCells('J3:K3');
        $spreadsheet->getActiveSheet()->mergeCells('J4:K4');
        $spreadsheet->getActiveSheet()->mergeCells('J5:K5');
$fila3++;

        $spreadsheet->getActiveSheet()->getStyle('I3:k5')->applyFromArray($evenRow);
  
        $spreadsheet->getActiveSheet()->getStyle('I4:k5')->applyFromArray($oddRow);
  
        $spreadsheet->getActiveSheet()->getStyle('I5:K5')->applyFromArray($subtotal);

        $spreadsheet->getActiveSheet()->getStyle('A6:J6')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A8:J8')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('P')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setWrapText(true);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


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
        $spreadsheet->getActiveSheet()->getStyle('O2:Q2')->applyFromArray($tableHead);

$sheet->setCellValue('O2' , "VISTA PREVIA:");

        $sql1="SELECT * FROM tb_circulante WHERE codCirculante=$vale";
        $result1 = mysqli_query($conn, $sql1);
    while ($productos1 = mysqli_fetch_array($result1)){
        $title1="N° de Solicitud:";
        $title2="Fecha";
        $body1=$productos1['codCirculante'];
        $body2=$productos1['fecha_solicitud'];
$sheet->setCellValue('O3', $title1);
$sheet->setCellValue('O4', $title2);
$sheet->setCellValue('P3', $body1);
$sheet->setCellValue('P4', $body2);
$spreadsheet->getActiveSheet()->mergeCells('O2:Q2');
$spreadsheet->getActiveSheet()->mergeCells('P3:Q3');
$spreadsheet->getActiveSheet()->mergeCells('P4:Q4');

        $spreadsheet->getActiveSheet()->getStyle('O3:Q3')->applyFromArray($evenRow);
        $spreadsheet->getActiveSheet()->getStyle('O4:Q4')->applyFromArray($oddRow);

    }
}

//autofilter
//define first row and last row
$firstRow=7;
$lastRow=$fila-1;
if (isset($_POST['vale']) || 
    isset($_POST['bodega']) || 
    isset($_POST['compra']) || 
    isset($_POST['almacen']) ||
    isset($_POST['vale1']) || 
    isset($_POST['bodega1']) || 
    isset($_POST['compra1']) || 
    isset($_POST['almacen1'])) {
//set the autofilter
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":J".$lastRow);
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":J".$lastRow);
}
 if (isset($_POST['circulante']) || isset($_POST['circulante1'])) {
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":H".$lastRow);

 }
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