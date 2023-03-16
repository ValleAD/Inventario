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
$idusuario = $_SESSION['iduser'];
?>   <?php ob_start();
    include ('../../../Model/conexion.php') ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reporte Ingreso en PDF</title>
       <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
        
    </head>
    <body style="font-family: sans-serif;">
        <img src="../../../img/hospital.png" style="width:20%;float: left;">
        <img src="../../../img/log_1.png" style="width:20%; float:right">
<style>
.table {width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin-top: 0%;padding: 0;color: black;table-layout: fixed;}
.table tr {background-color: #f8f8f8;border: 1px solid #ddd;color: black;}
.table th, .table td {font-size: 12px;padding: 8px;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: justify;font-size: 14px}
    .table tbody tr:nth-child(even) {background-color: #00BDFF; height: 5%}
.table tbody tr:nth-child(odd) {background-color: #00EAFF; height: 5%}
h6{margin: 0;font-size: 14px}

#t{margin-bottom: 5%;margin-top: 1%;}
#a{border: 1px solid #ccc;border-collapse: collapse;border-radius: 0.25rem;background: rgb(25 255 255);float: left;width: 33.33%;margin-right: 1%;}

#b{border: 1px solid #ccc;border-radius: 0.25rem;background: rgb(25 255 255);padding: 3%}
#c{border: 1px solid #ccc;border-radius: 0.25rem;background: rgb(25 245 245);padding: 3%;}

h3, h4, h5{font-size: 10px;text-align: center;}
p{font-size: 11px;}
h6{margin: 0;font-size: 14px}
.row {
    margin-right: 0;
    margin-left: 0;
    display: block;
}

.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 { position: relative;
    min-height: 1px;
    padding-right: 0;
    padding-left: 0;
}

.col-md-1,
.col-md-2,
.col-md-3,
.col-md-4,
.col-md-5,
.col-md-6,
.col-md-7,
.col-md-8,
.col-md-9,
.col-md-10,
.col-md-11,
.col-md-12 {
    display: inline-block;

}

.col-md-12 {
    width: 100%;
}

.col-md-11 {
    width: 91.66666667%;
}

.col-md-10 {
    width: 83.33333333%;
}

.col-md-9 {
    width: 75%;
}

.col-md-8 {
    width: 66.66666667%;
}

.col-md-7 {
    width: 58.33333333%;
}

.col-md-6 {
    width: 49.5%;
}

.col-md-5 {
    width: 41.66666667%;
}

.col-md-4 {
    width: 33.33333333%;
}

.col-md-3 {
    width: 24.5%;
}

.col-md-2 {
    width: 16.66666667%;
}

.col-md-1 {
    width: 8.33333333%;
}
.col-md-12 .card.card-outline{
    width: 100%;
    display: block;
}
div.break-before{
    page-break-before: always;
}
.avoid-pg-break-inside{
    page-break-inside: avoid;
}
.card {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 0.25rem;
}
.card-body {
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: .5rem;
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
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: 2%;">INGRESOS DE COMPRAS</h4>

<?php $sql = "SELECT * FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra";
    $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

        $final2 += $cant_aprobada;
        $final3   =    number_format($final2, 2, ".",",");
        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");

         if ($productos['idusuario']==1) {
        $u='Admin';
        }
        else {
            $u='Cliente';
        }if ($productos['idusuario']==0) {
            $u='Invitado';
        }
         ?>
     <?php } ?>
        <br> <br>
       <div class="row" align="center" >
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Soli.: </b><?php echo $final3 ?></p>
        </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
</div>
</div>
</div>
          <br> 
    
            <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
         <th style="width: 20%;">Departa<br>mento</th>
         <th style="width: 30%;">Encargado</th>
         <th style="width: 20%;">Codigo</th>
         <th style="width: 30%">Descripción Completa</th>
         <th style="width: 20%;">U/M</th>
         <th style="width: 20%;">Cantidad</th>
         <th style="width: 20%;">Costo Unitario</th> 
         <th style="width: 30%;">Fecha Registro</th>
         
       </tr>

     </thead>

     <tbody>



<?php if ($tipo_usuario==1) { 

$sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,descripcion_solicitud,unidad_medida,idusuario,solicitud_compra,dependencia,usuario,fecha_registro,plazo,Mes,Año,unidad_tecnica FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra ";
}
if ($tipo_usuario==2) { 

$sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,descripcion_solicitud,unidad_medida,idusuario,solicitud_compra,dependencia,usuario,fecha_registro,plazo,Mes,Año,unidad_tecnica FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra ";
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
<br><div class="card">
    <div class="card-body">
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
</div>
 <br>
 <div class="card">
    <div class="card-body">
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
        
    <?php } if (isset($_POST['almacen'])) {?>
        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3><b>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</b></h3>
        <h4 align="center" style="margin-top: 2%;">INGRESOS DE ALMACEN</h4>
        <?php $sql = "SELECT * FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen";
    $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['cantidad_solicitada'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
        $odt= $productos['codAlmacen'];
        $cod=$productos['codigo'];
        $descripcion=$productos['nombre'];
        $um=$productos['unidad_medida'];
        $departamento=$productos['departamento'];
        $fecha=date("d-m-Y",strtotime($productos['fecha_solicitud']));
        $usuario= $productos['encargado'];
        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['cantidad_solicitada'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

        $final2 += $cant_aprobada;
        $final3   =    number_format($final2, 2, ".",",");

        $final4 += $cantidad_despachada;
        $final5   =    number_format($final4, 2, ".",",");
        
        $final6 += ($cant_aprobada-$cantidad_despachada);
        $final7   =    number_format($final6, 2, ".",",");
        
        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");

         if ($productos['idusuario']==1) {
        $u='Admin';
        }
        else {
            $u='Cliente';
        }if ($productos['idusuario']==0) {
            $u='Invitado';
        }
         ?>
     <?php } ?>
        <br> <br>
       <div class="row" >
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Soli.: </b><?php echo $final3 ?></p>
        </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Despa: </b><?php echo $final5 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Soli. - Cant. Despa.: </b><?php echo $final7 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
</div>
</div>
</div>
          <br> 
    <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">

         <th style="width: 20%;">Codigo</th>
         <th style="width: 20%;">Departa <br> mento</th>
         <th style="width: 30%;">Encargado</th>
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
$sql = "SELECT codigo,SUM(cantidad_solicitada),SUM(cantidad_despachada),precio,nombre,unidad_medida,idusuario,tb_almacen,departamento,encargado,fecha_solicitud,estado FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen ";

}
if ($tipo_usuario==2) {

$sql = "SELECT codigo,SUM(cantidad_solicitada),SUM(cantidad_despachada),precio,nombre,unidad_medida,idusuario,tb_almacen,departamento,encargado,fecha_solicitud,estado FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen WHERE idusuario='$idusuario' ";
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
          <br> 
          <div class="card">
            <div class="card-body">         
        <h6>Stock Por Mes</h6>
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(cantidad_solicitada) FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen   GROUP by Mes;";
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
</div>
 <br>
<div class="card">
    <div class="card-body">
   <h6> Stock Por Año</h6>
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(cantidad_solicitada) FROM `detalle_almacen` D JOIN `tb_almacen` V ON D.tb_almacen=V.codAlmacen   GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(cantidad_solicitada),idusuario FROM `detalle_almacen` D JOIN `tb_almacen` V ON D.tb_almacen=V.codAlmacen WHERE idusuario='$idusuario' GROUP by Año;";
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
<?php } if (isset($_POST['circulante'])) {?>

<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">INGRESOS DE CIRCULANTE</h4>
<?php $sql = "SELECT * FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante";
    $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
        $odt= $productos['codCirculante'];
        $cod=$productos['codigo'];
        $descripcion=$productos['descripcion'];
        $um=$productos['unidad_medida'];
        $fecha=date("d-m-Y",strtotime($productos['fecha_solicitud']));
        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

        $final2 += $cant_aprobada;
        $final3   =    number_format($final2, 2, ".",",");
        
        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");

         if ($productos['idusuario']==1) {
        $u='Admin';
        }
        else {
            $u='Cliente';
        }if ($productos['idusuario']==0) {
            $u='Invitado';
        }
         ?>
     <?php } ?>
        <br> <br>
       <div class="row" >
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Soli.: </b><?php echo $final3 ?></p>
        </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Despa: </b><?php echo $final5 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
</div>
</div>
</div>
          <br> 
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
          if ($tipo_usuario==1) {
      
   $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,tb_circulante,fecha_solicitud,estado FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante  ";
  }

if ($tipo_usuario==2) {
    
      $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,tb_circulante,fecha_solicitud,estado FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE idusuario='$idusuario'  ";
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
<br>
<div class="card">
    <div class="card-body">
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
</div>
 <br>
<div class="card">
    <div class="card-body">
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
<?php }  ?>
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