
<?php 
ob_start();
include '../../../Model/conexion.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todos los Productos</title>
    <img src="../../../img/hospital.png" style="width:20%;" align="left">
    <img src="../../../img/log_1.png" style="width:20%; " align="right">
    <h3><b>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</b></h3>
    <h4><b>DEPARTAMENTO DE MANTENIMIENTO</b></h4>
    <h5><b>TODOS LOS PRODUCTOS</b></h5>
</head>

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

<body>

    <?php $total = "0.00";
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
    $final14 = "0.00";
    $final15 = "0.00";
    $final16 = "0.00";
    $final17 = "0.00";
    $final18 = "0.00";
    $final19 = "0.00";
    $final20 = "0.00";
    $Busqueda=$_POST['Busqueda'];$f1=$_POST['f1'];$f2=$_POST['f2'];
    $sql = "SELECT descripcion,Concepto,unidad_medida,fecha_registro,No_Comprovante,Entradas,Salidas,Saldo FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'";
    $result = mysqli_query($conn, $sql);

    $n=0;
    while ($productos = mysqli_fetch_array($result)){
       $total = $productos['Entradas'] * $productos['Saldo'];
       $final += $total;
       $final2=number_format($final, 2, ".",",");

       $fecha=date("d-m-Y",strtotime($f1));
       $fecha1=date("Y-m-d",strtotime($productos['fecha_registro']));
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

       $final3 += $stock;
       $final4   =    number_format($final3, 2, ".",",");
       $final5 += $precio;
       $final6   =    number_format($final5, 2, ".",",");
       $final7 += $Salida;
       $final8   =    number_format($final7, 2, ".",",");



   }?>
   <br> <br><br><br><br>
   <div class="row" align="center">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <p align="right"><b style="float: left;">Entradas: </b><?php echo $final3 ?></p>

            </div>
        </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
            <p align="right"><b style="float: left;">Salidas: </b><?php echo $final8 ?></p>
        </div>
    </div>
</div>

<div class="col-md-3">
  <div class="card">
    <div class="card-body">
        <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final6 ?></p>
    </div>
</div>
</div>
<div class="col-md-3">
    <div class="card">
        <div class="card-body">

            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final2?></p>
        </div>
    </div>
</div>
<div class="col-md-11">
    <div class="card">
        <div class="card-body">
            <p><b >PERIODO DE MOVIMIENTO</b></p>

            <p align="right"><b style="float: left;">DE:</b> <?php echo $fecha ?></p>     
            <p align="right"><b style="float: left;">AL:</b> <?php echo $fecha3 ?></p>     
            <p align="right"><b style="float: left;">Codigo del Producto: </b><?php echo $Comprovante?></p>     
            <p align="right"><b style="float: left;">Descripción: </b><?php echo $descripcion ?></p>     
            <p align="right"><b style="float: left;">Unidad de Medida</b><?php echo $um ?></p> 
        </div>
    </div>
</div>


</div>
<br>     

<table class="table " >

    <thead style="background-color: #46466b;color: white;">
        <tr>
         <th style="width:20%"  id="th">Fecha</th>
         <th style="width:30%"  id="th">Concepto</th>
         <th style="width:30%;" id="th">Comprobante</th>
         <th style="width:20%"  id="th">Entradas</th>
         <th style="width:20%"  id="th">Salidas</th>
         <th style="width:20%"  id="th">Saldo</th>
         <th style="width:20%"  id="th">Total</th>
     </tr>

 </thead> 

 <tbody>
    <?php 
    $sql = "SELECT descripcion,Concepto,unidad_medida,fecha_registro,No_Comprovante,Entradas,Salidas,Saldo FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'";
    $result = mysqli_query($conn, $sql);

    $n=0;
    while ($productos = mysqli_fetch_array($result)){
        $total = $productos['Entradas'] * $productos['Saldo'];
        
        $total2= number_format($total, 2, ".",",");

        $fecha=date("d-m-Y",strtotime($f1));
        $fecha1=date("Y-m-d",strtotime($productos['fecha_registro']));
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


        ?>  
        <tr>
            <td id="th" data-label="Fecha"><?php echo $fecha1 ?></td>
            <td id="th" data-label="Concepto"><?php echo $Concepto ?></td>
            <td id="th" data-label="No. Comprovante"><?php echo $Comprovante ?></td>
            <td id="th" data-label="Entradas"><?php echo $stock1?></td>
            <td id="th" data-label="Salidas"><?php echo $Salida ?></td>
            <td id="th" data-label="Saldo"><?php echo $precio1 ?></td>
            <td id="th" data-label="Saldo"><?php echo $total2 ?></td>
        </tr>
    <?php }  ?> 
</tbody>  
</table>
<br> <br>
<div class="card">
    <div class="card-body">
        <h6>Entradas Por Mes</h6>
        <?php $sql="SELECT SUM(Entradas),Mes FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Mes;";
        $result = mysqli_query($conn, $sql);
        while ($productos = mysqli_fetch_array($result)){
            $mes=$productos['Mes'];
            $cantidad=$productos['SUM(Entradas)'];
            $stock=number_format($cantidad, 2,".",",");
            $final9 += $cantidad;
            $final10   =    number_format($final9, 2, ".",",");
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
        <p align="right"><b style="float: left;">Total </b><?php echo $final10 ?></p>
    </div>
</div> 
<div class="card">
    <div class="card-body">
        <h6>Salidas Por Mes</h6>
        <?php $sql="SELECT SUM(Salidas),Mes FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Mes;";
        $result = mysqli_query($conn, $sql);
        while ($productos = mysqli_fetch_array($result)){
            $mes=$productos['Mes'];
            $cantidad=$productos['SUM(Salidas)'];
            $stock=number_format($cantidad, 2,".",",");
            $final11 += $cantidad;
            $final12   =    number_format($final11, 2, ".",",");
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
        <p align="right"><b style="float: left;">Total </b><?php echo $final12 ?></p>
    </div>
</div> 
<br>
<div class="card">
    <div class="card-body">
        <h6> Entradas Por Año</h6>
        <?php $sql="SELECT SUM(Entradas),Año FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Año;";
        $result = mysqli_query($conn, $sql);
        while ($productos = mysqli_fetch_array($result)){

            $año=$productos['Año'];
            $cantidad=$productos['SUM(Entradas)'];
            $stock=number_format($cantidad, 2,".",",");
            $final14 += $cantidad;
            $final15   =    number_format($final14, 2, ".",",");?>

            <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>

        <?php } ?>
        <p style="border-bottom: 1px solid #ccc;"></p>
        <p align="right"><b style="float: left;">Total </b><?php echo $final15 ?></p>
    </div>
</div> 
<div class="card">
    <div class="card-body">
        <h6> Salidas Por Año</h6>
        <?php $sql="SELECT SUM(Salidas),Año FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Año;";
        $result = mysqli_query($conn, $sql);
        while ($productos = mysqli_fetch_array($result)){

            $año=$productos['Año'];
            $cantidad=$productos['SUM(Salidas)'];
            $stock=number_format($cantidad, 2,".",",");
            $final16 += $cantidad;
            $final17   =    number_format($final16, 2, ".",",");?>

            <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>

        <?php } ?>
        <p style="border-bottom: 1px solid #ccc;"></p>
        <p align="right"><b style="float: left;">Total </b><?php echo $final17 ?></p>
    </div>
</div>   



<br>
<p style="float: right;"> Entrega: ________________</p>
<p style="text-align:left;">Solicita: ________________ </p>
<br>
<p style="text-align: center;">Autoriza: ________________</p>
</body>
</html>
<?php 
$html=ob_get_clean();
// echo $html;
require_once '../../dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$dompdf = new  Dompdf(['isRemoteEnabled' =>  true]);
$options = $dompdf->getOptions();
$options->setIsHtml5ParserEnabled(true);
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("PDF Producto.pdf",array("Attachment"=>0));
?>
