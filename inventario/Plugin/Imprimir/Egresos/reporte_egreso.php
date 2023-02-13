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
       <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">

     <title>Reporte Egreso</title>
 </head>
 <body>

<img src="../../../img/hospital.png" style="width:20%;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
<style>

.table {width: 100%;border-collapse: collapse;margin: 0;table-layout: fixed;}
.table tbody tr {background-color: #f8f8f8;border: 1px solid #ddd;}
.table th, .table td {font-size: 11px;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px;}

.table {
  width: 100%;
  margin-bottom: 1rem;
  background-color: transparent;
}


.table td {
  padding: 0.75rem;
  vertical-align: top;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #dee2e6;
}
.table-sm th,
.table-sm td {
  padding: 0.3rem;
}


.table tbody tr:nth-child(even) {background-color: #00BDFF; }
.table tbody tr:nth-child(odd) {background-color: #00EAFF; }
p{font-size: 11px}
hr{
    border: 1px solid #ccc;
}
        #t{
    border-radius: 0.25rem;
    background: rgb(25 255 255);
  
    border: 1px solid #ccc;border-collapse: collapse;
    padding: 3%;

}
h6{margin: 0;font-size: 14px}
#h{
    float: right;
        margin-right: 1%;
        width: 75%;
        border-radius: 0.25rem;
    padding: .5%;
}
#a{
    float: left;
    width: 20%;
    margin-left: 1%;
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
$idusuario = $_SESSION['iduser'];
 if (isset($_POST['vale'])) {?>
        <h3 style="text-align: center;font-size: 14px;">MINISTERIO DE SALUD HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 style="text-align: center;font-size: 14px;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES</h4>
<h4 style="text-align: center;font-size: 14px;">INSTITUCIONAL EGRESOS DE VALE</h4>
          <div id="h">
            <table class="table">

    <thead>
        <tr>
                
                <th style="width: 30%;"><p>No. <br>Vale</p></th>
                <th style="width: 30%;"><p>Codigo</p></th>
                <th style="width: 30%;"><p>Departa <br>mento</p></th>
                <th style="width: 30%;"><p>Encar <br>gado</p></th>
                <th style="width: 50%;"><p>Descripción Completa</p></th>
                <th style="width: 20%;"><p>U/M</p></th>
                <th style="width: 20%;"><p>Cant Soli</p></th>
                <th style="width: 20%;"><p>Cant Desp</p></th>
                <th style="width: 20%;"><p>Precio</p></th>
                <th style="width: 40%;"><p>Fecha</p></th>
         
       </tr>

     </thead>

     <tbody>
<?php
if ($tipo_usuario==1) {
    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale";
 }
 if ($tipo_usuario==2) {
$sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE V.idusuario='$idusuario'";
 }
    $result = mysqli_query($conn, $sql);;
    while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
   $cod=$productos['codigo'];
     $descripcion=$productos['descripcion'];
     $um=$productos['unidad_medida'];

        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['stock'];
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

       
            

     <tr>
    <td data-label="No. Vale"><?php  echo $productos['numero_vale']; ?></td> 
    <td data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td data-label="Departamento" ><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
    <td style="width: 80%;min-width: 100%;" data-label="Descripción Completa" style="text-align: left;"><?php  echo $productos['descripcion']; ?></td>
    <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad"><?php  echo $stock ?></td>
    <td data-label="Cantidad"><?php  echo $cantidad_desp ?></td>
    <td data-label="Costo Unitario"><?php  echo $precio2 ?></td>
    <td data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
 </tr>
<?php } ?>      
            </tbody>
        </table>
        </div>
        <div id="a">
             <div id="t">
            <p align="right"><b style="float: left;">Cantidad Soli: </b><?php echo $final3 ?></p>
            <p align="right"><b style="float: left;">Cantidad Despa: </b><?php echo $final5 ?></p>
            <p align="right"><b style="float: left;">Cant. Soli. - Cant. Despa.: </b><?php echo $final7 ?></p>
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
          <br>          
    <div id="t">
        <h6>Stock Por Mes</h6>
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock) FROM tb_vale db JOIN detalle_vale b ON db.CodVale = b.numero_vale   GROUP by Mes;";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario FROM tb_vale db JOIN detalle_vale b ON db.CodVale = b.numero_vale WHERE idusuario='$idusuario' GROUP by Mes;";
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
         <hr>
    <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>
</div>
 <br>
    <div id="t">
   <h6> Stock Por Año</h6>
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale   GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(stock),idusuario FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE idusuario='$idusuario' GROUP by Año;";
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
               <hr>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
</div>
</div>
</div>
    <?php } if (isset($_POST['vale1'])) {?>
        <h3 style="text-align: center;font-size: 14px;">MINISTERIO DE SALUD HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 style="text-align: center;font-size: 14px;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES</h4>
<h4 style="text-align: center;font-size: 14px;">INSTITUCIONAL EGRESOS DE VALE</h4>
          <div id="h">
            <table class="table">

    <thead>
        <tr>
                
                <th style="width: 30%;"><p>No. <br>Vale</p></th>
                <th style="width: 30%;"><p>Codigo</p></th>
                <th style="width: 30%;"><p>Departa <br>mento</p></th>
                <th style="width: 30%;"><p>Encar <br>gado</p></th>
                <th style="width: 50%;"><p>Descripción Completa</p></th>
                <th style="width: 20%;"><p>U/M</p></th>
                <th style="width: 20%;"><p>Cant Soli</p></th>
                <th style="width: 20%;"><p>Cant Desp</p></th>
                <th style="width: 20%;"><p>Precio</p></th>
                <th style="width: 40%;"><p>Fecha</p></th>
         
       </tr>

     </thead>

     <tbody>
<?php
if ($tipo_usuario==1) {
    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale";
 }
 if ($tipo_usuario==2) {
$sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE V.idusuario='$idusuario'";
 }
    $result = mysqli_query($conn, $sql);;
    while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
   $cod=$productos['codigo'];
     $descripcion=$productos['descripcion'];
     $um=$productos['unidad_medida'];

        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['stock'];
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

       
            

     <tr>
    <td data-label="No. Vale"><?php  echo $productos['numero_vale']; ?></td> 
    <td data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td data-label="Departamento" ><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
    <td style="width: 80%;min-width: 100%;" data-label="Descripción Completa" style="text-align: left;"><?php  echo $productos['descripcion']; ?></td>
    <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad"><?php  echo $stock ?></td>
    <td data-label="Cantidad"><?php  echo $cantidad_desp ?></td>
    <td data-label="Costo Unitario"><?php  echo $precio2 ?></td>
    <td data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
 </tr>
<?php } ?>      
            </tbody>
        </table>
        </div>
        <div id="a">
             <div id="t">
            <p align="right"><b style="float: left;">Cantidad Soli: </b><?php echo $final3 ?></p>
            <p align="right"><b style="float: left;">Cantidad Despa: </b><?php echo $final5 ?></p>
            <p align="right"><b style="float: left;">Cant. Soli. - Cant. Despa.: </b><?php echo $final7 ?></p>
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
          <br>          
    <div id="t">
        <h6>Stock Por Mes</h6>
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock) FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE GROUP by Mes;";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE idusuario='$idusuario'  GROUP by Mes;";
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
         <hr>
    <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>
</div>
 <br>
    <div id="t">
   <h6> Stock Por Año</h6>
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(stock),idusuario FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE idusuario='$idusuario'  GROUP by Año;";
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
               <hr>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
</div>
</div>
</div>
    <?php } if (isset($_POST['bodega'])) { ?>

        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD HOSPITAL NACIONAL SANTA TERESA</h3>
        <h4 align="center" style="margin-top: 2%;">EGRESOS DE BODEGA</h4>
          <div id="h">
   <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
                <th style="width: 30%;"><p>O. de T. No.</p></th>
                <th style="width: 30%;"><p>Codigo</p></th>
                <th style="width: 50%;"><p>Departamento</p></th>
                <th style="width: 30%;"><p>Encargado</p></th>
                <th style="width: 50%;"><p>Descripción </p></th>
                <th style="width: 30%;"><p>U/M</p></th>
                <th style="width: 30%;"><p>Cantidad Soli</p></th>
                <th style="width: 30%;"><p>Cantidad Despa</p></th>
                <th style="width: 30%;"><p>Precio</p></th>
                <th style="width: 30%;"><p>Fecha</p></th>
         
       </tr>

       
     </thead>

     <tbody>
<?php


$sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega";
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
   $cod=$productos['codigo'];
     $descripcion=$productos['descripcion'];
     $um=$productos['unidad_medida'];

        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['stock'];
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

 <tr>
    <td data-label="O. de T. No."><?php echo $productos['codBodega'] ?></td>
    <td data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td data-label="Departamento" ><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
    <td data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
    <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad"><?php  echo $stock ?></td>
    <td data-label="Cantidad"><?php  echo $cantidad_desp?></td>
    <td data-label="Costo Unitario"><?php  echo $precio2 ?></td>
    <td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>


</tr>

<?php } ?> 

     </tbody>
 </table>
         </div>
        <div id="a">
             <div id="t">
            <p align="right"><b style="float: left;">Cantidad Soli: </b><?php echo $final3 ?></p>
            <p align="right"><b style="float: left;">Cantidad Despa: </b><?php echo $final5 ?></p>
            <p align="right"><b style="float: left;">Soli. - Despa.: </b><?php echo $final7 ?></p>
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
          <br>          
    <div id="t">
        <h6>Stock Por Mes</h6>
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock) FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega  GROUP by Mes;";

        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE idusuario='$idusuario' GROUP by Mes;";

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
         <hr>
    <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>
</div>
 <br>
    <div id="t">
   <h6> Stock Por Año</h6>
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega   GROUP by Año;";

     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(stock),idusuario FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega WHERE idusuario='$idusuario' GROUP by Año;";

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
               <hr>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
</div>
</div>
</div>
<?php } if (isset($_POST['bodega1'])) { ?>

        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD HOSPITAL NACIONAL SANTA TERESA</h3>
        <h4 align="center" style="margin-top: 2%;">EGRESOS DE BODEGA</h4>
          <div id="h">
   <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
                <th style="width: 30%;"><p>O. de T. No.</p></th>
                <th style="width: 30%;"><p>Codigo</p></th>
                <th style="width: 50%;"><p>Departamento</p></th>
                <th style="width: 30%;"><p>Encargado</p></th>
                <th style="width: 50%;"><p>Descripción </p></th>
                <th style="width: 30%;"><p>U/M</p></th>
                <th style="width: 30%;"><p>Cantidad Soli</p></th>
                <th style="width: 30%;"><p>Cantidad Despa</p></th>
                <th style="width: 30%;"><p>Precio</p></th>
                <th style="width: 30%;"><p>Fecha</p></th>
         
       </tr>

       
     </thead>

     <tbody>
<?php


$sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega";
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
   $cod=$productos['codigo'];
     $descripcion=$productos['descripcion'];
     $um=$productos['unidad_medida'];

        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['stock'];
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

 <tr>
    <td data-label="O. de T. No."><?php echo $productos['codBodega'] ?></td>
    <td data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td data-label="Departamento" ><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
    <td data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
    <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad"><?php  echo $stock ?></td>
    <td data-label="Cantidad"><?php  echo $cantidad_desp?></td>
    <td data-label="Costo Unitario"><?php  echo $precio2 ?></td>
    <td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>


</tr>

<?php } ?> 

     </tbody>
 </table>
         </div>
        <div id="a">
             <div id="t">
            <p align="right"><b style="float: left;">Cantidad Soli: </b><?php echo $final3 ?></p>
            <p align="right"><b style="float: left;">Cantidad Despa: </b><?php echo $final5 ?></p>
            <p align="right"><b style="float: left;">Soli. - Despa.: </b><?php echo $final7 ?></p>
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
          <br>          
    <div id="t">
        <h6>Stock Por Mes</h6>
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock) FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega  GROUP by Mes;";

        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE idusuario='$idusuario' GROUP by Mes;";

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
         <hr>
    <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>
</div>
 <br>
    <div id="t">
   <h6> Stock Por Año</h6>
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega   GROUP by Año;";

     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(stock),idusuario FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega WHERE idusuario='$idusuario' GROUP by Año;";

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
               <hr>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
</div>
</div>
</div>
<?php }?>

 </body>
 </html>
<script type="text/javascript">
window.print();
</script>