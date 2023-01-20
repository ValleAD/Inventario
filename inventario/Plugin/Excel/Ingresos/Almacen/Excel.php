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
    ->setCellValue('A4',"REPORTES INGRESOS DE ALMACEN");
//Tamaño de la letra
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setSize(12);

//Horientación



//Unión de celdas
$spreadsheet->getActiveSheet()->mergeCells("A1:J1");
$spreadsheet->getActiveSheet()->mergeCells("A2:J2");
$spreadsheet->getActiveSheet()->mergeCells("A3:J3");
$spreadsheet->getActiveSheet()->mergeCells("A4:J4");



$spreadsheet->getActiveSheet()->getHeaderFooter()
    ->setOddFooter( '&RPage &P al &N');

//setting column width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(13);
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
$sheet->setCellValue('A8', 'N° Almacen');
$sheet->setCellValue('B8', 'Departamento');
$sheet->setCellValue('C8', 'Encargado');
$sheet->setCellValue('D8', 'Código');
$sheet->setCellValue('E8', 'Descripción');
$sheet->setCellValue('F8', 'U/M');
$sheet->setCellValue('G8', 'Cantidad');
$sheet->setCellValue('H8', 'Costo Unitario');
$sheet->setCellValue('I8', 'Total');
$sheet->setCellValue('J8', 'Fecha Registro');

$spreadsheet->getActiveSheet()->getStyle('A:U')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('A:U')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('A:U')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('H:I')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);
$spreadsheet->getActiveSheet()->getStyle('L4:L5')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

$spreadsheet->getActiveSheet()->getStyle('G')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('L3')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('P')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('T')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getHeaderFooter()
    ->setOddFooter( '&RPage &P al &N');
    

$spreadsheet->getActiveSheet()->getRowDimension(8)->setRowHeight(21.75, 'pt');
//set font style and background color
$spreadsheet->getActiveSheet()->getStyle('A8:J8')->applyFromArray($tableHead);
$spreadsheet->getActiveSheet()->getPageSetup()
->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
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
if (isset($_POST['almacen'])) {

    $sql = "SELECT * FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen";
}
if (isset($_POST['almacen1'])) {$idusuario=$_POST['idusuario'];
$sql = "SELECT * FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen WHERE db.idusuario='$idusuario'";
}    $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){

     $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['cantidad_solicitada'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

        $final2 += $cant_aprobada;
        $final4 += $cantidad_despachada;
        $final6 += ($cant_aprobada-$cantidad_despachada);
        
        $final8 += $precio;
     if ($productos['estado']="Pendiente") {  
    $total = $productos['cantidad_solicitada'] * $productos['precio'];
    }if ($productos['estado']="Rechazado") {
        
    $total = $productos['cantidad_solicitada'] * $productos['precio'];
    }if ($productos['estado']=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
     $final += $total;
    
   if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        $spreadsheet->getActiveSheet()->getStyle('K2:M2')->applyFromArray($tableHead);
        $sheet->setCellValue('K2' ,"VISTA PREVIA: ");
        $sheet->setCellValue('K3' ,"Cant Solicitada: ");
        $sheet->setCellValue('L3' ,$final2);
        $sheet->setCellValue('K4' ,"Costo Unitario: ");
        $sheet->setCellValue('L4' ,$final8);
        $sheet->setCellValue('K5' ,"SubTotal: ");
        $sheet->setCellValue('L5' ,$final);
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


    	$sheet->setCellValue('A' .$fila, $productos['codAlmacen']);
        $sheet->setCellValue('B' .$fila, $productos['departamento']);
    	$sheet->setCellValue('C' .$fila, $productos['encargado']." "."(".$u.")");
    	$sheet->setCellValue('D' .$fila, $productos['codigo']);
    	$sheet->setCellValue('E' .$fila, $productos['nombre']);
    	$sheet->setCellValue('F' .$fila, $productos['unidad_medida']);
    	$sheet->setCellValue('G' .$fila, $cant_aprobada);
    	$sheet->setCellValue('H' .$fila, $precio2);
        $sheet->setCellValue('I' .$fila, $total);
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

$sheet->setCellValue('O2' , "STOCK POR MES:");

        if (isset($_POST['almacen'])) {

        $sql1="SELECT Mes,SUM(cantidad_solicitada) FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen GROUP by Mes;";
        }if (isset($_POST['almacen1'])) {

        $sql1="SELECT Mes,SUM(cantidad_solicitada),idusuario FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen WHERE idusuario='$idusuario' GROUP by Mes;";
        }
    $result1 = mysqli_query($conn, $sql1);
    while ($productos1 = mysqli_fetch_array($result1)){
        $mes=$productos1['Mes'];
        $cantidad=$productos1['SUM(cantidad_solicitada)'];
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



$sheet->setCellValue('O' .$fila1, $mes);
$sheet->setCellValue('P' .$fila1, $cantidad);
$spreadsheet->getActiveSheet()->mergeCells('O2:Q2');
$spreadsheet->getActiveSheet()->mergeCells('P'.$fila1.':Q'.$fila1);

                if( $fila1 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('O'.$fila1.':Q'.$fila1)->applyFromArray($oddRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('O'.$fila1.':Q'.$fila1)->applyFromArray($oddRow);
    }
$fila1++;
$sheet->setCellValue('O' .$fila1, "SubTotal");
$sheet->setCellValue('P' .$fila1, $final10);
$spreadsheet->getActiveSheet()->mergeCells('P'.$fila1.':Q'.$fila1);
}
$spreadsheet->getActiveSheet()->getStyle('O'.$fila1.':Q'.$fila1)->applyFromArray($subtotal);
$spreadsheet->getActiveSheet()->getStyle('S2:U2')->applyFromArray($tableHead);

$sheet->setCellValue('S2' , "STOCK POR AÑO:");

        if (isset($_POST['almacen'])) {

        $sql2="SELECT Año,SUM(cantidad_solicitada) FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen GROUP by Año;";
        }if (isset($_POST['almacen1'])) {

        $sql2="SELECT Año,SUM(cantidad_solicitada),idusuario FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen WHERE idusuario='$idusuario' GROUP by Año;";
        }
    $result1 = mysqli_query($conn, $sql2);
    while ($productos1 = mysqli_fetch_array($result1)){
        $Año=$productos1['Año'];
        $cantidad=$productos1['SUM(cantidad_solicitada)'];
        $final12 += $cantidad;




$sheet->setCellValue('S' .$fila2, $Año);
$sheet->setCellValue('T' .$fila2, $cantidad);
$spreadsheet->getActiveSheet()->mergeCells('S2:U2');
$spreadsheet->getActiveSheet()->mergeCells('T'.$fila2.':U'.$fila2);


            if( $fila2 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('S'.$fila2.':U'.$fila2)->applyFromArray($oddRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('S'.$fila2.':U'.$fila2)->applyFromArray($oddRow);
    }
$fila2++;
$spreadsheet->getActiveSheet()->mergeCells('T'.$fila2.':U'.$fila2);

$sheet->setCellValue('S' .$fila2, "SubTotal");
$sheet->setCellValue('T' .$fila2, $final12);

}
$spreadsheet->getActiveSheet()->getStyle('S'.$fila2.':U'.$fila2)->applyFromArray($subtotal);

//autofilter
//define first row and last row
$firstRow=8;
$lastRow=$fila-1;
//set the autofilter
$spreadsheet->getActiveSheet()->setAutoFilter("A".$firstRow.":J".$lastRow);


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Ingresos Almacen.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();