<?php 

include ('../Model/conexion.php');
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Reporte Ingreso</title>
 </head>
 <body>

   <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../styles/estilos_tablas.css">

<img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">
    <?php if (isset($_POST['compra'])) {?>
        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: 2%;">INGRESOS DE COMPRAS</h4>
        <table class="table table-responsive table-striped"  style=" width: 100%">

    <thead>
        <tr id="tr">
         <th  style="font-size: 14px;width: 10%">#</th>
         <th  style="font-size: 14px;width:15%">Departamento</th>
         <th  style="font-size: 14px;width:15%">Encargado</th>
         <th  style="font-size: 14px;width:10%">Codigo</th>
         <th  style="font-size: 14px;width:100%">Descripción Completa</th>
         <th  style="font-size: 14px;width:100%">U/M</th>
         <th  style="font-size: 14px;width:100%">Cantidad</th>
         <th  style="font-size: 14px;width:100%">Costo Unitario</th>
         <th  style="font-size: 14px;width:100%">Ingreso Por</th>
         <th  style="font-size: 14px;width:100%">Fecha Registro</th>
         
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
    <td  style="font-size: 12px;" data-label="#"><?php echo $r ?></td>
<td  style="font-size: 12px;" data-label="Departamento">Mantenimiento</td>
<td  style="font-size: 12px;" data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
<td  style="font-size: 12px;" data-label="Código de Producto"><?php  echo $productos['codigo']; ?></td>
<td  style="font-size: 12px;" data-label="Descripción Completa" style="text-align: left"><?php  echo $productos['descripcion']; ?></td>
<td  style="font-size: 12px;" data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
<td  style="font-size: 12px;" data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
<td  style="font-size: 12px;" data-label="Costo Unitario">$<?php  echo $precio3 ?></td>
<td  style="font-size: 12px;" data-label="Fuente de Ingreso">Solicitud de Compra</td>
<td  style="font-size: 12px;" data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
</tr>

<?php } ?> 

     </tbody>
 </table>
    <?php } if (isset($_POST['almacen'])) {?>

        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
        <h4 align="center" style="margin-top: 2%;">INGRESOS DE ALMACEN</h4>
   <table class="table table-responsive table-striped"  style=" width: 100%">

    <thead>
        <tr id="tr">
         <th style="font-size: 14px;width: 10%">#</th>
         <th style="font-size: 14px;width: 15%">Departamento</th>
         <th style="font-size: 14px;width: 15%">Encargado</th>
         <th style="font-size: 14px;width: 15%">Codigo</th>
         <th style="font-size: 14px;width: 50%">Descripción Completa</th>
         <th style="font-size: 14px;width: 15%">U/M</th>
         <th style="font-size: 14px;width: 15%">Cantidad</th>
         <th style="font-size: 14px;width: 15%">Costo Unitario</th>
         <th style="font-size: 14px;width: 15%">Ingreso Por</th>
         <th style="font-size: 14px;width: 15%">Fecha Registro</th>
         
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
    <td  style="font-size: 12px;" data-label="#"><?php echo $r ?></td>
<td  style="font-size: 12px;" data-label="Departamento" style="text-align: left"><?php  echo $productos['departamento']; ?></td>
<td  style="font-size: 12px;" data-label="Encargado" style="text-align: left"><?php  echo $productos['encargado']; ?></td>
<td  style="font-size: 12px;" data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
<td  style="font-size: 12px;" data-label="Descripción" style="text-align: left"><?php  echo $productos['nombre']; ?></td>
<td  style="font-size: 12px;" data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
<td  style="font-size: 12px;" data-label="Cantidad" style="text-align: center;"><?php  echo $productos['cantidad_solicitada']; ?></td>
<td  style="font-size: 12px;" data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
<td  style="font-size: 12px;" data-label="Fuente de Ingreso">Solicitud a Almacén</td>
<td  style="font-size: 12px;" data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>



</tr>

<?php } ?> 

     </tbody>
 </table>

<?php } if (isset($_POST['circulante'])) {?>

<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">INGRESOS DE CIRCULANTE</h4>

    <table class="table table-responsive table-striped"  style=" width: 100%">

    <thead>
        <tr id="tr">
                <th  style="font-size: 14px;width: 10%">#</th>
                <th  style="font-size: 14px;width: 10%">Codigo</th>
                <th  style="font-size: 14px;width: 100%">Descripción Completa</th>
                <th  style="font-size: 14px;width: 100%">U/M</th>
                <th  style="font-size: 14px;width: 100%">Cantidad</th>
                <th  style="font-size: 14px;width: 100%">Costo Unitario</th>
                <th  style="font-size: 14px;width: 100%">Ingreso Por</th>
                <th  style="font-size: 14px;width: 100%">Fecha Registro</th>
                   <tr> <td  style="font-size: 12px;" align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td></tr>

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
    <tr style="border: 1px solid #ccc;border-collapse: collapse;">
        <td  style="font-size: 12px;" style="border: 1px solid #ccc;" data-label="#"><?php echo $r ?></td>

      <td  style="font-size: 12px;" data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
      <td  style="font-size: 12px;" data-label="Descripción" style="text-align: left"><?php  echo $productos['descripcion']; ?></td>
      <td  style="font-size: 12px;" data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
      <td  style="font-size: 12px;" data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
      <td  style="font-size: 12px;" data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
      <td  style="font-size: 12px;" data-label="Fuente de Ingreso"><?php  echo $productos['campo']; ?></td>
      <td  style="font-size: 12px;" data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
      
    </tr>
    </tbody>
<?php } ?>
</table> 
<?php } ?>
 </body>
 </html>
<script type="text/javascript">
print('');
</script>