<?php ob_start();
include ('../Model/conexion.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>PDF Vale</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">
    <?php if(isset($_POST['cod'])){

    $depto = $_POST['depto'];
    $fech = $_POST['fech'];
    $encargado = $_POST['usuario'];
    $vale = $_POST['vale'];
    if ($_POST['jus']=="") {
    $jus = "Sin observacion por el momento";
        
    }else{
    $jus = $_POST['jus'];
      }
?>
<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<p style="float: right; margin-right: 5%; position: absolute;">Vale No.: <?php echo $vale ?></p>
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center">SOLICITUD DE MATERIALES</h5>
 
<section style="margin: 2%;">
              
    <p><b>Depto. o Servicio:</b> <?php echo $depto ?></p>

    <p style="float: right; margin-right: 0%;"><b>Fecha:</b> <?php echo $fech ?></p>
        
    <p><b>Encargado:</b> <?php echo $encargado ?></p>

<table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;">
            <th style="width: 25%;font-size: 16px;text-align: center;">Código</th>
            <th style="width: 70%;color:black;font-size: 16px;text-align: left;">Descripción Completa</th>
            <th style="width: 15%;color:black;font-size: 16px;text-align: center;">U/M</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Cantidad Solicitada</th>
            <th style="width: 30%;color:black;font-size: 14px;text-align: center;">Cantidad Despachada</th>
            <th style="width: 30%;color:black;font-size: 16px;text-align: center;">Precio Unitario</th>
            <th style="width: 15%;color:black;font-size: 16px;text-align: center;border-right:1px solid #ccc ;">Total</th>
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
    $cost = $_POST['cost'][$i];
    $stock = $_POST['cantidad_despachada'][$i];
    $tot = $_POST['tot'][$i];
     $tot_f = $_POST['tot_f'];
?>
  
        <tr>
            <td style="text-align:center; border: 1px solid #ccc; border-collapse: collapse; border-right: none; border-left: none;"><?php  echo $codigo?></td>
            <td style="border: 1px solid #ccc;border-collapse: collapse; border-right: none; border-left: none;"><?php  echo $des?></td>
            <td style="text-align:center; border: 1px solid #ccc; border-collapse: collapse; border-right: none; border-left: none;"><?php  echo $um?></td>
            <td style="text-align:center; border: 1px solid #ccc; border-collapse: collapse; border-right: none; border-left: none;"><?php echo $stock ?></td>
            <td style="text-align:center; border: 1px solid #ccc; border-collapse: collapse; border-right: none; border-left: none;"><?php echo $cantidad ?></td>
            <td style="text-align: center; border: 1px solid #ccc; border-collapse: collapse; border-right: none; border-left: none;;"><?php echo $cost ?></td>
            <td style="text-align: center; border: 1px solid #ccc; border-collapse: collapse; border-right: none; border-left: none;"><?php  echo $tot ?></td>
        </tr>
     
    </tbody>  
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
           <p style="padding-left: 1%;"> <b>Observaciones (En qué se ocupará el bien entregado)</b> </p>
           <hr style=" border: 1px solid #ccc;border-collapse: collapse;">
            <p style="padding-left: 1%;"><?php echo $jus ?></p>
        </tbody>
    </table>
    <br>
    <p style="float: right;"> Entrega: ________________</p>
    <p style="text-align:left;">Solicita: ________________ </p>
    <br>
    <p style="text-align: center;">Autoriza: ________________</p>
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
$dompdf->stream("pdf_vale.php",array("Attachment"=>0));
        ?>