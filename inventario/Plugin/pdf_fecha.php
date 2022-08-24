<?php ob_start();
include ('../Model/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtro por Fechas en PDF</title>
</head>
<body style="font-family: sans-serif;">

<img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center" style="margin-top: 2%;">FILTRO DE FECHAS</h5>

    <?php
    if (isset($_POST['Dia'])) {$dia=$_POST['dia']?><br>
                <p align="center"><b>El Dia Selecionado</b>: <?php echo $_POST['dia'] ?></p>

    <table class="table  table-striped"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

    <thead>
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <th>Código</th>
            <th>Cod. de Catálogo</th>
            <th>Descripción Completa</th>
            <th>U/M</th>
            <th>Cantidad</th>
            <th>Costo Unitario</th>
            <th>Fecha Registro</th>

        </tr>
    </thead>
    <tbody>
                <td align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>
  <?php 
   $sql = "SELECT * FROM `tb_productos` WHERE dia='$dia'";
        $result = mysqli_query($conn, $sql);
 while ($productos = mysqli_fetch_array($result)){
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
     <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
</style>
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">
    <style>
        td{
            font-size: 12px;
        }
    </style>
        <td data-label="Codigo" style="font-size:12px"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="font-size:12px;text-align: center;"><?php echo $catal ?></td>
        <td data-label="Descripción" style="font-size:12px"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="font-size:12px"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="font-size:12px"><?php echo $stock ?></td>
        <td data-label="Precio" style="font-size:12px"><?php echo $precio1 ?></td>
        <td data-label="Fecha" style="font-size:12px"><?php echo $fech ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
<?php } 
 if (isset($_POST['Mes'])) {$mes=$_POST['mes'];$mes1=$_POST['mes'];
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
            if ($mes1=="Enero")    { $mes1=1;$mes2=0;}
            if ($mes1=="Febrero")   { $mes1=2;$mes2=0;}
            if ($mes1=="Marzo")     { $mes1=3;$mes2=0;}
            if ($mes1=="Abril")     { $mes1=4;$mes2=0;}
            if ($mes1=="Mayo")      { $mes1=5;$mes2=0;}
            if ($mes1=="Junio")     { $mes1=6;$mes2=0;}
            if ($mes1=="Junio")     { $mes1=7;$mes2=0;}
            if ($mes1=="Agosto")    { $mes1=8;$mes2=0;}
            if ($mes1=="Septiembre"){ $mes1=9;$mes2=0;}
            if ($mes1=="Octubre")   { $mes1==10;}
            if ($mes1=="Noviembre") { $mes1==11;}
            if ($mes1=="Diciembre") { $mes1==12;}?><br>
                <p align="center"><b>El Mes selecionado: </b><?php echo $mes." ("."<b>Mes en numero:</b> ".$mes2.$mes1.")" ?></p>

    <table class="table  table-striped"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

    <thead>
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <th>Código</th>
            <th>Cod. de Catálogo</th>
            <th>Descripción Completa</th>
            <th>U/M</th>
            <th>Cantidad</th>
            <th>Costo Unitario</th>
            <th>Fecha Registro</th>

        </tr>
    </thead>
    <tbody>
                <td align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>
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
     <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
</style>
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">
    <style>
        td{
            font-size: 12px;
        }
    </style>
        <td data-label="Codigo" style="font-size:12px"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="font-size:12px;text-align: center;"><?php echo $catal ?></td>
        <td data-label="Descripción" style="font-size:12px"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="font-size:12px"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="font-size:12px"><?php echo $stock ?></td>
        <td data-label="Precio" style="font-size:12px"><?php echo $precio1 ?></td>
        <td data-label="Fecha" style="font-size:12px"><?php echo $fech ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
<?php } 
 if (isset($_POST['Año'])) {$año=$_POST['año']?><br>
                <p align="center"><b>El Año selecionado</b>: <?php echo $_POST['año'] ?></p>

    <table class="table  table-striped"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

    <thead>
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <th>Código</th>
            <th>Cod. de Catálogo</th>
            <th>Descripción Completa</th>
            <th>U/M</th>
            <th>Cantidad</th>
            <th>Costo Unitario</th>
            <th>Fecha Registro</th>

        </tr>
    </thead>
    <tbody>
                <td align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>
  <?php 
   $sql = "SELECT * FROM `tb_productos` WHERE año='$año'";
        $result = mysqli_query($conn, $sql);
 while ($productos = mysqli_fetch_array($result)){
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
     <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
</style>
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">
    <style>
        td{
            font-size: 12px;
        }
    </style>
        <td data-label="Codigo" style="font-size:12px"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="font-size:12px;text-align: center;"><?php echo $catal ?></td>
        <td data-label="Descripción" style="font-size:12px"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="font-size:12px"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="font-size:12px"><?php echo $stock ?></td>
        <td data-label="Precio" style="font-size:12px"><?php echo $precio1 ?></td>
        <td data-label="Fecha" style="font-size:12px"><?php echo $fech ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
    <?php  } if (isset($_POST['Fecha'])) {$f1 =$_POST['f1'];$f2 =$_POST['f2'];?>
    <center>
 <div class="container" style="float:left;">
          <div class="row">
                    <div class="col-md-6" style="position: initial">
                        <label>Desde</label>
                   <p><?php echo $f1 ?></p>
                    </div><div class="col-md-6" style="position: initial">
                        <label>Hasta</label>
                    <p><?php echo $f2 ?></p>                
                    </div>
                    
                </div> 
</div> </center>
    <table class="table  table-striped"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

    <thead>
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <th>Código</th>
            <th>Cod. de Catálogo</th>
            <th>Descripción Completa</th>
            <th>U/M</th>
            <th>Cantidad</th>
            <th>Costo Unitario</th>
            <th>Fecha Registro</th>

        </tr>
    </thead>
    <tbody>
                <td align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>
  <?php 
   $sql = "SELECT * FROM `tb_productos` WHERE fecha_registro BETWEEN ' $f1' AND ' $f2'";
        $result = mysqli_query($conn, $sql);
 while ($productos = mysqli_fetch_array($result)){
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
     <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
</style>
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">
    <style>
        td{
            font-size: 12px;
        }
    </style>
        <td data-label="Codigo" style="font-size:12px"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="font-size:12px;text-align: center;"><?php echo $catal ?></td>
        <td data-label="Descripción" style="font-size:12px"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="font-size:12px"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="font-size:12px"><?php echo $stock ?></td>
        <td data-label="Precio" style="font-size:12px"><?php echo $precio1 ?></td>
        <td data-label="Fecha" style="font-size:12px"><?php echo $fech ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
<?php } ?>

</body>
</html>
            <?php $html=ob_get_clean();
                 // echo $html 
require_once 'dompdf/autoload.inc.php';
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
$dompdf->stream("pdf_fecha.php",array("Attachment"=>0));
        ?>