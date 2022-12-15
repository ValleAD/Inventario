<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Compra</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
     <style>

.table {width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed;}
.table tr {background-color: #f8f8f8;border: 1px solid #ddd;color: black;}
.table th, .table td {font-size: 16px;padding: 8px;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px}


.table tbody tr:nth-child(even) {background-color: #00BDFF; height: 5%}
.table tbody tr:nth-child(odd) {background-color: #00EAFF; height: 5%}
    }
  </style>
 <?php  include ('../../../Model/conexion.php');
$total = 0;
$final = 0;
$final1 = 0;
$final2 = 0;
     $bodega = $_POST['sol_compra'];
         $sql = "SELECT * FROM detalle_compra WHERE solicitud_compra='$bodega'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
        $codigo=$solicitudes['codigo'];
        $des=$solicitudes['descripcion'];
        $um=$solicitudes['unidad_medida'];
        $cantidad=$solicitudes['stock'];
        $stock=$solicitudes['stock'];
        $cost=$solicitudes['precio'];
     
    $total = $solicitudes['stock'] * $solicitudes['precio'];

    
     $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",","); 
  }
    $sql = "SELECT * FROM tb_compra WHERE nSolicitud='$bodega'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
        $solicitud=$solicitudes['nSolicitud'];
        $dependencia=$solicitudes['dependencia'];
        $plazo=$solicitudes['plazo'];
        $unidad=$solicitudes['unidad_tecnica'];
        $suministro=$solicitudes['descripcion_solicitud'];
        $usuario=$solicitudes['usuario'];
        $estado=$solicitudes['estado'];
        $fecha=$solicitudes['fecha_registro'];
    }

   if ($_POST['jus']=="") {
    $jus = "Sin Justificación por el momento";
        
    }else{
    $jus = $_POST['jus'];
      }
      
?>
<h3 align="center" style="margin-top: -4%; height: 5%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: -4%; height: 5%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: -4%; height: 5%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: -4%; height: 5%;">SOLICITUD DE COMPRA</h4>
 

<br>


 <?php 


?> 

<table style="width: 100%;font-size: 11px; margin: 0;" >
    <tr>
        <td style="width: 30%;"><b>Solicitud No.:</b> <?php echo $solicitud ?></td>
        <td ><b>Depenencia Solicitante:</b> <?php echo $dependencia ?></td>
        <td align="right"><b>Plazo y No. de Entregas:</b> <?php echo $plazo ?></td>
    </tr>
    <tr>
        <td style="width: 30%;"><b>Unidad Técnica:</b> <?php echo $unidad ?></td>
        <td ><b>Suministro Solicitado:</b> <?php echo $suministro ?></td>
        <td align="right"><b>Encargado:</b> <?php echo $usuario ?></td>
    </tr>
    <tr>
    <td style="width: 30%;"><b>Estado:</b> <?php echo $estado ?></td>
    <td ><b>Fecha De Creación: </b> <?php echo $fecha ?></td>
    <td align="right"><b>Fecha De Impreción:</b> <?php echo date("d-m-Y")?></td>
    </tr>
    <tr>
        <td align="right" colspan="3"><p><b>SubTotal: </b><?php echo$final1 ?></p></td>
    </tr>
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

    $sql = "SELECT * FROM detalle_compra WHERE solicitud_compra='$bodega'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
        $codigo=$solicitudes['codigo'];
        $des=$solicitudes['descripcion'];
        $um=$solicitudes['unidad_medida'];
        $cantidad=$solicitudes['cantidad_despachada'];
        $stock=$solicitudes['stock'];
        $cost=$solicitudes['precio'];
     
    $total = $solicitudes['stock'] * $solicitudes['precio'];

    
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
<br>

    <table style="width: 100%;height: 10%; border: 1px solid #ccc;border-collapse: collapse;">
        <tbody>
           <p style="padding-left: 1%;"> Justificación por el OBS solicitado:</p>
           <hr style=" border: 1px solid #ccc;border-collapse: collapse;">
            <p style="padding-left: 1%;"><?php echo $jus ?></p>
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
$dompdf->stream("pdf_compra.pdf",array("Attachment"=>0));
        ?>