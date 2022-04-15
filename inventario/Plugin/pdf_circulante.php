<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Circulante</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">
    
<?php if(isset($_POST['desc'])){


?>
<h3 align="center" style="margin-top: -2%;">HOSPITAL NACIONAL "SANTA TERESA" DE ZACATECOLUCA</h3>
<h3 align="center" style="margin-top: -2%;">FONDO CIRCULANTE DE MONTO FIJO</h3>

<section style="margin: 2%;">

<section style="font-size: 14px;">
<p>Encargado del Fondo Circulante de Monto Fijo Recursos Propios</p>
<p>Hospital Nacional "Santa Teresa" de Zacatecoluca</p>
<br>
<p>Atentamente solicito a usted la compra <b>Urgente</b> de los materiales y/o servicios que se detallan a continuación, a través del Fondo Circulante de Monto Fijo.</p>
</section>

              
<table style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 25%;color:black;font-size: 15px;text-align: left;">Codigo</th>
            <th style="width: 70%;color:black;font-size: 15px;text-align: left;">Descripción de los materiales y/o servicios solicitados</th>
            <th style="width: 15%;color:black;font-size: 15px;text-align: center;">U/M</th>
            <th style="width: 15%;color:black;font-size: 15px;text-align: center;">Cant.<br>Sol.</th>
            <th style="width: 15%;color:black;font-size: 15px;text-align: center;">Cant.<br>Desp.</th>
            <th style="width: 15%;color:black;font-size: 15px;text-align: center;">C/U</th>
            <th style="width: 15%;color:black;font-size: 15px;text-align: center;border-right:1px solid #ccc ;">Total</th>
        </tr>
    </thead> 

    <tbody>
<?php
    $total = 0;
    $final = 0;
for($i = 0; $i < count($_POST['desc']); $i++)
{
   
    $cod = $_POST['cod'][$i];
    $des = $_POST['desc'][$i];
    $um = $_POST['um'][$i];
    $cantidad = $_POST['cant'][$i];
    $cantidad_despachada = $_POST['cantidad_despachada'][$i];
    $cost = $_POST['cost'][$i];
    $tot = $_POST['tot'][$i];

    $tot_f = $_POST['tot_f'];
?>
  
        <tr>
            <td><?php  echo $cod?></td>
            <td><?php  echo $des?></td>
            <td style="text-align:center;"><?php  echo $um?></td>
            <td style="text-align:center;"><?php echo $cantidad ?></td>
            <td><?php echo $cantidad_despachada ?></td>
            <td style="text-align: center;"><?php echo $cost ?></td>
            <td style="text-align: center"><?php  echo $tot ?></td>
        </tr>
     
     <?php } } ?> 
    <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
      
    <td colspan="6" style="text-align: right; font-weight: bold;">Costo Estimado</td>
        <td style="text-align: center; font-weight: bold;"><?php echo $tot_f ?></td>
    </tfoot>
    </tbody>   
</table>            
    
<section sytle="font-size: 14px;">
<p>Todo lo anteriormente detallado, es indispensable para desarrollar nuestras funciones.</p>  
<p>Sin más particular</p>

<div align="right">
<p style="float: right;"> Dá fe de no haber existencia: <br><br>F. ________________ <br>Sra. Isabel Romero <br>Guardalmacén</p>
</div>

<div align="">
    <p style="text-align:left;">Solicita: <br><br>F. ________________ <br>Ing. Ernesto González Choto <br>Jefe de Mantenimiento</p>
</div>

<div align="">
    <p style="text-align: center;">Autoriza: <br><br>F. ________________ <br>Dr. William Antonio Fernández Rodríguez <br>Director del Hospital Nacional “ Santa Teresa”</p>
</div>

   
    
    <br>
    
</section>
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
$dompdf->stream("pdf_circulante.php",array("Attachment"=>0));
        ?>