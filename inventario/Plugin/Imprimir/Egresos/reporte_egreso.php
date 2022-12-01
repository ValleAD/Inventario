<?php 

include ('../../../Model/conexion.php');

 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Reporte Egreso</title>
        <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
 </head>
 <body>

<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
<style>
    .table td  { font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;}
     @media (max-width: 952px){
   h3, h4, h5{
    font-size: 1em;
    text-align: center;
   }
   section{
    margin: 2%;
   }
    }
  </style>
  <section>
    <?php if (isset($_POST['vale'])) {?>
        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: 2%;">EGRESOS DE VALE</h4>
        <table class="table table-responsive table-striped"  style=" width: 100%">

    <thead>
        <tr id="tr">
                <th style="width:10%">#</th>
                <th style="width: 15%;font-size: 14px;">No. Vale</th>
                <th style="width: 15%;font-size: 14px;">Departamento Solicitante</th>
                <th style="width: 15%;font-size: 14px;">Encargado</th>
                <th style="width: 15%;font-size: 14px;">Código</th>
                <th style="width: 100%;font-size: 14px;">Descripción Completa</th>
                <th style="width: 15%;font-size: 14px;">U/M</th>
                <th style="width: 15%;font-size: 14px;">Cantidad</th>
                <th style="width: 100%;font-size: 14px;">Costo Unitario</th>
                <th style="width: 100%;font-size: 14px;">Solictud de Salida</th>
                <th style="width: 100%;font-size: 14px;text-align: center">Fecha</th>
         
       </tr>

     </thead>

     <tbody>
<?php


    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale ";
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
     <tr style="border: 1px solid #ccc;border-collapse: collapse;">
        <td style="font-size: 12px;" data-label="#"><?php echo $r ?></td>
    <td style="font-size:12px;" data-label="No. Vale"><?php  echo $productos['numero_vale']; ?></td> 
    <td style="font-size:12px;" data-label="Departamento" style="text-align: left;"><?php  echo $productos['departamento']; ?></td>
    <td style="font-size:12px;" data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
    <td style="font-size:12px;" data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td style="font-size:12px;" data-label="Descripción Completa" style="text-align: left;"><?php  echo $productos['descripcion']; ?></td>
    <td style="font-size:12px;" data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
    <td style="font-size:12px;" data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
    <td style="font-size:12px;" data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
    <td style="font-size:12px;" data-label="Costo Unitario"><?php  echo $productos['campo']; ?></td>
    <td style="font-size:12px;" data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
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
   <table class="table table-responsive table-striped"  style=" width: 100%">

    <thead>
        <tr id="tr">
        <th style="width: 10%;font-size: 12px;">#</th>
         <th style="width: 15%;font-size: 12px;">Departamento</th>
         <th style="width: 15%;font-size: 12px;">Encargado</th>
         <th style="width: 15%;font-size: 12px;">Codigo</th>
         <th style="width: 50%;font-size: 12px;">Descripción Completa</th>
         <th style="width: 15%;font-size: 12px;">U/M</th>
         <th style="width: 15%;font-size: 12px;">Cantidad</th>
         <th style="width: 15%;font-size: 12px;">Costo Unitario</th>
         <th style="width: 15%;font-size: 12px;">Ingreso Por</th>
         <th style="width: 15%;font-size: 12px;">Fecha Registro</th>
         
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

<style type="text/css">

#td{
 display: none;
}
th{
width: 100%;
}
</style>
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">
    <td style="font-size: 12px;" data-label="#"><?php echo $r ?></td>
<td style="font-size: 12px;" data-label="Departamento" style="text-align: left"><?php  echo $productos['departamento']; ?></td>
<td style="font-size: 12px;" data-label="Encargado" style="text-align: left"><?php  echo $productos['usuario']; ?></td>
<td style="font-size: 12px;" data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
<td style="font-size: 12px;" data-label="Descripción" style="text-align: left"><?php  echo $productos['descripcion']; ?></td>
<td style="font-size: 12px;" data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
<td style="font-size: 12px;" data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
<td style="font-size: 12px;" data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
<td style="font-size: 12px;" data-label="Fuente de Ingreso">Solicitud a Almacén</td>
<td style="font-size: 12px;" data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>



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
        <table class="table table-responsive table-striped"  style=" width: 100%">

    <thead>
        <tr id="tr">
                <th style="width:10%">#</th>
                <th style="width: 15%;font-size: 14px;">No. Vale</th>
                <th style="width: 15%;font-size: 14px;">Departamento Solicitante</th>
                <th style="width: 15%;font-size: 14px;">Encargado</th>
                <th style="width: 15%;font-size: 14px;">Código</th>
                <th style="width: 100%;font-size: 14px;">Descripción Completa</th>
                <th style="width: 15%;font-size: 14px;">U/M</th>
                <th style="width: 15%;font-size: 14px;">Cantidad</th>
                <th style="width: 100%;font-size: 14px;">Costo Unitario</th>
                <th style="width: 100%;font-size: 14px;">Solictud de Salida</th>
                <th style="width: 100%;font-size: 14px;text-align: center">Fecha</th>
         
       </tr>

     </thead>

     <tbody>
<?php


 $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE V.idusuario='$idusuario'";
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
     <tr style="border: 1px solid #ccc;border-collapse: collapse;">
        <td style="font-size: 12px;" data-label="#"><?php echo $r ?></td>
    <td style="font-size:12px;" data-label="No. Vale"><?php  echo $productos['numero_vale']; ?></td> 
    <td style="font-size:12px;" data-label="Departamento" style="text-align: left;"><?php  echo $productos['departamento']; ?></td>
    <td style="font-size:12px;" data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
    <td style="font-size:12px;" data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td style="font-size:12px;" data-label="Descripción Completa" style="text-align: left;"><?php  echo $productos['descripcion']; ?></td>
    <td style="font-size:12px;" data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
    <td style="font-size:12px;" data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
    <td style="font-size:12px;" data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
    <td style="font-size:12px;" data-label="Costo Unitario"><?php  echo $productos['campo']; ?></td>
    <td style="font-size:12px;" data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
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
   <table class="table table-responsive table-striped"  style=" width: 100%">

    <thead>
        <tr id="tr">
        <th style="width: 10%;font-size: 12px;">#</th>
         <th style="width: 15%;font-size: 12px;">Departamento</th>
         <th style="width: 15%;font-size: 12px;">Encargado</th>
         <th style="width: 15%;font-size: 12px;">Codigo</th>
         <th style="width: 50%;font-size: 12px;">Descripción Completa</th>
         <th style="width: 15%;font-size: 12px;">U/M</th>
         <th style="width: 15%;font-size: 12px;">Cantidad</th>
         <th style="width: 15%;font-size: 12px;">Costo Unitario</th>
         <th style="width: 15%;font-size: 12px;">Ingreso Por</th>
         <th style="width: 15%;font-size: 12px;">Fecha Registro</th>
         
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

<style type="text/css">

#td{
 display: none;
}
th{
width: 100%;
}
</style>
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">
    <td style="font-size: 12px;" data-label="#"><?php echo $r ?></td>
<td style="font-size: 12px;" data-label="Departamento" style="text-align: left"><?php  echo $productos['departamento']; ?></td>
<td style="font-size: 12px;" data-label="Encargado" style="text-align: left"><?php  echo $productos['usuario']; ?></td>
<td style="font-size: 12px;" data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
<td style="font-size: 12px;" data-label="Descripción" style="text-align: left"><?php  echo $productos['descripcion']; ?></td>
<td style="font-size: 12px;" data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
<td style="font-size: 12px;" data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
<td style="font-size: 12px;" data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
<td style="font-size: 12px;" data-label="Fuente de Ingreso">Solicitud a Almacén</td>
<td style="font-size: 12px;" data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>



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