<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="../../log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
$tipo_usuario = $_SESSION['tipo_usuario'];
?><?php 

include ('../../../Model/conexion.php');
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Reporte Ingreso</title>
 </head>
 <body>
     <style>

.table {width: 100%;border-collapse: collapse;margin: 0;table-layout: fixed;}
.table tbody tr {background-color: #f8f8f8;border: 1px solid #ddd;}
.table th, .table td {font-size: 12px;padding: 8px;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px;padding-right: 3%}


.table tbody tr:nth-child(even) {background-color: #00BDFF; height: 5%}
.table tbody tr:nth-child(odd) {background-color: #00EAFF; height: 5%}
p{font-size: 12px}
#div::-webkit-scrollbar {width: 8px;max-height: 75px}
#div::-webkit-scrollbar-track {background-color: transparent;}
#div::-webkit-scrollbar-thumb {background-color: darkgray;border-radius: 100vw;}
#div::-webkit-scrollbar-thumb:hover {background: rgb(105,105,108);
background: linear-gradient(90deg, rgba(105,105,108,1) 0%, rgba(115,115,126,1) 35%, rgba(0,212,255,1) 100%);}
#div{overflow-y: scroll;max-height: 130px;padding-right: 3%}

  </style>
<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">

    <?php
$total = 0;
$final = 0;
$final1 = 0;
$final2 = 0;
$final3 = 0;
$final4 = 0;
$final5 = 0;
$final6 = 0;
$final7 = 0;
$final8 = 0;
$final9 = 0;

     if (isset($_POST['compra'])) {?>
        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: 2%;">INGRESOS DE COMPRAS</h4>

  <section>
    <style>
        #t{
    border-radius: 0.25rem;
    background: rgb(25 255 255);
  
    border: 1px solid #ccc;border-collapse: collapse;
    padding: 3%;

}
h6{margin: 0;font-size: 14px}
#h{
    float: left;
margin-right: 1%;
        width: 75%;
        border-radius: 0.25rem;
    background: rgb(25 255 255);
    padding: .5%;
}
#a{
    float: left;
    width: 20%;
}
    </style>


        <div id="h">
          <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
         <th style="width: 10%;">Departa<br>mento</th>
         <th style="width: 10%;">Encargado</th>
         <th style="width: 10%;">Codigo</th>
         <th style="width: 30%">Descripción Completa</th>
         <th style="width: 10%;">U/M</th>
         <th style="width: 10%;">Cantidad</th>
         <th style="width: 10%;">Costo Unitario</th> 
         <th style="width: 10%;">Fecha Registro</th>
         
       </tr>

     </thead>

     <tbody>



<?php if ($tipo_usuario==1) { 

$sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_tecnica,idusuario, nSolicitud,dependencia,usuario, fecha_registro FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra GROUP by codigo,descripcion_solicitud,cantidad_despachada,stock,precio,fecha_registro";
}
if ($tipo_usuario==2) { 

$sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion_solicitud,unidad_tecnica,idusuario, nSolicitud,dependencia,usuario, fecha_registro FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra WHERE idusuario='$idusuario' GROUP by codigo,descripcion_solicitud,cantidad_despachada,stock,precio,fecha_registro";
}
$result = mysqli_query($conn, $sql);

while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['SUM(stock)'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['SUM(cantidad_despachada)'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
   $codigo=$productos['codigo'];

        $precio   =    $productos['precio'];
        $precio3  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $cantidad_despachada=$productos['SUM(cantidad_despachada)'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

        $final2 += $cant_aprobada;
        $final3   =    number_format($final2, 2, ".",",");

        
        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");

         if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        ?>

<tr>
<td>Manteni<br>miento</td>
<td><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
<td><?php  echo $productos['codigo']; ?></td>
<td><?php  echo $productos['descripcion']; ?></td>
<td><?php  echo $productos['unidad_tecnica']; ?></td>
<td><?php  echo $productos['SUM(stock)']; ?></td>
<td><?php  echo $precio3 ?></td>
<td><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
</tr>

<?php } ?> 

     </tbody>
 </table>
        </div>
        <div id="a">
             <div id="t">
            <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
          <br>          
    <div id="t">
        <h6>Stock Por Mes</h6>
<div id="div">
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock) FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra GROUP by Mes;";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra WHERE idusuario='$idusuario' GROUP by Mes;";
        }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $mes=$productos['Mes'];
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
                            ?>
               <p align="right"><b style="float: left;"><?php echo $mes ?>: </b><?php echo $stock ?></p>
   <?php  } ?>
</div>
</div>
 <br>
    <div id="t">
   <h6> Stock Por Año</h6>
<div id="div">
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(stock),idusuario FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE idusuario='$idusuario' GROUP by Año;";
     }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['Año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
</div>
</div>
</div>
        
    <?php } if (isset($_POST['almacen'])) {?>

        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
        <h4 align="center" style="margin-top: 2%;">INGRESOS DE ALMACEN</h4>
   <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">

         <th style="width: 20%;">Codigo</th>
         <th style="width: 20%;">Departamento</th>
         <th style="width: 30%;">Encargado</th>
         <th style="width: 50%;">Descripción Completa</th>
         <th style="width: 20%;">U/M</th>
         <th style="width: 20%;">Cantidad</th>
         <th style="width: 20%;">Costo Unitario</th>
         <th style="width: 20%;">Fecha Registro</th>
         
       </tr>

       
     </thead>

     <tbody>
<?php


$sql = "SELECT * FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen";
$result = mysqli_query($conn, $sql);

while ($productos = mysqli_fetch_array($result)){
     $precio=$productos['precio'];
       $precio2=number_format($precio, 2,".",",");
?>

<style type="text/css">

#td{
 display: none;
}
th{
width: 100%;
}
</style>
<tr id="tr">
<td><?php  echo $productos['departamento']; ?></td>
<td><?php  echo $productos['encargado']; ?></td>
<td><?php  echo $productos['codigo']; ?></td>
<td><?php  echo $productos['nombre']; ?></td>
<td><?php  echo $productos['unidad_medida']; ?></td>
<td><?php  echo $productos['cantidad_solicitada']; ?></td>
<td><?php  echo $precio2 ?></td>
<td><?php  echo date("d-m-Y",strtotime($productos['fecha_solicitud'])); ?></td>



</tr>

<?php } ?> 

     </tbody>
 </table>

<?php } if (isset($_POST['circulante'])) {?>

<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">INGRESOS DE CIRCULANTE</h4>

    <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
   
                <th>Código</th>
                <th style="width: 30%">Descripción Completa</th>
                <th>U/M</th>
                <th>Cantidad Solicitada</th>
                <th>Costo Unitario</th>
                <th>Fecha</th>
        </tr>
    </thead>
    <tbody>

    <?php 
     $sql = "SELECT * FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante";
    $result = mysqli_query($conn, $sql);
        
    while ($productos = mysqli_fetch_array($result)){
         $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");?>

 <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
</style> 
    <tr style="border: 1px solid #ccc;border-collapse: collapse;">


      <td><?php  echo $productos['codigo']; ?></td>
      <td><?php  echo $productos['descripcion']; ?></td>
      <td><?php  echo $productos['unidad_medida']; ?></td>
      <td><?php  echo $productos['stock']; ?></td>
      <td><?php  echo $precio1 ?></td>
      <td><?php  echo date("d-m-Y",strtotime($productos['fecha_solicitud'])); ?></td>
      
    </tr>
    </tbody>
<?php } ?>
</table> 
</section>
<?php } 



if (isset($_POST['compra1'])) {$idusuario=$_POST['idusuario'];?>
        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: 2%;">INGRESOS DE COMPRAS</h4>
<style>
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
        <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
         <th>Departament2o</th>
         <th>Encargado</th>
         <th>Codigo</th>
         <th style="width:20%;">Descripción Completa</th>
         <th>U/M</th>
         <th>Cantidad</th>
         <th>Costo Unitario</th>
         <th>Fecha Registro</th>
         
       </tr>

     </thead>

     <tbody>
<?php


$sql = "SELECT * FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra WHERE b.codigodetallecompra='$idusuario'";
$result = mysqli_query($conn, $sql);

while ($productos = mysqli_fetch_array($result)){
 $precio=$productos['precio'];
       $precio3=number_format($precio, 2,".",",");
?>

<tr>
<td>Manteni<br>miento</td>
<td><?php  echo $productos['usuario']; ?></td>
<td><?php  echo $productos['codigo']; ?></td>
<td><?php  echo $productos['descripcion']; ?></td>
<td><?php  echo $productos['unidad_medida']; ?></td>
<td><?php  echo $productos['stock']; ?></td>
<td><?php  echo $precio3 ?></td>
<td><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
</tr>

<?php } ?> 

     </tbody>
 </table>
    <?php } if (isset($_POST['almacen1'])) {$idusuario=$_POST['idusuario'];?>

        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
        <h4 align="center" style="margin-top: 2%;">INGRESOS DE ALMACEN</h4>
   <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">

         <th style="width: 20%;">Codigo</th>
         <th style="width: 20%;">Departamento</th>
         <th style="width: 30%;">Encargado</th>
         <th style="width: 50%;">Descripción Completa</th>
         <th style="width: 20%;">U/M</th>
         <th style="width: 20%;">Cantidad</th>
         <th style="width: 20%;">Costo Unitario</th>
         <th style="width: 20%;">Fecha Registro</th>
       </tr>

       
     </thead>

     <tbody>
<?php


$sql = "SELECT * FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen WHERE b.codigoalmacen='$idusuario'";
$result = mysqli_query($conn, $sql);

while ($productos = mysqli_fetch_array($result)){
     $precio=$productos['precio'];
       $precio2=number_format($precio, 2,".",",");
?>

<style type="text/css">

#td{
 display: none;
}
th{
width: 100%;
}
</style>
<tr id="tr">
<td><?php  echo $productos['departamento']; ?></td>
<td><?php  echo $productos['encargado']; ?></td>
<td><?php  echo $productos['codigo']; ?></td>
<td><?php  echo $productos['nombre']; ?></td>
<td><?php  echo $productos['unidad_medida']; ?></td>
<td><?php  echo $productos['cantidad_solicitada']; ?></td>
<td><?php  echo $precio2 ?></td>
<td><?php  echo date("d-m-Y",strtotime($productos['fecha_solicitud'])); ?></td>



</tr>

<?php } ?> 

     </tbody>
 </table>

<?php } if (isset($_POST['circulante1'])) { $idusuario=$_POST['idusuario'];?>

<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">INGRESOS DE CIRCULANTE</h4>

    <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
   
                <th>Código</th>
                <th style="width: 30%; ">Descripción Completa</th>
                <th>U/M</th>
                <th>Cantidad Solicitada</th>
                <th>Costo Unitario</th>
                <th>Fecha</th>
        </tr>
    </thead>
    <tbody>

    <?php 
   $sql = "SELECT * FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE b.codigodetallecirculante='$idusuario'";
    $result = mysqli_query($conn, $sql);
        
    while ($productos = mysqli_fetch_array($result)){
         $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");?>

 <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
</style> 
    <tr style="border: 1px solid #ccc;border-collapse: collapse;">


      <td><?php  echo $productos['codigo']; ?></td>
      <td><?php  echo $productos['descripcion']; ?></td>
      <td><?php  echo $productos['unidad_medida']; ?></td>
      <td><?php  echo $productos['stock']; ?></td>
      <td><?php  echo $precio1 ?></td>
      <td><?php  echo date("d-m-Y",strtotime($productos['fecha_solicitud'])); ?></td>
      
    </tr>
    </tbody>
<?php } ?>
</table> 
</section>
<?php } ?>
 </body>
 </html>
<script type="text/javascript">
// window.print();
</script>