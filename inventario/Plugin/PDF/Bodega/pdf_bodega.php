<?php ob_start();
include ('../../../Model/conexion.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Bodega</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
    <?php if(isset($_POST['cod'])){

    $depto = $_POST['depto'];
    $fech = $_POST['fech'];
    $encargado = $_POST['usuario'];
     $vale = $_POST['bodega'];
     $estado=$_POST['estado'];

      
?>
<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>

<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center">SOLICITUD DE MATERIALES</h5>
 
<p style="float: right; position: absolute;">O. de T.: <?php echo $vale ?></p>
<p><b>Depto. o Servicio:</b> <?php echo $depto ?></p>  
   <table style="width: 100%;">
       <tr>
           <td style="text-align: left;;width:50%;"><b>Encargado:</b> <?php echo $encargado ?></td>
           <td><b>Fecha:</b> <?php echo $fech ?><br></td>
           <td style="text-align: right;"><b>Estado:</b> <?php echo $estado ?></td>
       </tr>
   </table> 

        <br>   
<table style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 15%;font-size: 14px;text-align: center;">Código</th>
            <th style="width: 70%;color:black;font-size: 14px;text-align: center;">Descripción Completa</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">U/M</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Cantidad Solicitada</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Cantidad Despachada</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">C/U</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;border-right:1px solid #ccc ;">Total</th>
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
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="font-size: 12px;text-align:center; "><?php  echo $codigo?></td>
            <td style="font-size: 12px;text-align: center;"><?php  echo $des?></td>
            <td style="font-size: 12px;text-align:center; "><?php  echo $um?></td>
            <td style="font-size: 12px;text-align:center; "><?php echo $cantidad ?></td>
            <td style="font-size: 12px;text-align:center; "><?php echo $stock ?></td>
            <td style="font-size: 12px;text-align: center; ;"><?php echo $cost ?></td>
            <td style="font-size: 12px;text-align: center; "><?php  echo $tot ?></td>
        </tr>
     
     <?php } } ?> 
    <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td style="text-align: center;font-size: 12px; font-weight: bold;">Subtotal</td>
        <td colspan="5"></td>
        <td style="text-align: center;font-size: 12px; font-weight: bold;"><?php echo $tot_f ?></td>
    </tfoot>

    </tbody>                
</table>
<br><br><br>
    <p style="float: right;"> Entrega: ________________________________</p>
    <p style="text-align:left;">Solicita: <?php echo $encargado ?></p></p>
    
    <p style="text-align: center; margin-top: 15%;">Autoriza: ________________________________</p>


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
$dompdf->stream("pdf_bodega.php",array("Attachment"=>0));
        ?>