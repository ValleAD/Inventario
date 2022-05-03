<?php ob_start();
include ('../Model/conexion.php');
$f1 =$_POST['f1'];
$f2 =$_POST['f2']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtro por Fechas en PDF</title>
</head>
<body style="font-family: sans-serif;">

<img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center" style="margin-top: 2%;">FILTRO DE FECHAS</h5>

<div style="float:left;">
    <div><b>Desde</div>
    <div><?php echo $f1 ?></div>
</div>
<div style="float:right;">
    <div><b>Hasta</div>
    <div><?php echo $f2 ?></div>
</div><br><br><br>
<table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;">
            <th style="width: 25%;font-size: 14px;text-align: left;">Código</th>
            <th style="width: 25%;font-size: 14px;text-align: left;">Catálogo</th>
            <th style="width: 25%;font-size: 14px;text-align: left;">Descripción Completa</th>
            <th style="width: 25%;font-size: 14px;text-align: left;">U/M</th>
            <th style="width: 25%;font-size: 14px;text-align: left;">Cantidad</th>
            <th style="width: 25%;font-size: 14px;text-align: left;">Precio</th>
            <th style="width: 25%;font-size: 14px;text-align: left;">Fecha</th> 
             <tr> <td align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td></tr>           
        </tr>
    </thead> 
    <tbody>
        <?php 
   $sql = "SELECT * FROM `tb_productos` WHERE fecha_registro BETWEEN ' $f1' AND ' $f2'";
        $result = mysqli_query($conn, $sql);
 while ($productos = mysqli_fetch_array($result)){
    $cod= $productos['codProductos'];
    $catal= $productos['catalogo'];
    $des= $productos['descripcion'];
    $u_m= $productos['unidad_medida'];
    $precio=$productos['precio'];
    $precio1=number_format($precio, 2,".",",");
    $cantidad=$productos['stock'];
    $stock=number_format($cantidad,  2,".",",");
    $fech= $productos['fecha_registro'];
    ?>
     <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
</style>        
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">

        <td style="text-align:center; font-size: 12px;"><?php echo $cod ?></td>
        <td style="text-align:center; font-size: 12px;"><?php echo $catal ?></td>
        <td style="text-align:center; font-size: 12px;"><?php echo $des ?></td>
        <td style="text-align:center; font-size: 12px;"><?php echo $u_m ?></td>
        <td style="text-align:center; font-size: 12px;"><?php echo $stock ?></td>
        <td style="text-align:center; font-size: 12px;"><?php echo $precio1 ?></td>
        <td style="text-align:center; font-size: 12px;"><?php echo $fech ?></th>
        <?php } ?>
    </tr>
    </tbody>
</table>


</body>
</html>
            <?php $html=ob_get_clean();
                 // echo $html 
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->setIsHtml5ParserEnabled(true);
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("pdf_fecha.php",array("Attachment"=>0));
        ?>