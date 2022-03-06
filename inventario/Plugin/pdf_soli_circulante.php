<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF circulante</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">

<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center">REPORTE DE SOLICITUD DE CIRCULANTE</h5>
 


<table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 25%;font-size: 16px;text-align: left;">Código</th>
            <th style="width: 15%;color:black;font-size: 16px;text-align: left;">Fecha</th>
        </tr>
        
        <td id="td" colspan="3" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
   $sql = "SELECT * FROM tb_circulante ORDER BY fecha_solicitud DESC ";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?>
    <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
        <tr>
            <td style="text-align:left; border: 1px solid #ccc; border-collapse: collapse; border-right: none; border-left: none;"><?php  echo $solicitudes['codCirculante']?></td>
            <td style="text-align:left; border: 1px solid #ccc; border-collapse: collapse; border-right: none; border-left: none;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<br>
    <table style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;">
        <tbody>
            <tr>
                <td>Observaciones (En qué se ocupará el bien entregado)</td>
            </tr>
            <td style="height: 20%;"></td>
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
$dompdf->stream("Reporte de solicitud vale.php",array("Attachment"=>0));
        ?>