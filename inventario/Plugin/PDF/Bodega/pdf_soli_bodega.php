<?php ob_start();
include '../../../Model/conexion.php';?>
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

<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center">REPORTE DE SOLICITUD DE BODEGA</h5>
 
<?php if (isset($_POST['Consultar'])) {
    $columna=$_POST['columna'];
    $tipo=$_POST['tipo'];
        $tipo=$_POST['tipo'];
     if ($tipo=="desc"){
       $tipo1='Descendente'; 
    }
    if ($tipo=="asc") {
        $tipo1='Ascendente';
     } ?>
    <p style="float: right;">Ordenado: <?php echo $tipo1 ?></p><br><br>
    <table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 25%;font-size: 14px;text-align: center;">Código</th>
            <th style="width: 50%;color:black;font-size: 14px">Departamento Solicitante</th>
            <th style="width: 50%;color:black;font-size: 14px;">Encargado</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Fecha</th>
        </tr>
        
        <td id="td" colspan="3" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php
    $sql = "SELECT * FROM tb_bodega  Order by $columna $tipo";
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
            <td style="text-align:center; font-size: 12px;"><?php  echo $solicitudes['codBodega']?></td>
            <td style="font-size: 12px;text-align: center;"><?php  echo $des?></td>
            <td style=" font-size: 12px;text-align: center;"><?php  echo $solicitudes['usuario']?></td>
            <td style="text-align:center; font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>
 <?php if (isset($_POST['Consultar1'])) {
    $columna=$_POST['columna'];
    $tipo=$_POST['tipo'];
        $tipo=$_POST['tipo'];
     if ($tipo=="desc"){
       $tipo1='Descendente'; 
    }
    if ($tipo=="asc") {
        $tipo1='Ascendente';
     } ?>
    <p style="float: right;">Ordenado: <?php echo $tipo1 ?></p><br><br>
    <table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 25%;font-size: 14px;text-align: center;">Código</th>
            <th style="width: 50%;color:black;font-size: 14px">Departamento Solicitante</th>
            <th style="width: 50%;color:black;font-size: 14px;">Encargado</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Fecha</th>
        </tr>
        
        <td id="td" colspan="3" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php
$idusuario=$_POST['idusuario'];
    $sql = "SELECT * FROM tb_bodega WHERE idusuario='$idusuario'  Order by $columna $tipo";
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
           <td style="text-align:center; font-size: 12px;"><?php  echo $solicitudes['codBodega']?></td>
            <td style="font-size: 12px;text-align: center;"><?php  echo $des?></td>
             <td data-label="Encargado" style="font-size: 12px;text-align: center;"><?php  echo $solicitudes['usuario']?>
            <td style="text-align:center; font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>

<?php if (isset($_POST['id'])) {?>
<table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 10%;font-size: 14px;text-align: center;">Código</th>
            <th style="width: 30%;color:black;font-size: 14px">Departamento Solicitante</th>
            <th style="width: 30%;color:black;font-size: 14px">Encargado</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Fecha</th>
        </tr>
        <td id="td" colspan="3"><h4>No se encontraron resultados</h4></td>
    </thead> 

    <tbody>
<?php
   $sql = "SELECT * FROM tb_bodega order by codBodega DESC";
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
            <td style="text-align:center; font-size: 12px;"><?php  echo $solicitudes['codBodega']?></td>
            <td style="font-size: 12px;"><?php  echo $des?></td>
            <td style="font-size: 12px;"><?php  echo $solicitudes['usuario']?>
            <td style="text-align:center; font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
     
    </tbody>  
     <?php }  ?>
   
</table>
          <?php } if (isset($_POST['id1'])) { ?>
          <table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 15%;font-size: 14px;text-align: center;">Código</th>
            <th style="width: 50%;color:black;font-size: 14px">Departamento Solicitante</th>
            <th style="width: 30%;color:black;font-size: 14px">Encargado</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Fecha</th>
        </tr>
        <td id="td" colspan="3"><h4>No se encontraron resultados</h4></td>
    </thead> 

    <tbody>
<?php
$id=$_POST['idusuario'];
   $sql = "SELECT * FROM tb_bodega WHERE idusuario='$id' Order by codBodega DESC";
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
            <td style="text-align:center; font-size: 12px;"><?php  echo $solicitudes['codBodega']?></td>
            <td style="font-size: 12px;text-align: center;"><?php  echo $des?></td>
            <td style=" font-size: 12px;text-align: center;"><?php  echo $solicitudes['usuario']?></td>
            <td style="text-align:center; font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
     
    </tbody>  
     <?php }  ?> 
   
</table>
<?php } ?> 
 <br>
    <p style="float: right;"> Entrega: ________________</p>
    <p style="text-align:left;">Solicita: ________________ </p>
    <br>
    <p style="text-align: center;">Autoriza: ________________</p>

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
$dompdf->stream("Reporte de solicitud vale.pdf",array("Attachment"=>0));
        ?>