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

 <?php   if(isset($_POST['cod'])){

    $solicitud = $_POST['sol_compra'];
    $dependencia = $_POST['dependencia'];
    $plazo = $_POST['plazo'];
    $unidad = $_POST['unidad'];
    $suministro = $_POST['suministro'];
    $usuario = $_POST['usuario'];
    $fecha = $_POST['fech'];
    $estado=$_POST['estado'];

   if ($_POST['jus']=="") {
    $jus = "Sin Justificación por el momento";
        
    }else{
    $jus = $_POST['jus'];
      }
      
?>
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: 2%;">SOLICITUD DE COMPRA</h4>
 

<br>
<table style="width: 100%;font-size: 11px;" >
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
</table>
<br>
<table style="width: 100%;border: 1px solid #ccc;border-collapse: collapse; margin-top: 9%;">
     <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 22%;font-size: 14px;text-align: center;">Código</th>
            <th style="width: 65%;color:black;font-size: 14px;text-align: left;">Descripción Completa <br>(con todas sus especificaciones)</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">U/M</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Cantidad</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Precio<br>Unitario</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;border-right:1px solid #ccc ;">Monto</th>
        </tr>
    </thead> 

    <tbody>
<?php
    $total = 0;
    $final = 0;
for($i = 0; $i < count($_POST['cod']); $i++)
{
   
    $codigo = $_POST['cod'][$i];
    $des = $_POST['desc'][$i];
    $um = $_POST['um'][$i];
    $cantidad = $_POST['cant'][$i];
    $cantidad_despachada = $_POST['cantidad_despachada'][$i];
    $cost = $_POST['cost'][$i];
    $tot = $_POST['tot'][$i];

    $tot_f = $_POST['tot_f'];
?>
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="font-size: 12px;text-align:center;"><?php  echo $codigo?></td>
            <td style="font-size: 12px;"><?php  echo $des?></td>
            <td style="font-size: 12px;text-align:center;"><?php  echo $um?></td>
            <td style="font-size: 12px;text-align:center;"><?php echo $cantidad ?></td>
            <td style="font-size: 12px;text-align: center;"><?php echo $cost ?></td>
            <td style="font-size: 12px;text-align: center"><?php  echo $tot ?></td>
        </tr>
     
     <?php } } ?> 
    <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td style="text-align: center;font-size: 12px; font-weight: bold;">Subtotal</td>
        <td colspan="4"></td>
        <td style="text-align: center;font-size: 12px; font-weight: bold;"><?php echo $tot_f ?></td>
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
$dompdf->stream("pdf_compra.php",array("Attachment"=>0));
        ?>