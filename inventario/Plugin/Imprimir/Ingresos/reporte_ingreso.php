<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="../../../log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
$tipo_usuario = $_SESSION['tipo_usuario'];
$idusuario = $_SESSION['iduser'];
?><?php 

include ('../../../Model/conexion.php');
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Reporte Ingreso</title>
       <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
     
 </head>
 <body>
    <section style="width: 100%;float: right;margin-bottom: 1%;">
<img src="../../../img/hospital.png" style="width:20%;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
            <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<?php if (isset($_POST['compra'])) {?>
    <h4 align="center" style="margin-top: 2%;">INGRESOS DE COMPRAS</h4>
<?php } if (isset($_POST['almacen'])) {?>
    <h4 align="center" style="margin-top: 2%;">INGRESOS DE ALMACEN</h4>
<?php } if (isset($_POST['circulante'])) {?>
    <h4 align="center" style="margin-top: 2%;">INGRESOS DE CIRCULANTE</h4>
<?php } ?>

</section>
     <style>

.table {width: 100%;border-collapse: collapse;margin: 0;table-layout: fixed;}
.table tbody tr {background-color: #f8f8f8;border: 1px solid #ddd;}
.table th, .table td {font-size: 12px;padding: 0.75rem;vertical-align: middle;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px;}


.table tbody tr:nth-child(even) {background-color: #00BDFF; height: 5%}
.table tbody tr:nth-child(odd) {background-color: #00EAFF; height: 5%}
p{font-size: 12px}

        #t{
    border-radius: 0.25rem;
    background: rgb(25 255 255);
  
    border: 1px solid #ccc;border-collapse: collapse;
    padding: 3%;

}
h6{margin: 0;font-size: 14px}
h3, h4, h5{font-size: 11px;text-align: center;}

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

    <?php
$total = "0.00";
$final = "0.00";
$final1 = "0.00";
$final2 = "0.00";
$final3 = "0.00";
$final4 = "0.00";
$final5 = "0.00";
$final6 = "0.00";
$final7 = "0.00";
$final8 = "0.00";
$final9 = "0.00";

     if (isset($_POST['compra'])) {?>

          <div id="h">
            <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
         <th style="width: 20%;">Departa <br> mento</th>
         <th style="width: 20%;">Encar <br>gado</th>
         <th style="width: 20%;">Codigo</th>
         <th style="width: 40%;">Descripción Completa</th>
         <th style="width: 20%;">U/M</th>
         <th style="width: 20%;">Canti <br> dad</th>
         <th style="width: 20%;">Costo <br> unitario</th>
         <th style="width: 30%;">Fecha </th>
         
       </tr>

     </thead>

     <tbody>



<?php if ($tipo_usuario==1) { 

$sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,descripcion_solicitud,unidad_medida,idusuario,solicitud_compra,dependencia,usuario,fecha_registro,plazo,Mes,Año,unidad_tecnica FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra GROUP by codigo ";
}
if ($tipo_usuario==2) { 

$sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,descripcion_solicitud,unidad_medida,idusuario,solicitud_compra,dependencia,usuario,fecha_registro,plazo,Mes,Año,unidad_tecnica FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra GROUP by codigo ";
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

      $cod=$productos['codigo'];
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
<td><?php  echo $stock; ?></td>
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
            <p style="border-bottom: 1px solid #ccc;"></p>
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
          <br>          
    <div id="t">
        <h6>Stock Por Mes</h6>
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock) FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra WHERE codigo='$cod' GROUP by Mes;";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra WHERE idusuario='$idusuario' and codigo='$cod' GROUP by Mes;";
        }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final6 += $cantidad;
        $final7   =    number_format($final6, 2, ".",",");
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
            <p style="border-bottom: 1px solid #ccc;"></p>
    <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>
</div>
 <br>
    <div id="t">
   <h6> Stock Por Año</h6>
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_compra` D JOIN `tb_compra` V ON D.solicitud_compra=V.nSolicitud WHERE codigo='$cod' GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(stock),idusuario FROM `detalle_compra` D JOIN `tb_compra` V ON D.solicitud_compra=V.nSolicitud WHERE idusuario='$idusuario' and codigo='$cod' GROUP by Año;";
     }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['Año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final4 += $cantidad;
        $final5   =    number_format($final4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
            <p style="border-bottom: 1px solid #ccc;"></p>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
</div>
</div>
</div>
        
    <?php } if (isset($_POST['almacen'])) {?>

   <div id="h">
    <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">

         <th style="width: 20%;">Codigo</th>
         <th style="width: 20%;">Departa <br> mento</th>
         <th style="width: 20%;">Encar <br>gado</th>
         <th style="width: 40%;">Descripción Completa</th>
         <th style="width: 20%;">U/M</th>
         <th style="width: 20%;">Canti <br> dad</th>
         <th style="width: 20%;">Costo <br> unitario</th>
         <th style="width: 30%;">Fecha </th>
         
       </tr>

       
     </thead>

     <tbody>
<?php
if ($tipo_usuario==1) {
$sql = "SELECT codigo,SUM(cantidad_solicitada),SUM(cantidad_despachada),precio,nombre,unidad_medida,idusuario,tb_almacen,departamento,encargado,fecha_solicitud,estado FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen GROUP by codigo";

}
if ($tipo_usuario==2) {

$sql = "SELECT codigo,SUM(cantidad_solicitada),SUM(cantidad_despachada),precio,nombre,unidad_medida,idusuario,tb_almacen,departamento,encargado,fecha_solicitud,estado FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen WHERE idusuario='$idusuario' GROUP by codigo";
}
         

$result = mysqli_query($conn, $sql);

while ($productos = mysqli_fetch_array($result)){
   
   $estado=$productos['estado'];
               if ($estado="Pendiente") {
        
    $total = $productos['SUM(cantidad_solicitada)'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['SUM(cantidad_despachada)'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");     
      $precio   =    $productos['precio'];
        $precio3  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(cantidad_solicitada)'];
        $cantidad_despachada=$productos['SUM(cantidad_despachada)'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

        $final2 += $cant_aprobada;
        $final3   =    number_format($final2, 2, ".",",");

        
        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");
?>

<tr id="tr">
<td><?php  echo $productos['codigo']; ?></td>
<td>Manteni <br>miento</td>
<td><?php  echo $productos['encargado']; ?></td>
<td><?php  echo $productos['nombre']; ?></td>
<td><?php  echo $productos['unidad_medida']; ?></td>
<td><?php  echo $productos['SUM(cantidad_solicitada)']; ?></td>
<td><?php  echo $precio3 ?></td>
<td><?php  echo date("d-m-Y",strtotime($productos['fecha_solicitud'])); ?></td>



</tr>

<?php } ?> 

     </tbody>
 </table>
         </div>
        <div id="a">
             <div id="t">
            <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
            <p style="border-bottom: 1px solid #ccc;"></p>
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
          <br>          
    <div id="t">
        <h6>Stock Por Mes</h6>
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(cantidad_solicitada) FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen GROUP by Mes;";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(cantidad_solicitada),idusuario FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen WHERE idusuario='$idusuario' GROUP by Mes;";
        }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $cantidad=$productos['SUM(cantidad_solicitada)'];
        $stock=number_format($cantidad, 2,".",",");
        $final6 += $cantidad;
        $final7   =    number_format($final6, 2, ".",",");
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
            <p style="border-bottom: 1px solid #ccc;"></p>
    <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>

</div>
 <br>
    <div id="t">
   <h6> Stock Por Año</h6>
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(cantidad_solicitada) FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen  GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(cantidad_solicitada),idusuario FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen  WHERE idusuario='$idusuario' GROUP by Año;";
     }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['Año'];
        $cantidad=$productos['SUM(cantidad_solicitada)'];
        $stock=number_format($cantidad, 2,".",",");
        $final4 += $cantidad;
        $final5   =    number_format($final4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
            <p style="border-bottom: 1px solid #ccc;"></p>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
</div>
</div>
</div>

<?php } if (isset($_POST['circulante'])) {?>

    <div id="h">
        <table class="table"  style=" width: 100%;">
    <thead>
        <tr id="tr">
   
                <th style="width: 20%;">Código</th>
                <th style="width: 60%">Descripción Completa</th>
                <th style="width: 20%;">U/M</th>
                <th style="width: 20%;">Cantidad Solicitada</th>
                <th style="width: 20%;">Costo Unitario</th>
                <th style="width: 25%;">Fecha</th>
        </tr>
    </thead>
    <tbody>

    <?php 
      if ($tipo_usuario==1) {
      
   $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,tb_circulante,fecha_solicitud,estado FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante  GROUP by codigo";
  }

if ($tipo_usuario==2) {
    
      $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,tb_circulante,fecha_solicitud,estado FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE idusuario='$idusuario' GROUP by codigo ";
}
    $result = mysqli_query($conn, $sql);
        
    while ($productos = mysqli_fetch_array($result)){
        $estado=$productos['estado'];
            if ($estado="Pendiente") {
        
    $total = $productos['SUM(stock)'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['SUM(cantidad_despachada)'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
        $precio   =    $productos['precio'];
        $precio3  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $cantidad_despachada=$productos['SUM(cantidad_despachada)'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

        $final2 += $cant_aprobada;
        $final3   =    number_format($final2, 2, ".",",");

        
        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");?>

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
      <td><?php  echo $productos['SUM(stock)']; ?></td>
      <td><?php  echo $precio3 ?></td>
      <td><?php  echo date("d-m-Y",strtotime($productos['fecha_solicitud'])); ?></td>
      
    </tr>
    </tbody>
<?php } ?>
</table> 
        </div>
        <div id="a">
             <div id="t">
            <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
            <p style="border-bottom: 1px solid #ccc;"></p>
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
          <br>          
    <div id="t">
        <h6>Stock Por Mes</h6>
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock) FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante GROUP by Mes;";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE idusuario='$idusuario' GROUP by Mes;";
        }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final6 += $cantidad;
        $final7   =    number_format($final6, 2, ".",",");
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
            <p style="border-bottom: 1px solid #ccc;"></p>
    <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>
</div>
 <br>
    <div id="t">
   <h6> Stock Por Año</h6>
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_circulante` D JOIN `tb_circulante` V ON D.tb_circulante=V.codCirculante GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(stock),idusuario FROM `detalle_circulante` D JOIN `tb_circulante` V ON D.tb_circulante=V.codCirculante WHERE idusuario='$idusuario' GROUP by Año;";
     }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['Año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final4 += $cantidad;
        $final5   =    number_format($final4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
            <p style="border-bottom: 1px solid #ccc;"></p>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
</div>
</div>
</div>
<?php }  ?>

 </body>
 </html>
<script type="text/javascript">
window.print();
</script>