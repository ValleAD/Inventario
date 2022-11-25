    <?php ob_start();
    include ('../../../Model/conexion.php') ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reporte Ingreso en PDF</title>
    </head>
    <body style="font-family: sans-serif;">
        <img src="../../../img/hospital.png" style="width:20%">
        <img src="../../../img/log_1.png" style="width:20%; float:right">
           <?php if (isset($_POST['compra'])) {?>
        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: 2%;">INGRESOS DE COMPRAS</h4>
<style ></style>
    <table class="table  table-striped"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
         <th style="font-size: 12px;">Departamento</th>
         <th style="font-size: 12px;">Encargado</th>
         <th style="font-size: 12px;">Codigo</th>
         <th style="font-size: 12px;">Descripción Completa</th>
         <th style="font-size: 12px;">U/M</th>
         <th style="font-size: 12px;">Cantidad</th>
         <th style="font-size: 12px;">Costo Unitario</th>
         <th style="font-size: 12px;">Fecha Registro</th>       
       </tr>

     </thead>

     <tbody>
<?php


$sql = "SELECT * FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra";
$result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
 $precio=$productos['precio'];
       $precio3=number_format($precio, 2,".",",");?>

<tr style="border: 1px solid #ccc;border-collapse: collapse;">
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Departamento">Mantenimiento</td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Código de Producto"><?php  echo $productos['codigo']; ?></td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Cantidad"><?php  echo $productos['stock']; ?></td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Costo Unitario">$<?php  echo $precio3 ?></td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
</tr>

<?php } ?> 

     </tbody>
 </table>
    <?php } if (isset($_POST['almacen'])) {?>

        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
        <h4 align="center" style="margin-top: 2%;">INGRESOS DE ALMACEN</h4>

    <table  style=" border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
         <th style="font-size: 12px;">Codigo</th>
         <th style="font-size: 12px;">Departamento</th>
         <th style="font-size: 12px;">Encargado</th>
         <th style="font-size: 12px;">Descripción Completa</th>
         <th style="font-size: 12px;">U/M</th>
         <th style="font-size: 12px;">Cantidad</th>
         <th style="font-size: 12px;">Costo Unitario</th>
         <th style="font-size: 12px;">Fecha Registro</th>
         
       </tr>

       
     </thead>

     <tbody>
<?php


$sql = "SELECT * FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen";
$result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
     $precio=$productos['precio'];
       $precio2=number_format($precio, 2,".",",");
       $n++;
        $r=$n+0?>

<tr id="tr" style="border: 1px solid #ccc;border-collapse: collapse;">
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Departamento" ><?php  echo $productos['codigo']; ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Encargado" ><?php  echo $productos['departamento']; ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Código Producto"><?php  echo $productos['encargado']; ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Descripción" ><?php  echo $productos['nombre']; ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Cantidad"><?php  echo $productos['cantidad_solicitada']; ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_solicitud'])); ?></td>



</tr>

<?php } ?> 

     </tbody>
 </table>

<?php } if (isset($_POST['circulante'])) {?>

<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">INGRESOS DE CIRCULANTE</h4>

    <table class="table  table-striped"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
        
                <th style="font-size: 12px;">Código</th>
                <th style="font-size: 12px;">Descripción Completa</th>
                <th style="font-size: 12px;">U/M</th>
                <th style="font-size: 12px;">Cantidad Solicitada</th>
                <th style="font-size: 12px;">Costo Unitario</th>
                <th style="font-size: 12px;">Fecha</th>

        </tr>
    </thead>
    <tbody>

    <?php 
     $sql = "SELECT * FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante";
    $result = mysqli_query($conn, $sql);
        $n=0;
    while ($productos = mysqli_fetch_array($result)){
         $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");$n++;
        $r=$n+0;?>

 <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
</style> 
    <tr id="tr" style="border: 1px solid #ccc;border-collapse: collapse;">
        <!-- <td data-label="#"><?php echo $r ?></td> -->

      <td style="border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" align="center" data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
      <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Descripción" ><?php  echo $productos['descripcion']; ?></td>
      <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
      <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Cantidad"><?php  echo $productos['stock']; ?></td>
      <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
      <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_solicitud'])); ?></td>
      
    </tr>
    </tbody>
<?php } ?>
</table> 
<?php } ?>





           <?php if (isset($_POST['compra1'])) {$idusuario=$_POST['idusuario'];?>
        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: 2%;">INGRESOS DE COMPRAS</h4>
    <table class="table  table-striped"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
        <th style="font-size: 12px;">#</th>
         <th style="font-size: 12px;">Departamento</th>
         <th style="font-size: 12px;">Encargado</th>
         <th style="font-size: 12px;">Codigo</th>
         <th style="font-size: 12px;">Descripción Completa</th>
         <th style="font-size: 12px;">U/M</th>
         <th style="font-size: 12px;">Cantidad</th>
         <th style="font-size: 12px;">Costo Unitario</th>
         <th style="font-size: 12px;">Fecha Registro</th>
         
       </tr>

     </thead>

     <tbody>
<?php


$sql = "SELECT * FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra WHERE b.codigodetallecompra='$idusuario'";
$result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
 $precio=$productos['precio'];
       $precio3=number_format($precio, 2,".",",");
    $n++;
        $r=$n+0?>

<tr style="border: 1px solid #ccc;border-collapse: collapse;">
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="#"><?php echo $r ?></td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Departamento">Mantenimiento</td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Código de Producto"><?php  echo $productos['codigo']; ?></td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Cantidad"><?php  echo $productos['stock']; ?></td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Costo Unitario">$<?php  echo $precio3 ?></td>
    <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
</tr>

<?php } ?> 

     </tbody>
 </table>
    <?php } if (isset($_POST['almacen1'])) {$idusuario=$_POST['idusuario'];?>

        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
        <h4 align="center" style="margin-top: 2%;">INGRESOS DE ALMACEN</h4>

    <table class="table  table-striped"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
         <th style="font-size: 12px;">#</th>
         <th style="font-size: 12px;">Codigo</th>
         <th style="font-size: 12px;">Departamento</th>
         <th style="font-size: 12px;">Encargado</th>
         <th style="font-size: 12px;">Descripción Completa</th>
         <th style="font-size: 12px;">U/M</th>
         <th style="font-size: 12px;">Cantidad</th>
         <th style="font-size: 12px;">Costo Unitario</th>
         <th style="font-size: 12px;">Fecha Registro</th>
         
       </tr>

       
     </thead>

     <tbody>
<?php

$sql = "SELECT * FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen WHERE b.codigoalmacen='$idusuario'";
$result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
     $precio=$productos['precio'];
       $precio2=number_format($precio, 2,".",",");
       $n++;
        $r=$n+0?>

<tr id="tr" style="border: 1px solid #ccc;border-collapse: collapse;">
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="#"><?php echo $r ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Departamento" ><?php  echo $productos['departamento']; ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Encargado" ><?php  echo $productos['encargado']; ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Descripción" ><?php  echo $productos['nombre']; ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Cantidad"><?php  echo $productos['cantidad_solicitada']; ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
<td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_solicitud'])); ?></td>



</tr>

<?php } ?> 

     </tbody>
 </table>

<?php } if (isset($_POST['circulante1'])) {$idusuario=$_POST['idusuario'];?>

<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">INGRESOS DE CIRCULANTE</h4>

    <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 12px;">
            <thead style="background-color: #46466b;color: white;">     
            <tr style="border: 1px solid #ddd;color: black;">
        
                <th style="font-size: 12px;">Código</th>
                <th style="font-size: 12px;">Descripción Completa</th>
                <th style="font-size: 12px;">U/M</th>
                <th style="font-size: 12px;">Cantidad Solicitada</th>
                <th style="font-size: 12px;">Costo Unitario</th>
                <th style="font-size: 12px;">Fecha</th>

        </tr>
    </thead>
    <tbody>

    <?php 
     $sql = "SELECT * FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE b.codigodetallecirculante=$idusuario";
    $result = mysqli_query($conn, $sql);
        $n=0;
    while ($productos = mysqli_fetch_array($result)){
         $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");$n++;
        $r=$n+0;?>

 <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
</style> 
    <tr id="tr" style="border: 1px solid #ccc;border-collapse: collapse;">
        <!-- <td data-label="#"><?php echo $r ?></td> -->

      <td style="border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" align="center" data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
      <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Descripción" ><?php  echo $productos['descripcion']; ?></td>
      <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
      <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Cantidad"><?php  echo $productos['stock']; ?></td>
      <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
      <td style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;font-size: 11px;" data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_solicitud'])); ?></td>
      
    </tr>
    </tbody>
<?php } ?>
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
    $dompdf->stream("pdf_vale.pdf",array("Attachment"=>0));
            ?>