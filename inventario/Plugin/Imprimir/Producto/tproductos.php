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

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Imprimir Producto</title>
      <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">  
  
</head>
<body style="font-family: sans-serif;">

    <img src="../../../img/hospital.png" style="width:20%;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
    <style>
table tr td {padding: 1%}
.table {width: 100%;border-collapse: collapse;margin: 0;table-layout: fixed;}
.table tbody tr {background-color: #f8f8f8;}
.table th, .table td {font-size: 10px;text-align: center;padding: 8px}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px;}


.table tbody tr:nth-child(even) {background-color: #00BDFF; }
.table tbody tr:nth-child(odd) {background-color: #00EAFF; }
p{font-size: 11px}
.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}

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
    </style>
<section style="margin: 2%;">
<h3 ><b>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</b></h3>
<h4 ><b>DEPARTAMENTO DE MANTENIMIENTO</b></h4>
<h5 ><b>TODOS LOS PRODUCTOS</b></h5>

     <style>

   h3, h4, h5{
    font-size: 12px;
    text-align: center;
    }
  </style>
<br>
 <?php include ('../../../Model/conexion.php');
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

 ?>
        <br> 
<div id="h">
<table class="table" style="width: 100%">
    <thead>     
        <tr id="tr">
            <th title="Codigo del productos" style="width: 20%;">Cód.</th>
            <th title="Codigo del Catálogo" style="width: 20%;">Catál.</th>
            <th title="Descripción Completa" style="width: 40%;">Desc.</th>
            <th title="Unidad de Medida" style="width: 20%;">U/M</th>
            <th title="Cantidad (Stock)" style="width: 20%;">Cant.</th>
            <th title="Costo Unitario" style="width: 20%;">Precio</th>
            <th title="Fecha de registro" style="width: 30%;">Fecha</th>
            <th title="Total"style="width: 20%;">Total</th>
        </tr>
    </thead> 

    <tbody>
<?php


    $sql = "SELECT * FROM tb_productos ";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

        $codigo=$solicitudes['codProductos'];
        $cata=$solicitudes['catalogo'];
        $des=$solicitudes['descripcion'];
        $um=$solicitudes['unidad_medida'];
        $stock=$solicitudes['stock'];
        $cost=$solicitudes['precio'];
        if ($estado="Pendiente") {  
    $total = $solicitudes['stock'] * $solicitudes['precio'];
   
    }
     $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",","); 

    ?>
        <tr>
            <td data-label="Código"><?php  echo $codigo?></td>
            <td data-label="Código"><?php  echo $cata?></td>
            <td data-label="Descripción"><?php  echo $des?></td>
            <td data-label="Unidad De Medida"><?php  echo $um?></td>
            <td data-label="Cantidad"><?php echo $stock ?></td>
            <td data-label="Precio"><?php echo $cost ?></td>
            <td data-label="Fecha"><?php echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            <td data-label="total"><?php  echo $total1 ?></td>
        </tr>
     <?php } ?>


    </tbody>  

</table>
</div>
<div id="a">
    <div id="t">
        <?php $sql = "SELECT * FROM tb_productos";
    $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){


        $odt= $productos['codProductos'];
        $fecha=date("d-m-Y",strtotime($productos['fecha_registro']));

        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['stock'];
        $stock=number_format($cant_aprobada, 2,".",",");

        $final2 += $cant_aprobada;
        $final3   =    number_format($final2, 2, ".",",");

        
        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");


         ?>
     <?php } ?>
                  <p align="right"><b style="float: left;">Cant (Stock): </b><?php echo $final3 ?></p>
                  <p align="right"><b style="float: left;">Precio ($): </b><?php echo $final9 ?></p>
                  <p style="border-bottom: 1px solid #ccc;border-collapse: collapse;"></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
</div><br>
<div id="t">
            <h6 >Stock Por Mes</h6>
    <?php $sql="SELECT Mes,SUM(stock) FROM tb_productos GROUP BY Mes;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final6 += $cantidad;
        $final7   =    number_format($final6, 2, ".",",");
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
                <p align="right"><b style="float: left;">Total : </b><?php echo $final7 ?></p>

</div><br>
<div id="t">
       <h6> Stock Por Año</h6>
    <?php $sql="SELECT año,SUM(stock) FROM tb_productos GROUP BY año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final4 += $cantidad;
        $final5   =    number_format($final4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
                <p style="border-bottom: 1px solid #ccc;"></p>
                <p align="right"><b style="float: left;">Total : </b><?php echo $final5 ?></p>
</div>
</div>
<div id="h">

    <br>
    <p style="float: right;"> Entrega: ________________</p>
    <p style="text-align:left;">Solicita: ________________ </p>
    <br>
    <p style="text-align: center;">Autoriza: ________________</p>
</div>
</section>

</body>
</html>
<script type="text/javascript">
window.print();
</script>