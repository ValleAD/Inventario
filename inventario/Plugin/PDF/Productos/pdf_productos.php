<?php ob_start();
include ('../../..//Model/conexion.php'); ?>
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
<?php   if (isset($_POST['consulta'])) {?>
<h5 align="center" style="margin-top: 2%;">TODOS LOS PRODUCTOS</h5>
<?php }  if (isset($_POST['Historial'])) { ?>
<h5 align="center" style="margin-top: 2%;">HISTORIAL DE PRODUCTOS</h5>
<?php } ?>
  <?php
  if (isset($_POST['consulta'])) {?>

    <table class="table  table-striped"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <th style="font-size: 12px;">Código</th>
            <th style="font-size: 12px;">Cod. de Catálogo</th>
            <th style="font-size: 12px;">Descripción Completa</th>
            <th style="font-size: 12px;">U/M</th>
            <th style="font-size: 12px;">Cantidad</th>
            <th style="font-size: 12px;">Costo Unitario</th>
            <th style="font-size: 12px;">Fecha Registro</th>
            <th style="font-size: 12px;">Categoria</th>
            
        </tr>
    </thead>
    <tbody>
    <?php 

              $cod=$_POST['consulta'];

   $sql = "SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM `tb_productos` WHERE codProductos LIKE '%".$cod."%' or descripcion LIKE '%".$cod."%' ";

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
    $cantidad=$productos['SUM(stock)'];
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
        <td data-label="Código" style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $catal ?></td>
        <td data-label="Descripción" style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $stock ?></td>
        <td data-label="Precio" style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $precio1 ?></td>
        <td data-label="Fecha" style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $fech ?></td>
        <td data-label="Categoría" style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $cat ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
<?php } 
  if (isset($_POST['Historial'])) { 
$fecha=$_POST['fecha'];
$fecha1=$_POST['fecha1'];
$descripcion=$_POST['descripcion'];
$cod=$_POST['cod'];
$um=$_POST['um'];
    ?> 
<p><b>PERIODO DE MOVIMIENTO</b></p>
<table class="table" style="width: 100%;">
    <tr>
        <td><p><b>DE:</b> <?php echo $fecha ?></p></td>
        <p style="float: right;"><b>AL:</b> <?php echo $fecha1 ?></p>
    </tr>
    <tr>
        <td><p><b>Codigo del Producto:</b></p> </td>
        <p style="float: right;"><?php echo $cod ?></p>
    </tr>
    <tr>
        <td><p><b>Descripción</b></p></td>  
        <p style="float: right;"><?php echo $descripcion ?></p>
    </tr>
    <tr>
        <td><p><b>Unidad de Medida</b></p>  </td>
        <p style="float: right;"><?php echo $um ?></p>
    </tr>
</table>
<br><br><br>
        <table class="table table-responsive table-striped"  style="text-align: center;width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

    <thead style="background-color: #46466b;color: white;">
        <tr  style=" border: 1px solid #ccc;border-collapse: collapse;">
                     <th>Fecha</th>
                     <th>Concepto</th>
                     <th>No. Comprobante</th>
                     <th >Entradas</th>
                     <th >Salidas</th>
                     <th >Saldo</th>
            
        </tr>
    </thead>
    <tbody>
<?php

    $sql = "SELECT No_Comprovante,fecha_registro,Entradas, SUM(Entradas), SUM(Salidas),Saldo FROM historial  WHERE  No_Comprovante = '$cod' GROUP BY Concepto";
$result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
        $fecha=date("d-m-Y",strtotime($productos['fecha_registro']));
        $Comprovante= $productos['No_Comprovante'];
        $Entradas=$productos['SUM(Entradas)'];
        $Salida=$productos['SUM(Salidas)'];
        $Saldo=$productos['Saldo'];
?>
</style>
            <td  id="th" data-label="Fecha"><?php echo $fecha ?></td>
            <td  id="th" data-label="Concepto">Inventario en Fisico</td>
            <td id="th" data-label="No. Comprovante"><?php echo $Comprovante ?></td>
            <td  id="th" data-label="Entradas"><?php echo $Entradas ?></td>
            <td  id="th" data-label="Salidas"><?php echo $Salida ?></td>
            <td  id="th" data-label="Saldo"><?php echo $Saldo ?></td>

       <?php } ?>
    </tr>
    </tbody>
</table> 
<?php } ?>
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
if (isset($_POST['consulta'])) {
$dompdf->stream("PDF Producto.pdf",array("Attachment"=>0));
}  if (isset($_POST['Historial'])) { 
$dompdf->stream("PDF Historial de Producto.pdf",array("Attachment"=>0));
} 
        ?>