<?php ob_start();
include ('../../../Model/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtro por Categoria en PDF</title>
</head>
<body style="font-family: sans-serif;">
     <style>

.table {width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed;}
.table tr {background-color: #f8f8f8;border: 1px solid #ddd;color: black;}
.table th, .table td {font-size: 16px;padding: 8px;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px}


.table tbody tr:nth-child(even) {background-color: #00BDFF; height: 5%}
.table tbody tr:nth-child(odd) {background-color: #00EAFF; height: 5%}
    
  </style>
<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center" style="margin-top: 2%;">FILTRO DE CATEGORIAS</h5>
<table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead style="background-color: #46466b;color: white;">    
        <tr style="border: 1px solid #ddd;color: white;">
            <th>Categoria</th>
            <th>Código</th>
            <th>Catálogo</th>
            <th style="width: 30%;">Descripción Completa</th>
            <th>U/M</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Fecha</th> 
             <tr> <td align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td></tr>           
        </tr>
    </thead> 
    <tbody>
        <?php 
$categoria2 =$_POST['categoria']; 

   $sql = "SELECT * FROM `tb_productos` WHERE categoria='$categoria2'";
        $result = mysqli_query($conn, $sql);
 while ($productos = mysqli_fetch_array($result)){
       $cat=$productos['categoria'];
                if ($cat=="") {
                    $cat="Sin categorias";
                
                }else{
                $cat=$productos['categoria'];
                }
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

        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $cat ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $cod ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $catal ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $des ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $u_m ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $stock ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $precio1 ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $fech ?></th>
        <?php } ?>
    </tr>
    </tbody>
</table>


</body>
</html>
            <?php $html=ob_get_clean();
                 // echo $html 
require_once '../../dompdf/autoload.inc.php';
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
$dompdf->stream("pdf_categoria.pdf",array("Attachment"=>0));
        ?>