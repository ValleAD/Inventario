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


//Tamaño de la letra
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setSize(12);

//Horientación



//Unión de celdas
$spreadsheet->getActiveSheet()->mergeCells("A1:H1");
$spreadsheet->getActiveSheet()->mergeCells("A2:H2");
$spreadsheet->getActiveSheet()->mergeCells("A3:H3");
$spreadsheet->getActiveSheet()->mergeCells("A4:H4");
$spreadsheet->getActiveSheet()->mergeCells("F6:G6");



//setting column width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(14);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(11);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(13);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(24);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(11);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(11.43);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(11.71);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(12.29);

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

$spreadsheet->getActiveSheet()
->setCellValue('A2',"MINISTERIO DE SALUD HOSPITAL NACIONAL SANTA TERESA")
->setCellValue('A3',"DEPARTAMENTO DE MANTENIMIENTO")
->setCellValue('A4',"CATEGORIAS");

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
$drawing1->setCoordinates('H1');
$drawing1->setOffsetX(20);
$drawing1->setOffsetY(50);
$drawing1->setWidth(150);
$drawing1->getShadow()->setVisible(true);
$drawing1->getShadow()->setDirection(45);
$drawing1->setWorksheet($spreadsheet->getActiveSheet());
//header text
$sheet->setCellValue('A7', 'Categoria');
$sheet->setCellValue('B7', 'Codigo');
$sheet->setCellValue('C7', 'Catalogo');
$sheet->setCellValue('D7', 'Descripcion');
$sheet->setCellValue('E7', 'Unidad de Medida');
$sheet->setCellValue('F7', 'Stock');
$sheet->setCellValue('G7', 'Costo Unitario');
$sheet->setCellValue('H7', 'Total');
$sheet->setCellValue('I7', 'Fecha');

//set font style and background color
$spreadsheet->getActiveSheet()->getStyle('A7:I7')->applyFromArray($tableHead);

$spreadsheet->getActiveSheet()->getStyle('A:U')->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle('A:U')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('A:U')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('G:H')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

$spreadsheet->getActiveSheet()->getStyle('J')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('K')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('N')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$spreadsheet->getActiveSheet()->getStyle('Q')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


$spreadsheet->getActiveSheet()->getRowDimension(7)->setRowHeight(30, 'pt');

$spreadsheet->getActiveSheet()->getPageSetup()
->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
$spreadsheet->getActiveSheet()->getHeaderFooter()
->setOddFooter( '&RPágina &P al &N');
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
$categoria=$_POST['categoria'];
$sql="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos Where categoria='$categoria' GROUP BY codProductos,precio HAVING COUNT(*) ORDER BY fecha_registro DESC ";
$result = mysqli_query($conn, $sql);


while ($productos = mysqli_fetch_array($result)){
    $cantidad=$productos['SUM(stock)'];
    $precio=$productos['precio'];

    $final2 += $cantidad;
    $final8 += $precio;
    $total = $productos['SUM(stock)'] * $productos['precio'];
    
    $final += $total;
    $spreadsheet->getActiveSheet()->getStyle('J2:K2')->applyFromArray($tableHead);
    $sheet->setCellValue('J2' ,"VISTA PREVIA: ");
    $sheet->setCellValue('J3' ,"Cant Solicitada: ");
    $sheet->setCellValue('K3' ,$final2);
    $sheet->setCellValue('J4' ,"Costo Unitario: ");
    $sheet->setCellValue('K4' ,$final8);
    $sheet->setCellValue('J5' ,"SubTotal: ");
    $sheet->setCellValue('K5' ,$final);
    $spreadsheet->getActiveSheet()->getStyle('J3:K5')->applyFromArray($evenRow);

    $spreadsheet->getActiveSheet()->getStyle('J4:K5')->applyFromArray($oddRow);

    $spreadsheet->getActiveSheet()->getStyle('J5:K5')->applyFromArray($subtotal);

    $sheet->setCellValue('A' .$fila, $productos['categoria']);
    $sheet->setCellValue('B' .$fila, $productos['codProductos']);
    $sheet->setCellValue('C' .$fila, $productos['catalogo']);
    $sheet->setCellValue('D' .$fila, $productos['descripcion']);
    $sheet->setCellValue('E' .$fila, $productos['unidad_medida']);
    $sheet->setCellValue('F' .$fila, $productos['SUM(stock)']);
    $sheet->setCellValue('G' .$fila, $productos['precio']);
    $sheet->setCellValue('H' .$fila, $total);
    $sheet->setCellValue('I' .$fila, $productos['fecha_registro']);
    if( $fila % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':I'.$fila)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('A'.$fila.':I'.$fila)->applyFromArray($oddRow);
    }
    //increment row
    $fila++;
}
$spreadsheet->getActiveSheet()->getStyle('M2:N2')->applyFromArray($tableHead);

$sheet->setCellValue('M2' , "STOCK POR MES:");


$sql1="SELECT Mes,SUM(stock) FROM tb_productos WHERE categoria='$categoria'  GROUP by Mes;";

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



    $sheet->setCellValue('M' .$fila1, $mes);
    $sheet->setCellValue('N' .$fila1, $cantidad);
    $spreadsheet->getActiveSheet()->mergeCells('M2:N2');

    if( $fila1 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('M'.$fila1.':N'.$fila1)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('M'.$fila1.':N'.$fila1)->applyFromArray($oddRow);
    }
    $fila1++;

}

$sheet->setCellValue('M' .$fila1, "SubTotal");
$sheet->setCellValue('N' .$fila1, $final10);
$spreadsheet->getActiveSheet()->getStyle('M'.$fila1.':N'.$fila1)->applyFromArray($subtotal);
$sheet->setCellValue('P2' , "STOCK POR AÑO:");


$sql2="SELECT Año,SUM(stock) FROM tb_productos WHERE categoria='$categoria'   GROUP by Año;";

$result1 = mysqli_query($conn, $sql2);
while ($productos1 = mysqli_fetch_array($result1)){
    $Año=$productos1['Año'];
    $cantidad=$productos1['SUM(stock)'];
    $final12 += $cantidad;




    $sheet->setCellValue('P' .$fila2, $Año);
    $sheet->setCellValue('Q' .$fila2, $cantidad);
    $spreadsheet->getActiveSheet()->mergeCells('P2:Q2');
    $spreadsheet->getActiveSheet()->getStyle('P2:Q2')->applyFromArray($tableHead);


    if( $fila2 % 2 == 0 ){
        //even row
        $spreadsheet->getActiveSheet()->getStyle('P'.$fila2.':Q'.$fila2)->applyFromArray($evenRow);
    }else{
        //odd row
        $spreadsheet->getActiveSheet()->getStyle('P'.$fila2.':Q'.$fila2)->applyFromArray($oddRow);
    }
    $fila2++;


}

$sheet->setCellValue('P' .$fila2, "SubTotal");
$sheet->setCellValue('Q' .$fila2, $final12);
$spreadsheet->getActiveSheet()->getStyle('P'.$fila2.':Q'.$fila2)->applyFromArray($subtotal);

//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Categorias del Productos.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
exit();