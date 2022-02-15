<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Vale</title>
</head>
<body>
    <img src="hospital.jpg" style="width:20%">
    <img src="log_1.png" style="width:20%;float:right">
    <?php if(isset($_POST['cod'])){

    $depto = $_POST['depto'];
    $fech = $_POST['fech'];
    $encargado = $_POST['usuario'];
     $vale = $_POST['vale'];
      
?>
<h3 align="center">HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4 align="center">DEPARTAMENTO DE MANTENIMIENTO</h4>
 
<section id="section">
<form method="POST" action="Exportar_PDF/pdf_vale.php" target="_blank">
         
      
        <div class="row">
      <div class="col-6 col-sm-3" style="position: initial">
      
              <label style="font-weight: bold; ">Vale No.: </label><?php echo $vale ?>

          </div>
          <div class="col-6 col-sm-3" style="position: initial">
      
              <label style="font-weight: bold;">Depto. o Servicio: </label><?php echo $depto ?>

          </div>

          <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Fecha: </label>
            <?php echo $fech ?> 
          </div>

        <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Encargado: </label><?php echo $encargado ?>
        </div>
        </div>
<br>
<table   class="table" id="example" style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed;">
       <thead>     
        <tr style="background-color: #f8f8f8;border: 1px solid #ddd;color: black;">
        <th style=" width: 5%;color:black;font-size: 16px;text-align: center;">Código</th>
        <th style=" width: 130%;color:black;font-size: 16px;text-align: center;">Descripción Completa</th>
        <th style=" width: 40%;color:black;font-size: 16px;text-align: center;">U/M</th>
        <th style=" width: 40%;color:black;font-size: 16px;text-align: center;">Cantidad</th>
        <th style=" width: 40%;color:black;font-size: 16px;text-align: center;">Costo Unitario</th>
        <th style=" width: 40%;color:black;font-size: 16px;text-align: center;border-right:1px solid #ccc ;">Total</th>
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
    $tot = $_POST['tot'][$i];
    echo $cantidad,$cost;
    $total = $cantidad * $cost;
      $final += $total;
?>
     
            
                  
     <style type="text/css">
     
         #td{
             display: none;
         }
        th{
            width: 100%;
        }
     </style>
         <tr>
           <td style="text-align:center;" data-label="Codigo" style="text-align: center;"><?php  echo $codigo?></td>
           <td style="text-align:center;"  data-label="Descripción Completa"><?php  echo $des?></td>
           <td style="text-align:center;"  data-label="Unidad De Medida" style="text-align: center;"><?php  echo $um?></td>
           <td style="text-align:center;"  data-label="Cantidad" style="color red"><?php echo $cantidad ?></td>
            <td style="text-align:center;"  data-label="Costo unitario" style="color red"><?php echo $cost ?></td>
           <td style="text-align:center;"  data-label="Fecha Registro"><?php  echo $total ?></td>
         </tr>
     
     <?php } } ?> 
     <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
         <th>SubTotal
             <td colspan="5" style="float right;text-align: right;padding-right:3%;color:red ;">
                 <?php  echo $final ?>
             </td>
         </th>
     </tfoot>
                </tbody>                
            </table>
            <div style="margin-top: 55%;">
            <p style="text-align:left;">Solicita: ________________ <br> </p><p style="text-align:center;margin-top: -6.5%;"> Entrega: ________________</p><p style="float: right;margin-top: -2.5%;">Autoriza: ________________</p></div>

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