<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Vale</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">

<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center">REPORTE DE SOLICITUD DE VALE</h5>
 <?php if (isset($_POST['Consultar'])) {
    $columna=$_POST['columna'];
    $tipo=$_POST['tipo'];?>
    <table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >

            <th  style="width: 10%;color:black;font-size: 14px;">Codigo</th>
            <th  style="width: 50%;color:black;font-size: 14px;">Departamento Solicitante </th>
            <th  style="width: 15%;color:black;font-size: 14px;">Fecha</th>
        </tr>
        
        <td id="td" colspan="3" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
    $sql = "SELECT * FROM tb_vale  Order by $columna $tipo";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
         $des=$solicitudes['departamento'];
                if ($des=="") {
                    $des="Departamentos No disponible";
                }else{

                   $des=$solicitudes['departamento']; 
                }
?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td data-label="Código" style="font-size: 12px;"><?php  echo $solicitudes['codVale']?></td>
            <td data-label="Departamento" style="font-size: 12px;"><?php  echo $des?></td>
            <td data-label="Fecha" style="font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>

<?php if (isset($_POST['id'])) {?>
<table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 10%;font-size: 14px;text-align: center;">#</th>
            <th style="width: 25%;font-size: 14px;text-align: center;">Código</th>
            <th style="width: 70%;color:black;font-size: 14px;text-align: left;">Departamento Solicitante</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Fecha</th>
        </tr>
        
        <td id="td" colspan="3" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
   $sql = "SELECT * FROM tb_vale ORDER BY fecha_registro DESC ";
    $result = mysqli_query($conn, $sql);

  $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0;
?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="text-align:center;font-size: 12px;"><?php  echo $r?></td>
            <td style="text-align:center;font-size: 12px;"><?php  echo $solicitudes['codVale']?></td>
            <td style="font-size: 12px;"><?php  echo $solicitudes['departamento']?></td>
            <td style="text-align:center;font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } if (isset($_POST['id1'])) { ?>
    <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 25%;font-size: 14px;text-align: center;">#</th>
            <th style="width: 25%;font-size: 14px;text-align: center;">Código</th>
            <th style="width: 70%;color:black;font-size: 14px;text-align: left;">Departamento Solicitante</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Fecha</th>
        </tr>
        
        <td id="td" colspan="3" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
$idusuario=$_POST['idusuario'];
   $sql = "SELECT * FROM tb_vale WHERE idusuario='$idusuario' ";
    $result = mysqli_query($conn, $sql);
$n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0;
?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="text-align:center;font-size: 12px;"><?php  echo $r?></td>
            <td style="text-align:center;font-size: 12px;"><?php  echo $solicitudes['codVale']?></td>
            <td style="font-size: 12px;"><?php  echo $solicitudes['departamento']?></td>
            <td style="text-align:center;font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>
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