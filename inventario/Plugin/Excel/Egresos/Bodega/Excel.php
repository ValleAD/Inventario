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
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(13);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(13);
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

$spreadsheet->getActiveSheet()->getStyle('A7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('H7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('I7')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('K3:K5')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('L3:L5')
->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

$spreadsheet->getActiveSheet()->getStyle('A7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('C7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('E7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('F7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('H7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('I7')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('K3:M5')
->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

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
if (isset($_POST['bodega'])) {

    $sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega";
}
if (isset($_POST['bodega1'])) {$idusuario=$_POST['idusuario'];
$sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE db.idusuario='$idusuario'";
}    $result = mysqli_query($conn, $sql);
$n=0;
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
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)
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
        $spreadsheet->getActiveSheet()->getStyle('G' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('I' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('J' .$fila)
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


        $spreadsheet->getActiveSheet()->getStyle('K')
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('M')
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $spreadsheet->getActiveSheet()->getStyle('O')
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('Q')
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);        

        $spreadsheet->getActiveSheet()->getStyle('S')
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('T')
        ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        $spreadsheet->getActiveSheet()->getStyle('K')
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('M')
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('O')
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('Q')
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);        

        $spreadsheet->getActiveSheet()->getStyle('S')
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('T')
        ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

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

$sheet->setCellValue('O2' , "STOCK POR MES:");

        if (isset($_POST['bodega'])) {

        $sql1="SELECT Mes,SUM(stock) FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega GROUP by Mes;";
        }if (isset($_POST['bodega1'])) {

        $sql1="SELECT Mes,SUM(stock),idusuario FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE idusuario='$idusuario' GROUP by Mes;";
        }
    $result1 = mysqli_query($conn, $sql1);
    while ($productos1 = mysqli_fetch_array($result1)){
        $mes=$productos1['Mes'];
        $cantidad=$productos1['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final10 += $cantidad;
        $final11   =    number_format($final10, 2, ".",",");
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
$sheet->setCellValue('P' .$fila1, $stock);
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
$sheet->setCellValue('P' .$fila1, $final11);
$spreadsheet->getActiveSheet()->mergeCells('P'.$fila1.':Q'.$fila1);
}
$spreadsheet->getActiveSheet()->getStyle('O'.$fila1.':Q'.$fila1)->applyFromArray($subtotal);
$spreadsheet->getActiveSheet()->getStyle('S2:U2')->applyFromArray($tableHead);

$sheet->setCellValue('S2' , "STOCK POR AÑO:");

        if (isset($_POST['bodega'])) {

        $sql2="SELECT Año,SUM(stock) FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega GROUP by Año;";
        }if (isset($_POST['bodega1'])) {

        $sql2="SELECT Año,SUM(stock),idusuario FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE idusuario='$idusuario' GROUP by Año;";
        }
    $result1 = mysqli_query($conn, $sql2);
    while ($productos1 = mysqli_fetch_array($result1)){
        $Año=$productos1['Año'];
        $cantidad=$productos1['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final12 += $cantidad;
        $final13   =    number_format($final12, 2, ".",",");




$sheet->setCellValue('S' .$fila2, $Año);
$sheet->setCellValue('T' .$fila2, $stock);
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
$sheet->setCellValue('T' .$fila2, $final13);

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
header('Content-Disposition: attachment;filename="Egreso Bodega.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();