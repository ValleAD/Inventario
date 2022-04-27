<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Compra</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">

 <?php   if(isset($_POST['cod'])){

    $solicitud = $_POST['sol_compra'];
    $dependencia = $_POST['dependencia'];
    $plazo = $_POST['plazo'];
    $unidad = $_POST['unidad'];
    $suministro = $_POST['suministro'];
    $usuario = $_POST['usuario'];
    $fecha = $_POST['fech'];
   if ($_POST['jus']=="") {
    $jus = "Sin Justificación por el momento";
        
    }else{
    $jus = $_POST['jus'];
      }
      
?>
<h3 align="center" style="margin-top: -2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: -2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: -2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: -2%;">SOLICITUD DE COMPRA</h4>
 
<section style="margin: 2%;">

<section style="font-size: 14px;">
    <div style="float: right">
        <label>FECHA DE IMPRESIÓN:</label><?php echo date("d-m-Y")?><br>
        <label>FECHA DE CREACIÓN: <?php echo $fecha ?></label>
    </div>
              
    <p style="margin-top: -1.5%;"><b>Solicitud No.:</b> <?php echo $solicitud ?></p>
    <p style="margin-top: -1.5%;"><b>DEPENDECIA SOLICITANTE:</b> <?php echo $dependencia ?></p> 
    <p style="margin-top: -1.5%;"><b>PLAZO Y NÚMERO DE ENTREGAS:</b> <?php echo $plazo ?></p>
    <p style="margin-top: -1.5%;"><b>UNIDAD TÉCNICA:</b> <?php echo $unidad ?></p>
    <p style="margin-top: -1.5%;"><b>SUMINISTROS SOLICITADOS:</b> <?php echo $suministro ?></p>
    <p style="margin-top: -1.5%;"><b>ENCARGADO:</b> <?php echo $usuario ?></p>
</section>

<div style="float: right; font-size: 13px;">
    <p align="left">Montos estimados <br>presupuestados <br>en dólares</p>
</div>

<table style="width: 100%;border: 1px solid #ccc;border-collapse: collapse; margin-top: 9%;">
     <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 22%;font-size: 16px;text-align: center;">Código</th>
            <th style="width: 22%;font-size: 16px;text-align: center;">Código <br>ONU</th>
            <th style="width: 65%;color:black;font-size: 16px;text-align: left;">Descripción Completa <br>(con todas sus especificaciones)</th>
            <th style="width: 15%;color:black;font-size: 16px;text-align: center;">U/M</th>
            <th style="width: 15%;color:black;font-size: 16px;text-align: center;">Cantidad</th>
            <th style="width: 15%;color:black;font-size: 16px;text-align: center;">Precio<br>Unitario</th>
            <th style="width: 15%;color:black;font-size: 16px;text-align: center;border-right:1px solid #ccc ;">Monto</th>
        </tr>
    </thead> 

    <tbody>
<?php
    $total = 0;
    $final = 0;
for($i = 0; $i < count($_POST['cod']); $i++)
{
   
    $categoria = $_POST['categoria'][$i];
    $codigo = $_POST['cod'][$i];
    $onu = $_POST['catalogo'][$i];
    $des = $_POST['desc'][$i];
    $um = $_POST['um'][$i];
    $cantidad = $_POST['cant'][$i];
    $cantidad_despachada = $_POST['cantidad_despachada'][$i];
    $cost = $_POST['cost'][$i];
    $tot = $_POST['tot'][$i];

    $tot_f = $_POST['tot_f'];
?>
  
        <tr>
2            <td style="text-align:center;" style="text-align: center;"><?php  echo $codigo?></td>
            <td style="text-align:center;" style="text-align: center;"><?php  echo $onu?></td>
            <td><?php  echo $des?></td>
            <td style="text-align:center;" style="text-align: center;"><?php  echo $um?></td>
            <td style="text-align:center;"><?php echo $cantidad ?></td>
            <td style="text-align: center;"><?php echo $cost ?></td>
            <td style="text-align: center"><?php  echo $tot ?></td>
        </tr>
     
     <?php } } ?> 
    <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td style="text-align: center; font-weight: bold;">Subtotal</td>
        <td colspan="5"></td>
        <td style="text-align: center; font-weight: bold;"><?php echo $tot_f ?></td>
    </tfoot>
</table>
<br>

    <table style="width: 100%;height: 10%; border: 1px solid #ccc;border-collapse: collapse;">
        <tbody>
           <p style="padding-left: 1%;"> Justificación por el OBS solicitado:</p>
           <hr style=" border: 1px solid #ccc;border-collapse: collapse;">
            <p style="padding-left: 1%;"><?php echo $jus ?></p>
        </tbody>
    </table>                
</section>

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
$dompdf->stream("pdf_compra.php",array("Attachment"=>0));
        ?>