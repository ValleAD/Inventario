<?php ob_start();
include ('../../../Model/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php   if (isset($_POST['Dia'])) {?>
    <title>Filtro por Días en PDF</title>
<?php }  if (isset($_POST['Mes'])) { ?>
    <title>Filtro por Mes en PDF</title>

<?php }  if (isset($_POST['Año'])) { ?>
    <title>Filtro por Años en PDF</title>
<?php }  if (isset($_POST['Fecha'])) { ?>
    <title>Filtro por Fechas en PDF</title>
<?php } ?>
</head>
<body style="font-family: sans-serif;">

<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">DEPARTAMENTO DE MANTENIMIENTO</h4>
<?php   if (isset($_POST['Dia'])) {?>
<h5 align="center" style="margin-top: 2%;">FILTRO POR DIAS</h5>

<?php }  if (isset($_POST['Mes'])) { ?>
<h5 align="center" style="margin-top: 2%;">FILTRO POR MES</h5>

<?php }  if (isset($_POST['Año'])) { ?>
    <h5 align="center" style="margin-top: 2%;">FILTRO POR AÑO</h5>

<?php }  if (isset($_POST['Fecha'])) { ?>
    <h5 align="center" style="margin-top: 2%;">FILTRO POR FECHAS</h5>
<?php } ?>

    <?php
    if (isset($_POST['Dia'])) {$dia=$_POST['dia']?><br>
                <p align="center"><b>El Dia Selecionado</b>: <?php echo $_POST['dia'] ?></p>

    <table class="table  table-striped"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <th style="font-size: 11px;height: 3%;">Código</th>
            <th style="font-size: 11px;height: 3%;">Cod. de Catálogo</th>
            <th style="font-size: 11px;height: 3%;">Descripción Completa</th>
            <th style="font-size: 11px;height: 3%;">U/M</th>
            <th style="font-size: 11px;height: 3%;">Cantidad</th>
            <th style="font-size: 11px;height: 3%;">Costo Unitario</th>
            <th style="font-size: 11px;height: 3%;">Fecha Registro</th>

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
        <td data-label="Codigo" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $catal ?></td>
        <td data-label="Descripción" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $stock ?></td>
        <td data-label="Precio" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $precio1 ?></td>
        <td data-label="Fecha" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $fech ?></td>
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

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <th style="font-size: 11px;height: 3%;">Código</th>
            <th style="font-size: 11px;height: 3%;">Cod. de Catálogo</th>
            <th style="font-size: 11px;height: 3%;">Descripción Completa</th>
            <th style="font-size: 11px;height: 3%;">U/M</th>
            <th style="font-size: 11px;height: 3%;">Cantidad</th>
            <th style="font-size: 11px;height: 3%;">Costo Unitario</th>
            <th style="font-size: 11px;height: 3%;">Fecha Registro</th>

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
        <td data-label="Codigo" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $catal ?></td>
        <td data-label="Descripción" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $stock ?></td>
        <td data-label="Precio" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $precio1 ?></td>
        <td data-label="Fecha" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $fech ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
<?php } 
 if (isset($_POST['Año'])) {$año=$_POST['año']?><br>
                <p align="center"><b>El Año selecionado</b>: <?php echo $_POST['año'] ?></p>

    <table class="table  table-striped"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <th style="font-size: 11px;height: 3%;">Código</th>
            <th style="font-size: 11px;height: 3%;">Cod. de Catálogo</th>
            <th style="font-size: 11px;height: 3%;">Descripción Completa</th>
            <th style="font-size: 11px;height: 3%;">U/M</th>
            <th style="font-size: 11px;height: 3%;">Cantidad</th>
            <th style="font-size: 11px;height: 3%;">Costo Unitario</th>
            <th style="font-size: 11px;height: 3%;">Fecha Registro</th>

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
    </style>
        <td data-label="Codigo" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $catal ?></td>
        <td data-label="Descripción" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $stock ?></td>
        <td data-label="Precio" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $precio1 ?></td>
        <td data-label="Fecha" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $fech ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
    <?php  } if (isset($_POST['Fecha'])) {$f1 =$_POST['f1'];$f2 =$_POST['f2'];?>
    <table style="width: 100%;"><tr>
        <td><b>Desde:</b> <?php echo $f1 ?></td>
        <td style="text-align: right;"><b>Hasta:</b> <?php echo $f2 ?></td>
</tr>
</table>
    <table class="table  table-striped"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <th style="font-size: 12px;height: 3%;">Código</th>
            <th style="font-size: 12px;height: 3%;">Cod. de Catálogo</th>
            <th style="font-size: 12px;height: 3%;">Descripción Completa</th>
            <th style="font-size: 12px;height: 3%;">U/M</th>
            <th style="font-size: 12px;height: 3%;">Cantidad</th>
            <th style="font-size: 12px;height: 3%;">Costo Unitario</th>
            <th style="font-size: 12px;height: 3%;">Fecha Registro</th>

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
        <td data-label="Codigo" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $catal ?></td>
        <td data-label="Descripción" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $stock ?></td>
        <td data-label="Precio" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $precio1 ?></td>
        <td data-label="Fecha" style="border: 1px solid #ccc;border-collapse: collapse;text-align: center;"><?php echo $fech ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
<?php } ?>

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
if (isset($_POST['Dia'])) {
$dompdf->stream("PDF POR DIA.pdf",array("Attachment"=>0));
}  if (isset($_POST['Mes'])) { 
$dompdf->stream("PDF POR MES.pdf",array("Attachment"=>0));
}  if (isset($_POST['Año'])) { 
$dompdf->stream("PDF POR AÑO.pdf",array("Attachment"=>0));
}  if (isset($_POST['Fecha'])) { 
$dompdf->stream("PDF POR FECHA.pdf",array("Attachment"=>0));
} ?>

        ?>