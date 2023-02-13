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

?><?php 

include ('../../../Model/conexion.php');

 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
       <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">

<?php   if (isset($_POST['consulta'])) {?>
     <title>Productos</title>
<?php }  if (isset($_POST['Historial'])) { ?>
     <title>Historial de Productos</title>
<?php } ?>
    <style>
table tr td {padding: 1%}
.table {width: 100%;border-collapse: collapse;margin: 0;table-layout: fixed;}
.table tbody tr {background-color: #f8f8f8;border: 1px solid #ddd;}
.table th, .table td {font-size: 12px;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px;}


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
        width: 79%;
        border-radius: 0.25rem;
}
#a{
    float: left;
    width: 20%;
}
   h3, h4, h5{
    font-size: 10px;
    text-align: center;
    }
    #container{
        width: 100%;
        float: right;
             
    }
    </style>

 </head>
 <body>
    
<div id="container">
    <img src="../../../img/hospital.png" style="width:20%;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
<h3 ><b>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</b></h3>
<h4 ><b>DEPARTAMENTO DE MANTENIMIENTO</b></h4>
<?php   if (isset($_POST['consulta'])) { ?>
<h5>FILTROS DE LOS PRODUCTOS</h5>
<?php }  if (isset($_POST['Historial'])) { ?>
<h5>HISTORIAL DE PRODUCTOS</h5>
<?php } ?>
</div>
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
$final10 = "0.00";
$final11 = "0.00";
$final12 = "0.00";
$final13 = "0.00";

  if (isset($_POST['consulta'])) {$Busqueda=$_POST['consulta'];?>
<div id="h" >
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
            <th title="Total"style="width: 20%;"><p >Total</p></th>
        </tr>
    </thead> 

    <tbody>
<?php


    $sql = "SELECT * FROM tb_productos  WHERE codProductos LIKE '%".$Busqueda."%' or descripcion LIKE '%".$Busqueda."%' ";
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
        <?php $sql = "SELECT * FROM tb_productos WHERE codProductos LIKE '%".$Busqueda."%'";
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
    <?php $sql="SELECT Mes,SUM(stock) FROM tb_productos WHERE codProductos LIKE '%".$Busqueda."%'  GROUP BY Mes;";
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
                <p style="border-bottom: 1px solid #ccc;border-collapse: collapse;"></p>
               <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>

</div><br>
<div id="t">
       <h6> Stock Por Año</h6>
    <?php $sql="SELECT año,SUM(stock) FROM tb_productos WHERE codProductos LIKE '%".$Busqueda."%'  GROUP BY año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final4 += $cantidad;
        $final5   =    number_format($final4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
    <p style="border-bottom: 1px solid #ccc;border-collapse: collapse;"></p>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>

</div>
</div>
<div id="h">

    <br>
    <p style="float: right;"> Entrega: ________________</p>
    <p style="text-align:left;">Solicita: ________________ </p>
    <br>
    <p style="text-align: center;">Autoriza: ________________</p>
</div>

<?php } if (isset($_POST['Historial'])) { $Busqueda=$_POST['Busqueda'];$f1=$_POST['f1'];$f2=$_POST['f2'];?>

     <div id="h" >
                 <table class="table">
                   <thead>
             <tr>
                     <th style="width:30%"  id="th">Fecha</th>
                     <th style="width:30%"  id="th">Concepto</th>
                     <th style="width:30%;" id="th">Comprobante</th>
                     <th style="width:20%"  id="th">Entradas</th>
                     <th style="width:20%"  id="th">Salidas</th>
                     <th style="width:20%"  id="th">Saldo</th>
                     <th style="width:20%"  id="th">Total</th>
                
            </tr>
           
     </thead>
<tbody>
    <?php $sql = "SELECT descripcion,Concepto,unidad_medida,fecha_registro,No_Comprovante,Entradas,Salidas,Saldo FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'";
$result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
        $total = $productos['Entradas'] * $productos['Saldo'];
         $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final2=number_format($final, 2, ".",","); 
        $fecha=date("d-m-Y",strtotime($f1));
        $fecha3=date("d-m-Y",strtotime($f2));
        $Concepto=$productos['Concepto'];
        $Comprovante= $productos['No_Comprovante'];
        $precio= $productos['Saldo'];
      $precio1=number_format($precio, 2, ".",",");
        $descripcion=$productos['descripcion'];
        $stock=$productos['Entradas'];
        $Salida=$productos['Salidas'];
      $stock1=number_format($stock, 2, ".",",");  
      $um=$productos['unidad_medida']; 

        $final += $stock;
        $final1   =    number_format($final, 2, ".",",");

        $final6 += $precio;
        $final7   =    number_format($final6, 2, ".",",");
        
        ?>

          
          <tr>
            <td id="th" data-label="Fecha"><?php echo $fecha ?></td>
            <td id="th" data-label="Concepto"><?php echo $Concepto ?></td>
            <td id="th" data-label="No. Comprovante"><?php echo $Comprovante ?></td>
            <td id="th" data-label="Entradas"><?php echo $stock1?></td>
            <td id="th" data-label="Salidas"><?php echo $Salida ?></td>
            <td id="th" data-label="Saldo"><?php echo $precio1 ?></td>
            <td id="th" data-label="Saldo"><?php echo $total1 ?></td>        
          </tr>
<?php } ?>
           </tbody>
        </table>
     </div>
     <div id="a">
 <div id="t">
<p align="right"><b style="float: left;">DE:</b> <?php echo $f1 ?></p>     
<p align="right"><b style="float: left;">AL:</b> <?php echo $f2 ?></p>     
<p align="right"><b style="float: left;">N° Comprovante: </b><?php echo $Comprovante?></p>     
<p align="right"><b style="float: left;">Descripción: </b><?php echo $descripcion ?></p>     
<p align="right"><b style="float: left;">Unidad de Medida</b><?php echo $um ?></p> 
     </div><br>
     <div id="t">
                  <p align="right"><b style="float: left;">Entradas: </b><?php echo $final1 ?></p>
                  <p align="right"><b style="float: left;">Salidas: </b><?php echo $final3 ?></p>
                  <p align="right"><b style="float: left;">Resultados(E-S): </b><?php echo $final5 ?></p>
                  <p align="right"><b style="float: left;">Saldo(Precio): </b><?php echo $final7 ?></p>
                  <p style="border-bottom: 1px solid #ccc;"></p>
                  <p align="right"><b style="float: left;">SubTotal: </b><?php echo $final2 ?></p>  
     </div><br>     
     <div id="t">
           <h6 >Entradas Por Mes</h6>
    <?php $sql="SELECT SUM(Entradas),fecha_registro FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' or No_Comprovante='$Busqueda' GROUP BY Mes;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=date("m",strtotime($productos['fecha_registro']));
        $cantidad=$productos['SUM(Entradas)'];
        $stock=number_format($cantidad, 2,".",",");
        $final8 += $cantidad;
        $final9   =    number_format($final8, 2, ".",",");
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
                <p style="border-bottom: 1px solid #ccc;border-collapse: collapse;"></p>
               <p align="right"><b style="float: left;">Total </b><?php echo $final9 ?></p>
     </div><br>     
     <div id="t">
                    <h6 >Salidas Por Mes</h6>
    <?php $sql="SELECT SUM(Salidas),fecha_registro FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' or No_Comprovante='$Busqueda' GROUP BY Mes;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=date("m",strtotime($productos['fecha_registro']));
        $cantidad=$productos['SUM(Salidas)'];
        $stock=number_format($cantidad, 2,".",",");
        $final10 += $cantidad;
        $final11   =    number_format($final10, 2, ".",",");
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
                <p style="border-bottom: 1px solid #ccc;border-collapse: collapse;"></p>
               <p align="right"><b style="float: left;">Total </b><?php echo $final11 ?></p> 
     </div><br>
    <div id="t">
       <h6> Entradas Por Año</h6>
    <?php $sql="SELECT SUM(Entradas),fecha_registro FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' or No_Comprovante='$Busqueda' GROUP BY Año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=date("Y",strtotime($productos['fecha_registro']));
        $cantidad=$productos['SUM(Entradas)'];
        $stock=number_format($cantidad, 2,".",",");
        $final4 += $cantidad;
        $final5   =    number_format($final4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
    <p style="border-bottom: 1px solid #ccc;border-collapse: collapse;"></p>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>

     </div><br>    
     <div id="t">
       <h6> Salidas Por Año</h6>
    <?php $sql="SELECT SUM(Salidas),fecha_registro FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' or No_Comprovante='$Busqueda' GROUP BY Año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=date("Y",strtotime($productos['fecha_registro']));
        $cantidad=$productos['SUM(Salidas)'];
        $stock=number_format($cantidad, 2,".",",");
        $final12 += $cantidad;
        $final13   =    number_format($final12, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
    <p style="border-bottom: 1px solid #ccc;border-collapse: collapse;"></p>
               <p align="right"><b style="float: left;">Total </b><?php echo $final13 ?></p>
   
     </div><br>
 </div>


<?php } ?>

<script>
    window.print();
</script>

 </body>
 </html>
