<?php 

include ('../../../Model/conexion.php');

 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Reporte Egreso</title>
 </head>
 <body>

<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
     <style>

.table {width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed;}
.table tr {background-color: #f8f8f8;border: 1px solid #ddd;color: black;}
.table th, .table td {font-size: 12px;padding: 8px;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px}


.table tbody tr:nth-child(even) {background-color: #00BDFF; height: 5%}
.table tbody tr:nth-child(odd) {background-color: #00EAFF; height: 5%}
    }
  </style>
    <?php if (isset($_POST['vale'])) {?>
        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: 2%;">EGRESOS DE VALE</h4>
        <table class="table">

    <thead>
        <tr>
                
                <th style="width: 20%;">No. Vale</th>
                <th style="width: 25%;">Departamento</th>
                <th style="width: 20%;">Encargado</th>
                <th style="width: 20%;">Código</th>
                <th style="width: 30%;">Descripción</th>
                <th style="width: 20%;">U/M</th>
                <th style="width: 20%;">Cantidad</th>
                <th style="width: 20%;">Costo Unitario</th>
                <th style="width: 20%;">Fecha</th>
         
       </tr>

     </thead>

     <tbody>
<?php


    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale ";
    $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
 $precio=$productos['precio'];
       $precio2=number_format($precio, 2,".",",");
?>

       
            

     <tr>
    <td data-label="No. Vale"><?php  echo $productos['numero_vale']; ?></td> 
    <td data-label="Departamento"><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
    <td data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td data-label="Descripción Completa"><?php  echo $productos['descripcion']; ?></td>
    <td data-label="Unidad De Medida" ><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad" ><?php  echo $productos['stock']; ?></td>
    <td data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
    <td data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
<?php } ?>      
 </tr>
            </tbody>
        </table>
     </tbody>
 </table>
    <?php } if (isset($_POST['bodega1'])) {$idusuario=$_POST['idusuario'];?>

        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
        <h4 align="center" style="margin-top: 2%;">EGRESOS DE BODEGA</h4>
   <table class="table"  style=" width: 100%">

    <thead>
        <tr id="tr">
         <th style="width: 25%;">Departamento</th>
         <th style="width: 20%;">Encargado</th>
         <th style="width: 20%;">Codigo</th>
         <th style="width: 30%;">Descripción</th>
         <th style="width: 20%;">U/M</th>
         <th style="width: 20%;">Cantidad</th>
         <th style="width: 20%;">Costo Unitario</th>
         <th style="width: 20%;">Fecha Registro</th>
         
       </tr>

       
     </thead>

     <tbody>
<?php


        $sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE db.idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
     $precio=$productos['precio'];
       $precio2=number_format($precio, 2,".",",");
       $n++;
        $r=$n+0?>

 <tr>
<td data-label="Departamento"><?php  echo $productos['departamento']; ?></td>
<td data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
<td data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
<td data-label="Descripción"><?php  echo $productos['descripcion']; ?></td>
<td data-label="Unidad De Medida" ><?php  echo $productos['unidad_medida']; ?></td>
<td data-label="Cantidad" ><?php  echo $productos['stock']; ?></td>
<td data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
<td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>



</tr>

<?php } ?> 

     </tbody>
 </table>
<?php }?>




    <?php if (isset($_POST['vale1'])) {$idusuario=$_POST['idusuario'];?>
        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: 2%;">EGRESOS DE VALE</h4>
        <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
                <th style="width: 20%;">No. Vale</th>
                <th style="width: 25%;">Departamento</th>
                <th style="width: 20%;">Encargado</th>
                <th style="width: 20%;">Código</th>
                <th style="width: 30%;">Descripción</th>
                <th style="width: 20%;">U/M</th>
                <th style="width: 20%;">Cantidad</th>
                <th style="width: 20%;">Costo Unitario</th>
                <th style="width: 20%;">Solictud de Salida</th>
                <th style="width: 20%;">Fecha</th>
         
       </tr>

     </thead>

     <tbody>
<?php


 $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE V.idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
 $precio=$productos['precio'];
       $precio2=number_format($precio, 2,".",",");
?>

       
            

     <tr>

    <td data-label="No. Vale"><?php  echo $productos['numero_vale']; ?></td> 
    <td data-label="Departamento"><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
    <td data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td data-label="Descripción Completa"><?php  echo $productos['descripcion']; ?></td>
    <td data-label="Unidad De Medida" ><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad" ><?php  echo $productos['stock']; ?></td>
    <td data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
    <td data-label="Costo Unitario"><?php  echo $productos['campo']; ?></td>
    <td data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
<?php } ?>      
 </tr>
            </tbody>
        </table>


     </tbody>
 </table>
    <?php } if (isset($_POST['bodega'])) { ?>

        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
        <h4 align="center" style="margin-top: 2%;">EGRESOS DE BODEGA</h4>
   <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
         <th style="width: 25%;">Departamento</th>
         <th style="width: 20%;">Encargado</th>
         <th style="width: 20%;">Codigo</th>
         <th style="width: 30%;">Descripción</th>
         <th style="width: 20%;">U/M</th>
         <th style="width: 20%;">Cantidad</th>
         <th style="width: 20%;">Costo Unitario</th>
         <th style="width: 20%;">Fecha Registro</th>
         
       </tr>

       
     </thead>

     <tbody>
<?php


$sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega";
    $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
     $precio=$productos['precio'];
       $precio2=number_format($precio, 2,".",",");
       $n++;
        $r=$n+0?>

 <tr>
<td data-label="Departamento"><?php  echo $productos['departamento']; ?></td>
<td data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
<td data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
<td data-label="Descripción"><?php  echo $productos['descripcion']; ?></td>
<td data-label="Unidad De Medida" ><?php  echo $productos['unidad_medida']; ?></td>
<td data-label="Cantidad" ><?php  echo $productos['stock']; ?></td>
<td data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
<td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>



</tr>

<?php } ?> 

     </tbody>
 </table>
<?php }?>
</section>

 </body>
 </html>
<script type="text/javascript">
window.print();
</script>