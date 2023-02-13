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

?><?php include ('../../../Model/conexion.php');?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Filtro por Fechas</title>
       <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
 </head>
 <body>

<img src="../../../img/hospital.png" style="width:20% ;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
<h3 ><b>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</b></h3>
<h4 ><b>DEPARTAMENTO DE MANTENIMIENTO</b></h4>
<?php if (isset($_POST['Dia'])) {?>
<h5><b>FILTROS EN DIAS </b></h5>
<?php }if (isset($_POST['Mes'])) {?>
<h5><b>FILTROS EN MESES </b></h5>
<?php }if (isset($_POST['Año'])) {?>
<h5><b>FILTROS EN AÑOS </b></h5>
<?php }if (isset($_POST['Fecha'])) { ?>
<h5><b>FILTROS DE FECHAS</b></h5>
<?php } ?>
     <style>
.table {width: 100%;border-collapse: collapse;margin: 0;table-layout: fixed;}
.table tbody tr {background-color: #f8f8f8;border: 1px solid #ddd;}
.table th, .table td {font-size: 12px;padding: 8px;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px;}


.table tbody tr:nth-child(even) {background-color: #00BDFF; }
.table tbody tr:nth-child(odd) {background-color: #00EAFF; }
p{font-size: 14px}

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
        width: 74%;
        border-radius: 0.25rem;
}
#a{
    float: left;
    width: 25%;
}
   h3, h4, h5{
    font-size: 12px;
    text-align: center;
    }
  </style>
<section style="float: right;">
    <?php
    if (isset($_POST['Dia'])) {$dia=$_POST['dia'];
$totald = "0.00";
$totald1 = "0.00";
$finald = "0.00";
$finald1 = "0.00";
$finald2 = "0.00";
$finald3 = "0.00";
$finald4 = "0.00";
$finald5 = "0.00";
$finald6 = "0.00";
$finald7 = "0.00";
$finald8 = "0.00";
$finald9 = "0.00";
?><br>
    <p align="center"><b>El Dia Selecionado</b>: <?php echo $_POST['dia'] ?></p>
<div id="h">
    <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
            <th style="width: 20%;">Código</th>
            <th style="width: 20%;">Catálogo</th>
            <th style="width: 40%;">Descripción</th>
            <th style="width: 20%;">U/M</th>
            <th style="width: 20%;">Cantidad</th>
            <th style="width: 20%;">Precio</th>
            <th style="width: 20%;">Total</th>
            <th style="width: 30%;">Fecha</th>
        </tr>
    </thead>
    <tbody>
  <?php 
   $sql = "SELECT * FROM `tb_productos` WHERE dia='$dia'";
        $result = mysqli_query($conn, $sql);
 while ($productos = mysqli_fetch_array($result)){
    $totald = $productos['stock'] * $productos['precio'];

       $finald += $totald;
        $totald1= number_format($totald, 2, ".",",");
      $finald1=number_format($finald, 2, ".",",");

    $cod= $productos['codProductos'];
    $catal= $productos['catalogo'];
    $des= $productos['descripcion'];
    $u_m= $productos['unidad_medida'];
    $precio=$productos['precio'];
    $precio1=number_format($precio, 2,".",",");
    $cantidad=$productos['stock'];
    $stock=number_format($cantidad,  2,".",",");
    $fech= $productos['fecha_registro'];
    ?>
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">
        <td data-label="Codigo" style="font-size:12px"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="font-size:12px"><?php echo $catal ?></td>
        <td data-label="Descripción" style="font-size:12px"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="font-size:12px"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="font-size:12px"><?php echo $stock ?></td>
        <td data-label="Precio" style="font-size:12px"><?php echo $precio1 ?></td>
        <td data-label="Precio" style="font-size:12px"><?php echo $totald1 ?></td>
        <td data-label="Fecha" style="font-size:12px"><?php echo $fech ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
</div>
<div id="a">
    <div id="t">
        <?php 

         $sql="SELECT SUM(stock), precio, fecha_registro FROM tb_productos WHERE Dia='$dia' GROUP BY codProductos,precio,stock HAVING COUNT(*) ORDER BY dia DESC";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){

        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $stock=number_format($cant_aprobada, 2,".",",");

        $finald2 += $cant_aprobada;
        $finald3   =    number_format($finald2, 2, ".",",");

        
        $finald8 += $precio;
        $finald9   =    number_format($finald8, 2, ".",",");
        ?>
    <?php } ?>
    <p align="right"><b style="float: left;">Cantidad (Stock): </b><?php echo $finald3 ?></p>
                  <p align="right"><b style="float: left;">Precio: </b><?php echo $finald9 ?></p>
                  <p style="border-bottom: 1px solid #ccc;"></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $finald1?></p>

    </div><br>
    <div id="t">
                <h6 >Stock Por Mes</h6>

        <?php $sql="SELECT Mes,SUM(stock) FROM tb_productos WHERE Dia='$dia'  GROUP BY Mes;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $finald6 += $cantidad;
        $finald7   =    number_format($finald6, 2, ".",",");
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
               <p align="right"><b style="float: left;"><?php echo $mes ?> : </b><?php echo $stock ?></p>
   <?php  } ?>
   <p style="border: 1px solid #ccc;"></p>
   <p align="right"><b style="float: left;">Total </b><?php echo $finald7 ?></p>   
    </div><br>
    <div id="t">
           <h6> Stock Por Año</h6> 
    <?php $sql="SELECT año,SUM(stock) FROM tb_productos WHERE Dia='$dia'  GROUP BY año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $finald4 += $cantidad;
        $finald5   =    number_format($finald4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
   <p style="border: 1px solid #ccc;"></p>
   <p align="right"><b style="float: left;">Total </b><?php echo $finald5 ?></p>
    </div>
</div>
<?php } 
 if (isset($_POST['Mes'])) {$mes=$_POST['mes'];$mes1=$_POST['mes'];
            if ($mes==1)  { $mes="Enero";}
            if ($mes==2)  { $mes="Febrero";}
            if ($mes==3)  { $mes="Marzo";}
            if ($mes==4)  { $mes="Abril";}
            if ($mes==5)  { $mes="Mayo";}
            if ($mes==6)  { $mes="Junio";}
            if ($mes==7)  { $mes="Julio";}
            if ($mes==8)  { $mes="Agosto";}
            if ($mes==9)  { $mes="Septiembre";}
            if ($mes==10) { $mes="Octubre";}
            if ($mes==11) { $mes="Noviembre";}
            if ($mes==12) { $mes="Diciembre";}
            if ($mes1=="Enero")     { $mes1=1;}
            if ($mes1=="Febrero")   { $mes1=2;}
            if ($mes1=="Marzo")     { $mes1=3;}
            if ($mes1=="Abril")     { $mes1=4;}
            if ($mes1=="Mayo")      { $mes1=5;}
            if ($mes1=="Junio")     { $mes1=6;}
            if ($mes1=="Julio")     { $mes1=7;}
            if ($mes1=="Agosto")    { $mes1=8;}
            if ($mes1=="Septiembre"){ $mes1=9;}
            if ($mes1=="Octubre")   { $mes1==10;}
            if ($mes1=="Noviembre") { $mes1==11;}
            if ($mes1=="Diciembre") { $mes1==12;}
            if ($mes1 <=9) {$mes2=0;}
            if ($mes1 >=10) {$mes2="";} 
$totalm = "0.00";
$finalm = "0.00";
$finalm1 = "0.00";
$finalm2 = "0.00";
$finalm3 = "0.00";
$finalm4 = "0.00";
$finalm5 = "0.00";
$finalm6 = "0.00";
$finalm7 = "0.00";
$finalm8 = "0.00";
$finalm9 = "0.00";?><br>
                <p align="center"><b>El Mes selecionado: </b><?php echo $mes." ("."<b>Mes en numero:</b> ".$mes2.$mes1.")" ?></p>
<div id="h">
    
    <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
            <th style="width: 20%;">Código</th>
            <th style="width: 20%;">Catálogo</th>
            <th style="width: 40%;">Descripción</th>
            <th style="width: 20%;">U/M</th>
            <th style="width: 20%;">Cantidad</th>
            <th style="width: 20%;">Precio</th>
            <th style="width: 20%;">Total</th>
            <th style="width: 30%;">Fecha</th>
        </tr>
    </thead>
    <tbody>
  <?php 
            if ($mes=="Enero")     { $mes=1;}
            if ($mes=="Febrero")   { $mes=2;}
            if ($mes=="Marzo")     { $mes=3;}
            if ($mes=="Abril")     { $mes=4;}
            if ($mes=="Mayo")      { $mes=5;}
            if ($mes=="Junio")     { $mes=6;}
            if ($mes=="Junio")     { $mes=7;}
            if ($mes=="Agosto")    { $mes=8;}
            if ($mes=="Septiembre"){ $mes=9;}
            if ($mes=="Octubre")   { $mes==10;}
            if ($mes=="Noviembre") { $mes==11;}
            if ($mes=="Diciembre") { $mes==12;}
   $sql = "SELECT * FROM `tb_productos` WHERE mes='$mes'";
        $result = mysqli_query($conn, $sql);
 while ($productos = mysqli_fetch_array($result)){
    $totalm = $productos['stock'] * $productos['precio'];

       $finalm += $totalm;
        $totalm1= number_format($totalm, 2, ".",",");
      $finala1=number_format($finalm, 2, ".",",");

    $cod= $productos['codProductos'];
    $catal= $productos['catalogo'];
    $des= $productos['descripcion'];
    $u_m= $productos['unidad_medida'];
    $precio=$productos['precio'];
    $precio1=number_format($precio, 2,".",",");
    $cantidad=$productos['stock'];
    $stock=number_format($cantidad,  2,".",",");
    $fech= $productos['fecha_registro'];
    ?>
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">
        <td data-label="Codigo" style="font-size:12px"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="font-size:12px"><?php echo $catal ?></td>
        <td data-label="Descripción" style="font-size:12px"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="font-size:12px"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="font-size:12px"><?php echo $stock ?></td>
        <td data-label="Precio" style="font-size:12px"><?php echo $precio1 ?></td>
        <td data-label="Precio" style="font-size:12px"><?php echo $totalm1 ?></td>
        <td data-label="Fecha" style="font-size:12px"><?php echo $fech ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
</div>
<div id="a">
    <div id="t">
                <?php 

         $sql="SELECT SUM(stock), precio, fecha_registro FROM tb_productos WHERE Mes='$mes' GROUP BY codProductos,precio,stock HAVING COUNT(*) ORDER BY Mes DESC";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
$totalm = $productos['SUM(stock)'] * $productos['precio'];

       $finalm += $totalm;
        $total1= number_format($totalm, 2, ".",",");
      $finalm1=number_format($finalm, 2, ".",",");
        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $stock=number_format($cant_aprobada, 2,".",",");

        $finalm2 += $cant_aprobada;
        $finalm3   =    number_format($finalm2, 2, ".",",");

        
        $finalm8 += $precio;
        $finalm9   =    number_format($finalm8, 2, ".",",");
        ?>
    <?php } ?>
    <p align="right"><b style="float: left;">Cantidad (Stock): </b><?php echo $finalm3 ?></p>
                  <p align="right"><b style="float: left;">Precio: </b><?php echo $finalm9 ?></p>
                  <p style="border-bottom: 1px solid #ccc;"></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $finalm1?></p>
    </div><br>
    <div id="t">
               <h6 >Stock Por Mes</h6>
        <?php $sql="SELECT Mes,SUM(stock) FROM tb_productos WHERE Mes='$mes'  GROUP BY Mes;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $finalm6 += $cantidad;
        $finalm7   =    number_format($finalm6, 2, ".",",");
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
               <p align="right"><b style="float: left;"><?php echo $mes ?> : </b><?php echo $stock ?></p>
   <?php  } ?>
      <p style="border-bottom: 1px solid #ccc;"></p>
    <p align="right"><b style="float: left;">Total </b><?php echo $finalm7 ?></p>
 
    </div>
</div>
<?php } 
 if (isset($_POST['Año'])) {$año=$_POST['año'];
$totala = "0.00";
$finala = "0.00";
$finala1 = "0.00";
$finala2 = "0.00";
$finala3 = "0.00";
$finala4 = "0.00";
$finala5 = "0.00";
$finala6 = "0.00";
$finala7 = "0.00";
$finala8 = "0.00";
$finala9 = "0.00";?><br>
                <p align="center"><b>El Año selecionado</b>: <?php echo $_POST['año'] ?></p>
<div id="h">
    <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
            <th style="width: 20%;">Código</th>
            <th style="width: 20%;">Catálogo</th>
            <th style="width: 40%;">Descripción</th>
            <th style="width: 20%;">U/M</th>
            <th style="width: 20%;">Cantidad</th>
            <th style="width: 20%;">Precio</th>
            <th style="width: 20%;">Total</th>
            <th style="width: 30%;">Fecha</th>
        </tr>
    </thead>
    <tbody>
  <?php 
   $sql = "SELECT * FROM `tb_productos` WHERE año='$año'";
        $result = mysqli_query($conn, $sql);
 while ($productos = mysqli_fetch_array($result)){
    $totala = $productos['stock'] * $productos['precio'];

       $finala += $totala;
        $totala1= number_format($totala, 2, ".",",");
      $finala1=number_format($finala, 2, ".",",");

    $cod= $productos['codProductos'];
    $catal= $productos['catalogo'];
    $des= $productos['descripcion'];
    $u_m= $productos['unidad_medida'];
    $precio=$productos['precio'];
    $precio1=number_format($precio, 2,".",",");
    $cantidad=$productos['stock'];
    $stock=number_format($cantidad,  2,".",",");
    $fech= $productos['fecha_registro'];
    ?>
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">
        <td data-label="Codigo" style="font-size:12px"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="font-size:12px"><?php echo $catal ?></td>
        <td data-label="Descripción" style="font-size:12px"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="font-size:12px"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="font-size:12px"><?php echo $stock ?></td>
        <td data-label="Precio" style="font-size:12px"><?php echo $precio1 ?></td>
        <td data-label="Precio" style="font-size:12px"><?php echo $totala1 ?></td>
        <td data-label="Fecha" style="font-size:12px"><?php echo $fech ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
</div>
</div>
<div id="a">
    <div id="t">
               <?php 

         $sql="SELECT SUM(stock), precio, fecha_registro FROM tb_productos WHERE Año='$año' GROUP BY codProductos,precio,stock HAVING COUNT(*) ORDER BY Año DESC";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){

        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $stock=number_format($cant_aprobada, 2,".",",");

        $finala2 += $cant_aprobada;
        $finala3   =    number_format($finala2, 2, ".",",");

        
        $finala8 += $precio;
        $finala9   =    number_format($finala8, 2, ".",",");
        ?>
    <?php } ?>
    <p align="right"><b style="float: left;">Cantidad (Stock): </b><?php echo $finala3 ?></p>
                  <p align="right"><b style="float: left;">Precio: </b><?php echo $finala9 ?></p>
                  <p style="border-bottom: 1px solid #ccc;"></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $finala?></p> 
    </div><br>
    <div id="t">
           <h6> Stock Por Año</h6>
    <?php $sql="SELECT año,SUM(stock) FROM tb_productos WHERE Año='$año'  GROUP BY año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $finala4 += $cantidad;
        $finala5   =    number_format($finala4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
    <p style="border-bottom: 1px solid #ccc;"></p>
    <p align="right"><b style="float: left;">SubTotal</b><?php echo $finala5?></p>
    </div>
</div>
    <?php  } if (isset($_POST['Fecha'])) {$f1 =$_POST['f1'];$f2 =$_POST['f2'];?>
    
    <table style="width: 100%;">
        <tr>
        <td><b>Desde:</b> <?php echo $f1 ?></td>
        <td style="text-align: right;"><b>Hasta:</b> <?php echo $f2 ?></td>
</tr>
</table>
<div id="h">
    
    <table class="table"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
            <th style="width: 20%;">Código</th>
            <th style="width: 20%;">Catálogo</th>
            <th style="width: 40%;">Descripción</th>
            <th style="width: 20%;">U/M</th>
            <th style="width: 20%;">Cantidad</th>
            <th style="width: 20%;">Precio</th>
            <th style="width: 20%;">Total</th>
            <th style="width: 30%;">Fecha</th>
        </tr>
    </thead>
    <tbody>
  <?php 
  $totalf = "0.00";
  $totalf1 = "0.00";
$finalf = "0.00";
$finalf1 = "0.00";
$finalf2 = "0.00";
$finalf3 = "0.00";
$finalf4 = "0.00";
$finalf5 = "0.00";
$finalf6 = "0.00";
$finalf7 = "0.00";
$finalf8 = "0.00";
$finalf9 = "0.00";
   $sql = "SELECT * FROM `tb_productos` WHERE fecha_registro BETWEEN ' $f1' AND ' $f2'";
        $result = mysqli_query($conn, $sql);
 while ($productos = mysqli_fetch_array($result)){
    $totala = $productos['stock'] * $productos['precio'];

       $finalf += $totalf;
        $total1= number_format($totalf, 2, ".",",");
      $finalf1=number_format($finalf, 2, ".",",");

    $cod= $productos['codProductos'];
    $catal= $productos['catalogo'];
    $des= $productos['descripcion'];
    $u_m= $productos['unidad_medida'];
    $precio=$productos['precio'];
    $precio1=number_format($precio, 2,".",",");
    $cantidad=$productos['stock'];
    $stock=number_format($cantidad,  2,".",",");
    $fech= $productos['fecha_registro'];
    ?>
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">

        <td data-label="Codigo" style="font-size:12px"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="font-size:12px"><?php echo $catal ?></td>
        <td data-label="Descripción" style="font-size:12px"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="font-size:12px"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="font-size:12px"><?php echo $stock ?></td>
        <td data-label="Precio" style="font-size:12px"><?php echo $precio1 ?></td>
        <td data-label="Precio" style="font-size:12px"><?php echo $totalf1 ?></td>
        <td data-label="Fecha" style="font-size:12px"><?php echo $fech ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
</div>
</div>
<div id="a">
    <div id="t">
               <?php 

         $sql="SELECT SUM(stock), precio, fecha_registro FROM tb_productos WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' GROUP BY codProductos,precio,stock HAVING COUNT(*) ORDER BY Año DESC";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){

        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $stock=number_format($cant_aprobada, 2,".",",");

        $finalf2 += $cant_aprobada;
        $finalf3   =    number_format($finalf2, 2, ".",",");

        
        $finalf8 += $precio;
        $finalf9   =    number_format($finalf8, 2, ".",",");
        ?>
    <?php } ?>
    <p align="right"><b style="float: left;">Cantidad (Stock): </b><?php echo $finalf3 ?></p>
                  <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $finalf9 ?></p>
    <p style="border-bottom: 1px solid #ccc;"></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $finalf1?></p> 
    </div><br>
    <div id="t">
        <h6 >Stock Por Mes</h6>
       
        <?php $sql="SELECT Mes,SUM(stock) FROM tb_productos WHERE fecha_registro BETWEEN ' $f1' AND ' $f2'  GROUP BY Mes;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $finalf6 += $cantidad;
        $finalf7   =    number_format($finalf6, 2, ".",",");
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
               <p align="right"><b style="float: left;"><?php echo $mes ?> : </b><?php echo $stock ?></p>
   <?php  } ?>

    <p style="border-bottom: 1px solid #ccc;"></p>
    <p align="right"><b style="float: left;">SubTotal</b><?php echo $finalf7?></p>
    </div><br>
    <div id="t">
           <h6> Stock Por Año</h6>
          <div class="div1 div4" >
    <?php $sql="SELECT año,SUM(stock) FROM tb_productos WHERE fecha_registro BETWEEN ' $f1' AND ' $f2'  GROUP BY año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $finalf4 += $cantidad;
        $finalf5   =    number_format($finalf4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>

    <p style="border-bottom: 1px solid #ccc;"></p>
    <p align="right"><b style="float: left;">SubTotal</b><?php echo $finalf5?></p>
    </div>
</div>
<?php } ?>
</section>
 </body>
 </html>
<script type="text/javascript">
window.print();
</script>