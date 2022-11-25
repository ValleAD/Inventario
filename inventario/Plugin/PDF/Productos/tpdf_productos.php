<?php ob_start();
include ('../../../Model/conexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Productos</title>
</head>
<body style="font-family: sans-serif;">

<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center" style="margin-top: 2%;">TODOS LOS PRODUCTOS</h5>

<table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead style="background-color: #46466b;color: white;">    
          <tr>

            <th style="width: 25%;font-size: 14px;">Código</th>
            <th style="width: 25%;font-size: 14px;">Catálogo</th>
            <th style="width: 40%;font-size: 14px;">Descripción Completa</th>
            <th style="width: 25%;font-size: 14px;">U/M</th>
            <th style="width: 25%;font-size: 14px;">Cantidad</th>
            <th style="width: 25%;font-size: 14px;">Precio</th>
            <th style="width: 25%;font-size: 14px;">Fecha</th> 
            <th style="width: 25%;font-size: 14px;">Categoria</th>
             <tr> <td align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td></tr>           
        </tr>
    </thead> 
    <tbody>
        <?php 

 
   $sql = "SELECT * FROM `tb_productos` ";

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
    td{
        text-align: center;
    }
</style>        
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">

        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $cod ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $catal ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $des ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $u_m ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $stock ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $precio1 ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $fech ?></th>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $cat ?></td>
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