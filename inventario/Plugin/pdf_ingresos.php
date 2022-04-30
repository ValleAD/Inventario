    <?php ob_start();
    include ('../Model/conexion.php') ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reporte Ingreso en PDF</title>
    </head>
    <body style="font-family: sans-serif;">
        <img src="../img/hospital.png" style="width:20%">
        <img src="../img/log_1.png" style="width:20%; float:right">
           <?php if (isset($_POST['compra'])) {?>
        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: 2%;">INGRESOS DE COMPRAS</h4>
    <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead>     
            <tr style="border: 1px solid #ddd;color: black;">
        <th style="width: 10%">#</th>
         <th  style="width:10%">Departamento</th>
         <th  style="width:10%">Encargado</th>
         <th  style="width:10%">Codigo</th>
         <th  style="width:50%">Descripción Completa</th>
         <th  style="width:10%">U/M</th>
         <th  style="width:10%">Cantidad</th>
         <th  style="width:10%">Costo Unitario</th>
         <th  style="width:10%">Ingreso Por</th>
         <th  style="width:20%">Fecha Registro</th>
         
       </tr>

     </thead>

     <tbody>
<?php


$sql = "SELECT * FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra";
$result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
 $precio=$productos['precio'];
       $precio3=number_format($precio, 2,".",",");
    $n++;
        $r=$n+0?>

<tr>
    <td data-label="#"><?php echo $r ?></td>
<td data-label="Departamento">Mantenimiento</td>
<td data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
<td data-label="Código de Producto"><?php  echo $productos['codigo']; ?></td>
<td data-label="Descripción Completa" style="text-align: left"><?php  echo $productos['descripcion']; ?></td>
<td data-label="Unidad De Medida" style=""><?php  echo $productos['unidad_medida']; ?></td>
<td data-label="Cantidad" style=""><?php  echo $productos['stock']; ?></td>
<td data-label="Costo Unitario">$<?php  echo $precio3 ?></td>
<td data-label="Fuente de Ingreso">Solicitud de Compra</td>
<td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
</tr>

<?php } ?> 

     </tbody>
 </table>
    <?php } if (isset($_POST['almacen'])) {?>

        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
        <h4 align="center" style="margin-top: 2%;">INGRESOS DE ALMACEN</h4>

    <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead>     
            <tr style="border: 1px solid #ddd;color: black;">
        <th style="width: 5%;">#</th>
         <th style="width: 10%;">Departamento</th>
         <th style="width: 10%;">Encargado</th>
         <th style="width: 10%;">Codigo</th>
         <th style="width: 50%;">Descripción Completa</th>
         <th style="width: 10%;">U/M</th>
         <th style="width: 10%;">Cantidad</th>
         <th style="width: 10%;">Costo Unitario</th>
         <th style="width: 10%;">Ingreso Por</th>
         <th style="width: 20%;">Fecha Registro</th>
         
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

<style type="text/css">

#td{
 display: none;
}
th{
width: 100%;
}
</style>
<tr id="tr">
<td data-label="#"><?php echo $r ?></td>
<td data-label="Departamento" style="text-align: left"><?php  echo $productos['departamento']; ?></td>
<td data-label="Encargado" style="text-align: left"><?php  echo $productos['encargado']; ?></td>
<td data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
<td data-label="Descripción" style="text-align: left"><?php  echo $productos['nombre']; ?></td>
<td data-label="Unidad De Medida" style=""><?php  echo $productos['unidad_medida']; ?></td>
<td data-label="Cantidad" style=""><?php  echo $productos['cantidad_solicitada']; ?></td>
<td data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
<td data-label="Fuente de Ingreso">Solicitud a Almacén</td>
<td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>



</tr>

<?php } ?> 

     </tbody>
 </table>

<?php } if (isset($_POST['circulante'])) {?>

<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">INGRESOS DE CIRCULANTE</h4>

    <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead>     
            <tr style="border: 1px solid #ddd;color: black;">
        
                <th style="width: 10%;">Código</th>
                <th style="width: 50%;color:black;text-align: left;">Descripción Completa</th>
                <th style="width: 10%;color:black;">U/M</th>
                <th style="width: 10%;color:black;font-size: 14px;">Cantidad Solicitada</th>
                <th style="width: 10%;color:black;font-size: 14px;">Costo Unitario</th>
                <th style="width: 10%;color:black;">Solicitud por</th>
                <th style="width: 20%;color:black;border-right:1px solid #ccc ;">Fecha</th>

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
    <tr id="tr">
        <!-- <td data-label="#"><?php echo $r ?></td> -->

      <td align="center" data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
      <td data-label="Descripción" style="text-align: left"><?php  echo $productos['descripcion']; ?></td>
      <td data-label="Unidad De Medida" style=""><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad" style=""><?php  echo $productos['stock']; ?></td>
      <td data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
      <td data-label="Fuente de Ingreso"><?php  echo $productos['campo']; ?></td>
      <td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
      
    </tr>
    </tbody>
<?php } ?>
</table> 
<?php } ?>

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
    $dompdf->stream("pdf_vale.php",array("Attachment"=>0));
            ?>