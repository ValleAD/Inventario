<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Almacén</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
    <?php 
include ('../../../Model/conexion.php');
$total = 0;
$final = 0;
$final1 = 0;
$final2 = 0;
     $Almacen = $_POST['num_sol'];      
?>
     <style>

.table {width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed;}
.table tr {background-color: #f8f8f8;border: 1px solid #ddd;color: black;}
.table th, .table td {font-size: 16px;padding: 8px;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px}


.table tbody tr:nth-child(even) {background-color: #00BDFF; height: 5%}
.table tbody tr:nth-child(odd) {background-color: #00EAFF; height: 5%}
    }
  </style>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA  DE ZACATECOLUCA</h3>
<h4 align="center" style="margin-top: 2%;">ALMACÉN DE MEDICAMENTOS, INSUMOS MÉDICOS,</h4>
<h4 align="center" style="margin-top: 2%;">PAPELERÍA Y OTROS ARTICULOS</h4>
<br>
<table  style="width: 100%;text-align: center;">
    <tr>
        <td><b>N° Almacen</b></td>
        <td><b>Departamento</b></td>
        <td><b>Encargado</b></td>
        <td><b>Fecha</b></td>
        <td><b>Estado</b></td>
    </tr>
        <?php     $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen='$Almacen'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
       
        $stock=$solicitudes['cantidad_solicitada'];
        $cost=$solicitudes['precio'];
     
    $total = $solicitudes['cantidad_solicitada'] * $solicitudes['precio'];
     $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",","); 
  }   $sql = "SELECT * FROM tb_almacen WHERE codAlmacen='$Almacen'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
        $vale=$solicitudes['codAlmacen'];
        $depto=$solicitudes['departamento'];
        $encargado=$solicitudes['encargado'];
        $fech=$solicitudes['fecha_solicitud'];
        $estado=$solicitudes['estado'];
      ?>
    <tr>
        <td><?php echo $vale ?></td>
        <td><?php echo $depto ?></td>
        <td><?php echo $encargado ?></td>
        <td><?php echo $fech ?></td>
        <td><?php echo $estado ?></td>
    </tr>
        <tr>
        <td align="right" colspan="5"><p><b>SubTotal: </b><?php echo$final1 ?></p></td>
    </tr>
<?php } ?>
</table>
<table class="table" style="width: 100%">
    <thead>     
        <tr id="tr">
            <th style="width: 20%;">Código</th>
            <th style="width: 50%;">Descripción Completa</th>
            <th style="width: 20%;">U/M</th>
            <th style="width: 20%;">Cantidad Solicitada</th>
            <th style="width: 20%;">Cantidad Despachada</th>
            <th style="width: 20%;">C/U</th>
            <th style="width: 20%;">Total</th>

            </tr>
    </thead> 

    <tbody>
<?php

    $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen='$Almacen'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
        $codigo=$solicitudes['codigo'];
        $des=$solicitudes['nombre'];
        $um=$solicitudes['unidad_medida'];
        $cantidad=$solicitudes['cantidad_despachada'];
        $stock=$solicitudes['cantidad_solicitada'];
        $cost=$solicitudes['precio'];
     
    $total = $solicitudes['cantidad_solicitada'] * $solicitudes['precio'];

    
     $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",","); 
 ?>
        <tr>
            <td data-label="Código"><?php  echo $codigo?></td>
            <td data-label="Descripción"><?php  echo $des?></td>
            <td data-label="Unidad De Medida"><?php  echo $um?></td>
            <td data-label="Cantidad"><?php echo $stock ?></td>
            <td data-label="Cantidad Despachada"><?php echo $cantidad ?></td>
            <td data-label="Precio"><?php echo $cost ?></td>
            <td data-label="total"><?php  echo $total1 ?></td>
        </tr>
     <?php } ?>
    </tbody>  

</table>

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
$dompdf->stream("pdf_almacen.pdf",array("Attachment"=>0));
        ?>